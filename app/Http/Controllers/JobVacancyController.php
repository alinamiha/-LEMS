<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\JobVacancy;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JobVacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $vacancies = JobVacancy::latest()->get();
        $vacancies = JobVacancy::query()
            ->join('employers', 'employers.id', '=' ,'job_vacancies.employer_id')
            ->join('users', 'employers.user_id', '=' ,'users.id')
            ->select([
                'users.name as user_name',
                'job_vacancies.id as id',
                'job_vacancies.title as title',
                'job_vacancies.type_of_working as type_of_working',
                'job_vacancies.post as post',
                'job_vacancies.sales as sales',
            ])
            ->get();
        return view('vacancy.index', ['vacancies' => $vacancies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vacancy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $employer = $user->employer;
//        dd($employer);

        $vacancy = new JobVacancy($request->all());
        $vacancy->employer_id = $employer->id;

        $vacancy->save();

        return redirect('/my-vacancies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobVacancy  $jobVacancy
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vacancy = JobVacancy::where('job_vacancies.id', $id)
            ->join('employers', 'employers.id', '=' ,'job_vacancies.employer_id')
            ->join('users', 'employers.user_id', '=' ,'users.id')
            ->select([
                'users.name as user_name',
                'users.email as user_email',
                'job_vacancies.title as title',
                'job_vacancies.type_of_working as type_of_working',
                'job_vacancies.post as post',
                'job_vacancies.form_of_work as form_of_work',
                'job_vacancies.company_name as company_name',
                'job_vacancies.address as address',
                'job_vacancies.description as description',
                'job_vacancies.sales as sales',
            ])
            ->first();
        return view(    'vacancy.show', [
            'vacancy' => $vacancy

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobVacancy  $jobVacancy
     * @return \Illuminate\Http\Response
     */
    public function edit(JobVacancy $jobVacancy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobVacancy  $jobVacancy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobVacancy $jobVacancy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobVacancy  $jobVacancy
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobVacancy $jobVacancy)
    {
        //
    }
    public function showUserVacancies(){
        $vacancies= DB::table('users')
            ->join('employers', function ($join) {
                $join->on('users.id', '=', 'employers.user_id')
                    ->where('users.id', Auth::user()->id);
            })
            ->join('job_vacancies', 'job_vacancies.employer_id', '=', 'employers.id')
            ->select([
                'users.id as id',
                'job_vacancies.id as id',
                'job_vacancies.title as title',
            ])
            ->get();
        return view('vacancy.my-vacancies', ['vacancies' => $vacancies]);
    }
}
