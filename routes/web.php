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
    ->name('user.edit')
    ->middleware("auth");

Route::put('/user/edit/{id}', [App\Http\Controllers\DashboardController::class, 'edit_profile'])
    ->name('edit.profile')
    ->middleware("auth");

Route::get('/journal/create', [App\Http\Controllers\JournalController::class, 'create'])
    ->name('journal.add')
    ->middleware("auth");

Route::post('/journal/store', [App\Http\Controllers\JournalController::class, 'store'])
    ->name('journal.store')
    ->middleware("auth");


Route::get('/journal/edit/{id}', [App\Http\Controllers\JournalController::class, 'edit'])
    ->name('journal.edit')
    ->middleware("auth");


Route::put('/journal/update/{id}', [App\Http\Controllers\JournalController::class, 'update'])
    ->name('journal.update')
    ->middleware("auth");

Route::get('/journal/all', [App\Http\Controllers\JournalController::class, 'index'])
    ->name('journal.index')
    ->middleware("auth");

Route::delete('/journal/delete', [App\Http\Controllers\JournalController::class, 'delete'])
    ->name('journal.delete')
    ->middleware("auth");





