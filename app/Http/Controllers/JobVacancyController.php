<?php

namespace App\Http\Controllers;

use App\Models\Allowance;
use App\Models\Employee;
use App\Models\Employer;
use App\Models\JobOffer;
use App\Models\JobVacancy;
use App\Models\Passport;
use App\Models\Unemployed;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\Settings;
use PhpParser\Builder\Class_;


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
            ->join('employers', 'employers.id', '=', 'job_vacancies.employer_id')
            ->join('users', 'employers.user_id', '=', 'users.id')
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
     * @param \Illuminate\Http\Request $request
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
     * @param \App\Models\JobVacancy $jobVacancy
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vacancy = JobVacancy::where('job_vacancies.id', $id)
            ->join('employers', 'employers.id', '=', 'job_vacancies.employer_id')
            ->join('users', 'employers.user_id', '=', 'users.id')
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
                'job_vacancies.created_at as created_at',
            ])->first();

        return view('vacancy.show', [
            'vacancy' => $vacancy
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\JobVacancy $jobVacancy
     * @return \Illuminate\Http\Response
     */
    public function edit(JobVacancy $jobVacancy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JobVacancy $jobVacancy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobVacancy $jobVacancy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\JobVacancy $jobVacancy
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobVacancy $jobVacancy)
    {
        //
    }

    public function showUserVacancies()
    {
        $vacancies = Auth::user()->employer->vacancies;
        foreach ($vacancies as &$vacancy) {
            $vacancy->offerSuccess = JobOffer::where('vacancy_id', $vacancy->id)
                ->where('job_offers.status', 1)
                ->count();

            $vacancy->offersDenied = JobOffer::where('vacancy_id', $vacancy->id)
                ->where('job_offers.status', 2)
                ->count();
            $vacancy->max_success_offers = JobOffer::where('status', 1)->groupBy('vacancy_id')
                ->orderByRaw('count(*) DESC')->select([DB::raw('count(vacancy_id) as max_success_offers'), 'vacancy_id'])->first();
        }


        return view('vacancy.my-vacancies', ['vacancies' => $vacancies]);
    }

    public function printResult()
    {
        $vacancies = Auth::user()->employer->vacancies;
        foreach ($vacancies as &$vacancy) {
            $vacancy->count_offers_success = JobOffer::where('vacancy_id', $vacancy->id)
                ->where('job_offers.status', 1)
                ->count();

            $vacancy->count_offers_denied = JobOffer::where('vacancy_id', $vacancy->id)
                ->where('job_offers.status', 2)
                ->count();



            $vacancy->max_success_offers = JobOffer::where('status', 1)->groupBy('vacancy_id')
                ->orderByRaw('count(*) DESC')->select([DB::raw('count(vacancy_id) as max_success_offers'), 'vacancy_id'])->first();


            $templateProcessor = new TemplateProcessor('word-template/user.docx');
            $templateProcessor->setValue('count_offers_success', $vacancy->count_offers_success);
            $templateProcessor->setValue('count_offers_denied', $vacancy->count_offers_denied);
            $templateProcessor->setValue('max_success_offers', $vacancy->max_success_offers->max_success_offers);
            $vacancyId = JobVacancy::find($vacancy->max_success_offers->vacancy_id);
            $templateProcessor->setValue('title', $vacancyId->title);
            $templateProcessor->setValue('type_of_working', $vacancyId->type_of_working);
            $templateProcessor->setValue('post', $vacancyId->post);
            $templateProcessor->setValue('form_of_work', $vacancyId->form_of_work);
            $templateProcessor->setValue('company_name', $vacancyId->company_name);
            $templateProcessor->setValue('address', $vacancyId->address);
            $templateProcessor->setValue('description', $vacancyId->description);
            $templateProcessor->setValue('sales', $vacancyId->sales);
            $templateProcessor->setValue('created_at', $vacancyId->created_at);
            $file_name = $vacancy->title;
            $templateProcessor->saveAs($file_name . ".docx");


            return response()->download($file_name . ".docx")->deleteFileAfterSend(true);
        }

//        return view('vacancy.my-vacancies', ['vacancies' => $vacancies]);

    }



}


//
//require_once 'bootstrap.php';
//
//// Creating the new document...
//$phpWord = new \PhpOffice\PhpWord\PhpWord();
//
///* Note: any element you append to a document must reside inside of a Section. */
//
//// Adding an empty Section to the document...
//$section = $phpWord->addSection();
//// Adding Text element to the Section having font styled by default...
//$section->addText(
//    '"Learn from yesterday, live for today, hope for tomorrow. '
//    . 'The important thing is not to stop questioning." '
//    . '(Albert Einstein)'
//);
//
///*
// * Note: it's possible to customize font style of the Text element you add in three ways:
// * - inline;
// * - using named font style (new font style object will be implicitly created);
// * - using explicitly created font style object.
// */
//
//// Adding Text element with font customized inline...
//$section->addText(
//    '"Great achievement is usually born of great sacrifice, '
//    . 'and is never the result of selfishness." '
//    . '(Napoleon Hill)',
//    array('name' => 'Tahoma', 'size' => 10)
//);
//
//// Adding Text element with font customized using named font style...
//$fontStyleName = 'oneUserDefinedStyle';
//$phpWord->addFontStyle(
//    $fontStyleName,
//    array('name' => 'Tahoma', 'size' => 10, 'color' => '1B2232', 'bold' => true)
//);
//$section->addText(
//    '"The greatest accomplishment is not in never falling, '
//    . 'but in rising again after you fall." '
//    . '(Vince Lombardi)',
//    $fontStyleName
//);
//
//// Adding Text element with font customized using explicitly created font style object...
//$fontStyle = new \PhpOffice\PhpWord\Style\Font();
//$fontStyle->setBold(true);
//$fontStyle->setName('Tahoma');
//$fontStyle->setSize(13);
//$myTextElement = $section->addText('"Believe you can and you\'re halfway there." (Theodor Roosevelt)');
//$myTextElement->setFontStyle($fontStyle);
//
//// Saving the document as OOXML file...
//$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
//$objWriter->save('helloWorld.docx');
//
//// Saving the document as ODF file...
//$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'ODText');
//$objWriter->save('helloWorld.odt');
//
//// Saving the document as HTML file...
//$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
//$objWriter->save('helloWorld.html');
//
///* Note: we skip RTF, because it's not XML-based and requires a different example. */
///* Note: we skip PDF, because "HTML-to-PDF" approach is used to create PDF documents. */
//
