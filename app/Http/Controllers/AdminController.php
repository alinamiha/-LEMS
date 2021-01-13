<?php

namespace App\Http\Controllers;

use App\Models\Allowance;
use App\Models\CurriculumVitae;
use App\Models\JobOffer;
use App\Models\JobVacancy;
use App\Models\Unemployed;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::user()->type !== "admin") {
            return back();
        }
        $users = User::all();
        foreach ($users as $user) {
            $countRegisteredUsers = User::whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])->count();
        }
        $offers = JobOffer::query()
            ->join('job_vacancies', 'job_vacancies.id', '=', 'job_offers.vacancy_id')
            ->join('unemployeds', 'unemployeds.id', '=', 'job_offers.unemployed_id')
            ->join('users', 'unemployeds.user_id', '=', 'users.id')
            ->select([
                'job_offers.id as offer_id',
                'users.name as unemployed_name',
                'job_vacancies.title as vacancy_title',
                'job_vacancies.type_of_working as type_of_working',
                'job_vacancies.sales as sales',
                'job_offers.status as status',
                'job_vacancies.id as vacancy_id',
            ])
            ->get();


        $unemployeds = Unemployed::query()
            ->leftJoin('curriculum_vitaes', 'unemployeds.id', '=', 'curriculum_vitaes.unemployed_id')
            ->join('users', 'users.id', '=', 'unemployeds.user_id')
            ->leftJoin('allowances', 'unemployeds.id', '=', 'allowances.unemployed_id')
            ->where('curriculum_vitaes.unemployed_id',NULL)
            ->select([
                'users.name as name',
                'unemployeds.id as unemployed_id',
                'unemployeds.user_id as user_id',
            ])
            ->get();
        return view('admin.index', ['offers' => $offers,
            'unemployeds' => $unemployeds]);
    }
}
