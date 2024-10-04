<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');
Route::resource('students', 'StudentController');
Route::resource('campuses', 'CampusController');
Route::resource('colleges', 'CollegeController');
Route::resource('programs', 'ProgramController');
Route::resource('programMajors', 'ProgramMajorController');
Route::resource('courses', 'CourseController');
Route::resource('acadYears', 'AcadYearController');
Route::resource('acadTerms', 'AcadTermController');
Route::resource('signatories', 'SignatoryController');
Route::resource('curricula', 'CurriculumController');
Route::resource('curriculumAcadTerms', 'CurriculumAcadTermController');
Route::resource('programCurricula', 'ProgramCurriculumController');
Route::resource('studentGraduationInfos', 'StudentGraduationInfoController');
Route::resource('studentRegistrationInfos', 'StudentRegistrationInfoController');
Route::resource('studentRecords', 'StudentRecordController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
