<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegLogController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\EloquentController;
use App\Http\Controllers\NewsController;


Route::get('/', function () {
    return view('welcome');
}) ->name('home');


Route::get('/api/auth', function () {
    return view('login');
}) ->name('login');


Route::get('/api/user', [RegLogController::class, 'create']) ->middleware('guest');

Route::post('/api/user', [RegLogController::class, 'register']) ->middleware('guest');

Route::post('/api/auth', [RegLogController::class, 'login']) ->middleware('guest');;

Route::delete('/api/auth', [RegLogController::class, 'logout']) ->middleware('auth');

Route::get('/forgot-password', [ForgotPasswordController::class, 'create']) ->middleware('guest') ->name('password.request');

Route::post('/forgot-password', [ForgotPasswordController::class, 'store']) ->middleware('guest') ->name('password.email');

Route::get('/reset-password', [ResetPasswordController::class, 'create']) ->middleware('guest') ->name('password.reset');

Route::post('/reset-password', [ResetPasswordController::class, 'store']) ->middleware('guest') ->name('password.update');

Route::get('/random-news', function () {
    return view('randomNews');
}) ->middleware('auth');

Route::get('/api/news', [NewsController::class, 'news']) ->middleware('auth');

Route::get('/eloquent', function() {
    return view('eloquent');
}) ->middleware('auth');

Route::get('/api/frequent', [EloquentController::class, 'getData']) ->middleware('auth');

Route::post('/api/addword', [EloquentController::class, 'addWord']) ->middleware('auth');

Route::match(array('GET', 'POST'),'/api/paginate', [EloquentController::class, 'getPage']) ->middleware('auth');

Route::get('/paginate', function() {
    return view('paginate');
}) ->middleware('auth');

