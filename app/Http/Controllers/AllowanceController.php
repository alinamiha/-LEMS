<?php

namespace App\Http\Controllers;

use App\Models\Allowance;
use App\Models\Passport;
use App\Models\CurriculumVitae;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user() !== null){

            $unemployed = Allowance::where('id', Auth::user()->id)->where('status', 1)->count();
            return view('allowance.create', ['hasAllowance' => $unemployed]);
        }
        else{
            return view('home');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $passport = new Passport();
        $passport->document_name = request('document_name');
        $passport->number = request('number');
        $passport->date_of_issue = request('date_of_issue');
        $passport->issued_by = request('issued_by');
        $passport->TIN_number = request('TIN_number');

        $passport->save();

        $unemployed = new Allowance();
        $unemployed->user_id = Auth::user()->id;
        $unemployed->name = request('name');
        $unemployed->birthday = request('birthday');
        $unemployed->citizenship = request('citizenship');
        $unemployed->passport_id = $passport->id;
        $unemployed->registration_address = request('registration_address');
        $unemployed->factual_address = request('factual_address');
        $unemployed->education_degree = request('education_degree');
        $unemployed->name_education = request('name_education');
        $unemployed->last_work_place = request('last_work_place');
        $unemployed->email = Auth::user()->email;
        $unemployed->phone = request('phone');

        $unemployed->save();

        return redirect('/allowance');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        dd(CurriculumVitae::where('id', $id)->first());
        if(CurriculumVitae::where('id', $id) !== null){
            return view('allowance.show', [
                'unemployed' => Allowance::where('id', $id)->firstOrFail(),
                'unemployed_CV' => CurriculumVitae::where('id', $id)->first()

            ]);
        }else{
            return view('allowance.show', [
                'unemployed' => Allowance::where('id', $id)->firstOrFail()

            ]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
}
