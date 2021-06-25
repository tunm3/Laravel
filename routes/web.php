<?php

use App\Http\Controllers\UserController;
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

Route::get('/user/dang-ki',[UserController::class, 'dangKi']);
Route::post('/user/dang-ki',[UserController::class, 'xuLiDangKi']);
Route::get('/user/login',[UserController::class, 'login']);
Route::get('/user/detail/{id}',[UserController::class, 'getUserDetail']);


Route:: get('/admin/student/create', [\App\Http\Controllers\StudentController::class,'create']);
Route:: get('/admin/student/list', [\App\Http\Controllers\StudentController::class,'getList']);
Route:: get('/admin/student/detail', [\App\Http\Controllers\StudentController::class,'getById']);
Route:: get('/admin/student/update', [\App\Http\Controllers\StudentController::class,'update']);
Route:: get('/admin/student/delete', [\App\Http\Controllers\StudentController::class,'delete']);
Route:: get('/admin/student/view', [\App\Http\Controllers\StudentController::class,'view']);




Route:: get('/admin/teacher/create', [\App\Http\Controllers\TeacherController::class,'create']);
Route:: get('/admin/teacher/list', [\App\Http\Controllers\TeacherController::class,'getList']);
Route:: get('/admin/teacher/detail', [\App\Http\Controllers\TeacherController::class,'getById']);
Route:: get('/admin/teacher/update', [\App\Http\Controllers\TeacherController::class,'update']);
Route:: get('/admin/teacher/delete', [\App\Http\Controllers\TeacherController::class,'delete']);
Route:: get('/admin/teacher/view', [\App\Http\Controllers\TeacherController::class,'view']);






