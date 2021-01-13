<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', function () {
    return view('main-page');
});

Route::get('/info-for-allowance', function () {
    return view('allowance');
});
Route::get('/info-for-employer', function () {
    return view('employer');
});
Route::get('/info-for-unemployed', function () {
    return view('unemployed');
});
Route::get('/my-account', function () {
    return view('my-account');
});

Route::get('/university', function () {
    return view('university');
});
Route::get('/my-account', function () {
    return view('my-account');
});
Route::get('/my-account', 'Controller@isTypeOfUser');


Route::get('/allowance', 'AllowanceController@index');
Route::get('/allowance/create', 'AllowanceController@create');
Route::post('/allowance', 'AllowanceController@store');
Route::get('/allowance/{allowance}', 'AllowanceController@show');
Route::get('/allowance/{allowance}/edit', 'AllowanceController@edit');
Route::put('/allowance/{allowance}/edit', 'AllowanceController@update');
Route::get('/my-allowances', 'AllowanceController@showUserAllowances');



Route::get('/cv', 'CurriculumVitaeController@index');
Route::get('/cv/create', 'CurriculumVitaeController@create');
Route::post('/cv', 'CurriculumVitaeController@store');
Route::get('/cv/{cv}', 'CurriculumVitaeController@show');
Route::delete('/cv/{cv}', 'CurriculumVitaeController@destroy');
Route::get('/my-cv', 'CurriculumVitaeController@showUserCv');

//Route::resource('/cv', 'CurriculumVitaeController',['only' => ['index', 'create', 'store', 'show', 'destroy']]);




Route::get('/vacancy', 'JobVacancyController@index');
Route::get('/vacancy/create', 'JobVacancyController@create');
Route::post('/vacancy', 'JobVacancyController@store');
Route::get('/vacancy/{vacancy}', 'JobVacancyController@show');
Route::get('/my-vacancies', 'JobVacancyController@showUserVacancies');




Route::get('/employer', 'EmployerController@index');
Route::get('/info-for-employer', 'EmployerController@isEmployer');
Route::get('/employer/create', 'EmployerController@create');
Route::post('/employer', 'EmployerController@store');
Route::get('/employer/{employer}', 'EmployerController@show');
Route::get('/employer/{employer}/edit', 'EmployerController@edit');
Route::put('/employer/{employer}/edit', 'EmployerController@update');
//Job Offer
Route::get('/job-offer/', 'JobOfferController@index');
Route::post('/job-offer/{unemployed}/store', 'JobOfferController@store');




Route::get('/info/{id}/print', 'JobVacancyController@printResult');

//Route::group(['middleware' => 'auth'], function(){
//    Route::group(['middleware' => 'admin'], function(){
//        Route::get('/admin', 'AdminController@index')->name('admin');
//    });
//});


Route::get('/admin', 'AdminController@index');

Route::get('/record-of-services', 'RecordOfServiceController@create');
Route::post('/record-of-services', 'RecordOfServiceController@store');
Route::get('/record-of-services/{work}/edit', 'RecordOfServiceController@edit');
Route::put('/record-of-services/{work}', 'RecordOfServiceController@update');
Route::delete('/record-of-services/{work}', 'RecordOfServiceController@destroy');


Route::delete('/search/result', 'SearchController@index');
Route::delete('/autocomplete', 'SearchController@search');
//Category
Route::get('category/search', 'JobCategoryController@search');

Route::put('offers/{offer}/access', [App\Models\JobOffer::class, 'offerAccept']);
Route::put('offers/{offer}/denied', [App\Models\JobOffer::class, 'offerDenied']);



Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




