<?php

namespace App\Http\Controllers;

use App\Models\CurriculumVitae;
use App\Models\Unemployed;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;


class CurriculumVitaeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        if (!Auth::check()){
//           abort(404);
//        }
        $CVs = CurriculumVitae::query()
            ->join('unemployeds', 'curriculum_vitaes.unemployed_id', '=' ,'unemployeds.id')
            ->join('allowances', 'allowances.unemployed_id', '=' ,'unemployeds.id')
            ->join('users', 'unemployeds.user_id', '=' ,'users.id')
            ->select([
                'curriculum_vitaes.id as id',
                'curriculum_vitaes.type_of_working as type_of_working',
                'curriculum_vitaes.post as post',
                'users.id as user_id',
                'users.name as name',
                'allowances.birthday as birthday',
                'unemployeds.id as unemployed_id',
                ])
            ->get();

        return view('cv.index', ['CVs' => $CVs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $CVs = DB::table('users')
            ->join('unemployeds', function ($join) {
                $join->on('users.id', '=', 'unemployeds.user_id')
                    ->where('users.id', Auth::user()->id);
            })
            ->join('curriculum_vitaes', 'curriculum_vitaes.unemployed_id', '=', 'unemployeds.id')
            ->select([
                'users.id as id',
                'curriculum_vitaes.id as id',
                'curriculum_vitaes.cv_name as title',
                'curriculum_vitaes.created_at as created_at',
            ])
            ->orderBy('created_at','desc')
            ->get();
        return view('cv.create', ['CVs' => $CVs]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

        $unemployed = DB::table('users')
            ->join('unemployeds', function ($join) {
                $join->on('users.id', '=', 'unemployeds.user_id')
                    ->where('users.id', Auth::user()->id);
            })
            ->select([
                'unemployeds.id as id',
            ])
            ->first();

        $cv = new CurriculumVitae();
        $cv->unemployed_id = $unemployed->id;
        $cv->cv_name = request('cv_name');
        $cv->description = request('description');
        $cv->type_of_working = request('type_of_working');
        $cv->city = request('city');
        $cv->post = request('post');

        $cv->save();
//
//        $res = CurriculumVitae::create([
//            'unemployed_id' => $request->$unemployed->id,
//            'cv_name' => $request->cv_name,
//            'description' => $request->description,
//            'type_of_working' => $request->type_of_working,
//            'city' => $request->city,
//            'post' => $request->post]);

//        $data = ['id' => $res->id, 'title' => $request->cv_name, 'text' => $request->description];


        return response()->json($cv);
//        return response();
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $cv = CurriculumVitae::where('curriculum_vitaes.id', $id)
            ->join('unemployeds', 'unemployeds.id', '=' ,'curriculum_vitaes.unemployed_id')
            ->join('allowances', 'allowances.unemployed_id', '=' ,'unemployeds.id')
            ->join('users', 'unemployeds.user_id', '=' ,'users.id')
            ->select([
                'curriculum_vitaes.id as id',
                'curriculum_vitaes.cv_name as cv_name',
                'curriculum_vitaes.description as description',
                'curriculum_vitaes.type_of_working as type_of_working',
                'curriculum_vitaes.post as post',
                'curriculum_vitaes.city as city',
                'unemployeds.id as unemployed_id',
                'users.id as user_id',
                'users.name as name',
                'users.email as email',
                'allowances.birthday as birthday',
            ])
            ->first();

        return view(    'cv.show', [
            'unemployed_CV' => $cv,
            'user' => Auth::user(),
            'unemployed' => Unemployed::find($cv->unemployed_id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\CurriculumVitae $curriculumVitae
     * @return \Illuminate\Http\Response
     */
    public function edit(CurriculumVitae $curriculumVitae)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CurriculumVitae $curriculumVitae
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CurriculumVitae $curriculumVitae)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param Request $request
     * @param $cv
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, $cv)
    {
        $curriculumVitae = CurriculumVitae::find($cv);
        if ($curriculumVitae) {
            $curriculumVitae->delete();
        }
        return back();
    }

    public function showUserCv(){
        $CVs = DB::table('users')
            ->join('unemployeds', function ($join) {
                $join->on('users.id', '=', 'unemployeds.user_id')
                    ->where('users.id', Auth::user()->id);
            })
            ->join('curriculum_vitaes', 'curriculum_vitaes.unemployed_id', '=', 'unemployeds.id')
            ->select([
                'users.id as id',
                'curriculum_vitaes.id as id',
                'curriculum_vitaes.cv_name as title',
            ])
            ->get();
        return view('cv.my-cv', ['CVs' => $CVs]);
    }


}
