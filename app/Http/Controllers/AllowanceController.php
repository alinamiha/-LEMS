<?php

namespace App\Http\Controllers;

use App\Models\Allowance;
use App\Models\Passport;
use App\Models\CurriculumVitae;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AllowanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unemployed = Allowance::latest()->get();
        foreach ($unemployed as $worker) {
            $worker->age = $this->calculate_age($worker->birthday);
        }
        return view('allowance.index', ['unemployed' => $unemployed]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        /** @var User $user*/
        $user = Auth::user();
        $allowance = $user->unemployed->allowance()->whereIn('status', [1,2])->first();
        return view('allowance.create', ['hasAllowance' => $allowance]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::check()){
            return redirect('/login');
        }
        $user = Auth::user();
        $unemployed = $user->unemployed;

        $passport = new Passport($request->all());
        $passport->save();

        $allowance = new Allowance($request->all());
        $allowance->unemployed_id = $unemployed->id;
        $allowance->passport_id = $passport->id;

        $allowance->save();
        return redirect('/cv/create');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        if (CurriculumVitae::where('id', $id) !== null) {
//            return view('allowance.show', [
//                'unemployed' => Allowance::where('id', $id)->firstOrFail(),
//                'unemployed_CV' => CurriculumVitae::where('unemployed_id', $id)->get()
//            ]);
//        } else {
            return view('allowance.show', [
                'unemployed' => Allowance::where('id', $id)->firstOrFail()

            ]);
//        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Auth::check()){
            return redirect('/login');
        }
        $unemployed = Allowance::find($id);
        return view('allowance.edit', compact('unemployed'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function calculate_age($birthday)
    {
        $birthday_timestamp = strtotime($birthday);
        $age = date('Y') - date('Y', $birthday_timestamp);
        if (date('md', $birthday_timestamp) > date('md')) {
            $age--;
        }
        return $age;
    }

    public function showUserAllowances()
    {
        $allowances = DB::table('users')
            ->join('unemployeds', function ($join) {
                $join->on('users.id', '=', 'unemployeds.user_id')
                    ->where('users.id', Auth::user()->id);
            })
            ->join('allowances', 'allowances.unemployed_id', '=', 'unemployeds.id')
            ->select([
                'users.id as id',
                'allowances.id as id',
                'allowances.citizenship as citizenship',
                'allowances.status as status',
//                'curriculum_vitaes.cv_name as title',
            ])
            ->get();
        return view('allowance.my-allowances', ['allowances' => $allowances]);
    }
}
