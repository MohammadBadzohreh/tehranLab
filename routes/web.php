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

Route::resource("article", \App\Http\Controllers\ArticleController::class);

Route::get("/about", [\App\Http\Controllers\FrontController::class, "about"]);


Route::get("role/create", [\App\Http\Controllers\RolePermissionController::class, "createRole"])->name("role.create");

Route::post("role/store", [\App\Http\Controllers\RolePermissionController::class, "storeRole"])->name("role.store");


Route::get("role/all", [\App\Http\Controllers\RolePermissionController::class, "index"])->name("role.index");

Route::get("role/edit/{id}", [\App\Http\Controllers\RolePermissionController::class, "edit"])->name("role.edit");
Route::put("role/update/{id}", [\App\Http\Controllers\RolePermissionController::class, "update"])->name("role.update");
Route::delete("role/delete/{id}", [\App\Http\Controllers\RolePermissionController::class, "delete"])->name("role.destroy");


Route::get("/users", [\App\Http\Controllers\UserController::class, "index"])->name("users.index");

Route::delete("/user/{id}", [\App\Http\Controllers\UserController::class, "delete"])->name("user.destroy");

Route::get("/user/editRole/{id}", [\App\Http\Controllers\UserController::class, "editRole"])->name("user.editRole");

Route::post("/user/editRole/{id}", [\App\Http\Controllers\UserController::class, "editRoleUser"])->name("user.editRole");

Route::resource("news", \App\Http\Controllers\NewsController::class);

Route::post('ckeditor/upload', [\App\Http\Controllers\NewsController::class,"uploadImage"])->name('ckeditor.upload');












