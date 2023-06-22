<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

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

// Route::get('/', function () {
//     return view('job');
// });
Route::get('/', [JobController::class,'index'])->name('jobs.index');



Route::get('/jobs', [JobController::class,'index'])->name('jobs.index');
Route::get('/getAllJobs',[JobController::class,'getAllJobs'])->name('jobs.getAllJobs');
Route::get('/jobs/create', [JobController::class,'create']);
Route::post('/jobs/store',[JobController::class,'store'])->name('jobs.store');
Route::get('/jobs/{id}',[JobController::class,'show'])->name('jobs.show');

// Route::get('/jobs/{id}',[JobController::class,'show'])->name('jobs.get.one');