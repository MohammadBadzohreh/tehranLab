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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/user/edit', [App\Http\Controllers\DashboardController::class, 'user'])
    ->name('user')
    ->middleware("auth");

Route::put('/user/edit/{id}', [App\Http\Controllers\DashboardController::class, 'edit_profile'])
    ->name('edit.profile')
    ->middleware("auth");


