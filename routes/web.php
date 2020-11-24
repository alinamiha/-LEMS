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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/main-page', function () {
    return view('main-page');
});

Route::get('/info-for-allowance', function () {
    return view('allowance');
});
Route::get('/info-for-employee', function () {
    return view('employee');
});
Route::get('/my-account', function () {
    return view('my-account');
});

Route::get('/allowance', 'AllowanceController@index');
Route::get('/allowance/create', 'AllowanceController@create');
Route::post('/allowance', 'AllowanceController@store');
Route::get('/allowance/{allowance}', 'AllowanceController@show');
Route::get('/allowance/{allowance}/edit', 'AllowanceController@edit');
Route::put('/allowance/{allowance}/edit', 'AllowanceController@update');


Route::get('/cv', 'CurriculumVitaeController@index');
Route::get('/cv/create', 'CurriculumVitaeController@create');
Route::post('/cv', 'CurriculumVitaeController@store');

Route::get('/vacancy', 'JobVacancyController@index');
Route::get('/vacancy/create', 'JobVacancyController@create');
Route::post('/vacancy', 'JobVacancyController@store');
//Route::get('/cv/{cv}', 'CurriculumVitaeController@show');



Route::get('/employee', 'EmployeeController@index');
Route::get('/employee/create', 'EmployeeController@create');
Route::post('/employee', 'EmployeeController@store');
Route::get('/employee/{employee}', 'EmployeeController@show');
Route::get('/employee/{employee}/edit', 'EmployeeController@edit');
Route::put('/employee/{employee}/edit', 'EmployeeController@update');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



