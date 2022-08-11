<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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


Route::get('/',[QuestionController::class, 'index'])->name('index')->middleware('auth');
Route::get('/create', [QuestionController::class, 'create'])->name('create');
Route::post('/store', [QuestionController::class, 'store'])->name('store');
