<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/', [HomeController::class,'index']);


Route::post('/create', [MessageController::class,'create']);
Route::get('/message/{id}', [MessageController::class,'view_message']);


Route::get('/student', [StudentController::class,'index']);
Route::get('/student/add-student-form', [StudentController::class,'add_student_form']);
Route::post('/student/add_student', [StudentController::class,'add_student']);
Route::get('student/edit/{id}', [StudentController::class,'edit_student_form']);
Route::post('/student/update_student', [StudentController::class,'update_student']);
Route::get('student/delete/{id}', [StudentController::class,'delete_student']);


