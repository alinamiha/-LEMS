<?php

namespace App\Http\Controllers;

use App\Models\CurriculumVitae;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CurriculumVitaeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cvs = CurriculumVitae::where('user_id', Auth::user()->id)->get();
        $user = Auth::user()->name;
        return view('cv.index', ['cvs' => $cvs, 'user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cv.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cv = new CurriculumVitae();
        $cv->user_id = Auth::user()->id;
        $cv->cv_name = request('cv_name');
        $cv->description = request('description');
        $cv->type_of_working = request('type_of_working');
        $cv->post = request('post');

        $cv->save();

        return redirect('/my-account');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\CurriculumVitae $curriculumVitae
     * @return \Illuminate\Http\Response
     */
    public function show(CurriculumVitae $curriculumVitae)
    {
        //
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
     *
     * @param \App\Models\CurriculumVitae $curriculumVitae
     * @return \Illuminate\Http\Response
     */
    public function destroy(CurriculumVitae $curriculumVitae)
    {
        //
    }
}
