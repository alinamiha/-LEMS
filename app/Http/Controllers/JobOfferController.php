<?php

namespace App\Http\Controllers;

use App\Models\JobOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unemployed = Auth::user()->unemployed;
        $offers = JobOffer::where('unemployed_id', $unemployed->id)
            ->join('job_vacancies', 'job_offers.vacancy_id', '=', 'job_vacancies.id')
            ->select([
                'job_vacancies.id as id',
                'job_vacancies.title as title',
                'job_vacancies.type_of_working as type_of_working',
                'job_vacancies.post as post',
                'job_vacancies.sales as sales',
            ])
            ->get();;
        return view('jobOffer.index', ['offers' => $offers]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @param $unemployed_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $unemployed_id)
    {
        foreach ($request->get('vacancy_ids') as $vacancy_id) {
            $job_offer = new JobOffer();
            $job_offer->unemployed_id = request('unemployed_id');
            $job_offer->vacancy_id = $vacancy_id;
            $job_offer->save();
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\JobOffer $jobOffer
     * @return \Illuminate\Http\Response
     */
    public function show(JobOffer $jobOffer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\JobOffer $jobOffer
     * @return \Illuminate\Http\Response
     */
    public function edit(JobOffer $jobOffer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JobOffer $jobOffer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobOffer $jobOffer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\JobOffer $jobOffer
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobOffer $jobOffer)
    {
        //
    }
}
