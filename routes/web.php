<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\StudentController;

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

Route::get('/logout', [LoginController::class,'logout'])->name('logout');
Route::get('/login', [LoginController::class,'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class,'login']);
Route::get('/register', [RegisterController::class,'showRegistrationForm'])->name('register');
Route::post('/register',  [RegisterController::class,'register']);

//Question
Route::group(['middleware' => ['auth'], 'prefix' => '/admin/questions', 'as' => 'admin.questions.'], function () {
    Route::get('/',[QuestionController::class, 'index'])->name('index');
    Route::get('/create', [QuestionController::class, 'create'])->name('create');
    Route::post('/store', [QuestionController::class, 'store'])->name('store');
    Route::get('/{id}/show', [QuestionController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [QuestionController::class, 'edit'])->name('edit');
    Route::post('/{id}/update', [QuestionController::class, 'update'])->name('update');
    Route::get('/{id}/delete', [QuestionController::class, 'destroy'])->name('delete');
    Route::delete('{qs_id}/{id}/deletequestion', [QuestionController::class, 'deletequestion'])->name('deletequestion');       
    Route::get('/changeStatus', [QuestionController::class, 'changeStatus'])->name('changeStatus');
    Route::get('/{id}/result', [QuestionController::class, 'result'])->name('result');
    Route::get('/{id}/export', [QuestionController::class, 'export'])->name('export');
    Route::get('/{id}/sendMail', [QuestionController::class, 'sendMail'])->name('sendMail');
 });

//Students
Route::group(['middleware' => ['auth'], 'prefix' => '/admin/students', 'as' => 'admin.students.'], function () {
    Route::get('/',[StudentController::class, 'index'])->name('index');
    Route::get('/create', [StudentController::class, 'create'])->name('create');
    Route::post('/store', [StudentController::class, 'store'])->name('store');
    Route::get('/{id}/show', [StudentController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [StudentController::class, 'edit'])->name('edit');
    Route::post('/{id}/update', [StudentController::class, 'update'])->name('update');
    Route::get('/{id}/delete', [StudentController::class, 'destroy'])->name('delete');   
});

//ExamHistory
Route::get('/admin/examHistory', [QuestionController::class, 'examHistory'])->name('admin.examHistory')->middleware('auth');

//When Students answer question
Route::get('/question/{qs_id}', [QuestionController::class, 'showQuestionLogin'])->name('question.showQuestionLogin')->middleware('validateQuestionSheetUrl');
Route::post('/question/{qs_id}', [StudentController::class, 'validateAccessCode'])->name('question.validateAccessCode')->middleware('validateQuestionSheetUrl');
Route::post('/question/handle_answers/{qs_id}', [QuestionController::class, 'handleAnswers'])->name('question.handleAnswers');

