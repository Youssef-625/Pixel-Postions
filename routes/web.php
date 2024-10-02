<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use App\Models\JobTag;
use Illuminate\Support\Facades\Route;



Route::get('/',[JobController::class,'index']);
Route::get('/jobs/create',[JobController::class,'create'])->middleware('auth');
Route::get('/jobs/{job}',[JobController::class,'show']);
Route::post('/jobs',[JobController::class,'store'])->middleware('auth');
Route::get('/jobs/edit/{job}',[JobController::class,'edit'])->middleware('auth')->can('can-edit','job');
Route::patch('/jobs/{job}',[JobController::class,'update'])->middleware('auth')->can('can-edit','job');
Route::delete('/jobs/{job}',[JobController::class,'destroy'])->middleware('auth')->can('can-edit','job');


Route::get('/search',SearchController::class);

Route::get('/tags/{tag:name}',TagController::class);


Route::get('/register',[RegisterUserController::class,'create'])->middleware('guest');
Route::post('/register',[RegisterUserController::class,'store'])->middleware('guest');

Route::get('/login',[SessionController::class,'create'])->middleware('guest')->name('login');
Route::post('/login',[SessionController::class,'store'])->middleware('guest');
Route::delete('/logout',[SessionController::class,'destroy'])->middleware('auth');

