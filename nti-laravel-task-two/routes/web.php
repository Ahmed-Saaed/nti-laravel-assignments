<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\blog;
use App\Http\Controllers\studentsController;

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

// Route::get('blog/create', [blog::class, 'create']);
// Route::post('blog/store', [blog::class, 'store']);

// Route::get('blog/users', [blog::class, 'index']);

// Route::get('blog/edit/{id}', [blog::class, 'edit']);
// Route::post('blog/update', [blog::class, 'update']);

// start students routes

Route::get('students/register', [studentsController::class, 'create']);
Route::post('students/store', [studentsController::class, 'store']);

Route::get('students/info', [studentsController::class, 'index']);

Route::get('students/delete/{id}', [studentsController::class, 'destroy']);
Route::get('students/edit/{id}', [studentsController::class, 'edit']);
Route::post('students/update', [studentsController::class, 'update']);

Route::get('students/login', [studentsController::class, 'Login']);
Route::post('doLogin', [studentsController::class, 'doLogin']);
Route::get('logout', [studentsController::class, 'Logout']);