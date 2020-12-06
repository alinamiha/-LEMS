<?php

namespace App\Http\Controllers;

use App\Models\RecordOfService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecordOfServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::check()){
            return redirect('/login');
        }
        $user = Auth::user();
        $work = $user->unemployed->work;

        return view('work.index', ['user' => $user, 'works' => $work]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $work = new RecordOfService();
        $work->unemployed_id = Auth::user()->unemployed->id;
        $work->company_name = request('company_name');
        $work->started_date = request('started_date');
        $work->expiration_date = request('expiration_date');
        $work->post = request('post');
        $work->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\RecordOfService $recordOfService
     * @return \Illuminate\Http\Response
     */
    public function show(RecordOfService $recordOfService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\RecordOfService $recordOfService
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $work = RecordOfService::find($id);
//        dd($work);
        return view('work.edit', ['work' => $work]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RecordOfService $recordOfService
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $unemployed = Auth::user()->unemployed;
        $work = RecordOfService::find($id);
        $work->unemployed_id = $unemployed->id;
        $work->company_name = request('company_name');
        $work->started_date = request('started_date');
        $work->expiration_date = request('expiration_date');
        $work->post = request('post');
        $work->save();
        return redirect('/record-of-services/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\RecordOfService $recordOfService
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        if (!Auth::check() || !Auth::user()->type == 'admin') {
//            return redirect('/');
//        }

        $user = RecordOfService::find($id)->delete();
        return back();
    }
}
