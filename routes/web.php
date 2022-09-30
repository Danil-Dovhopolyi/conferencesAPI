<?php

use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
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

Route::get('/conferences', [ConferenceController::class, 'getConferences'])->name('conferences.index');
Route::get('/conferences/create', [ConferenceController::class, 'createConference'])->name('conferences.create');
Route::get('/conferences/{conference}', [ConferenceController::class, 'showConference'])->name('conferences.show');
Route::get('/conferences/{conference}/edit', [ConferenceController::class, 'editConference'])->name('conferences.edit');
Route::patch('/conferences/{conference}', [ConferenceController::class, 'updateConference'])->name('conferences.update');
Route::post('/conferences', [ConferenceController::class, 'storeConference'])->name('conferences.store');
Route::delete('/conferences/{conference}', [ConferenceController::class, 'destroyConference'])->name('conferences.delete');

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('auth.login');
Route::post('/login_process', [LoginController::class, 'login'])->name('login_process');
Route::post('/logout', [HomeController::class, 'logout'])->name('logout');


