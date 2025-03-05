<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\CheckSuperAdminMiddlware;
use Illuminate\Support\Facades\Auth;
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

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('processLogin', [AuthController::class, 'processLogin'])->name('process_login');
Route::get('logout', [AuthController::class, 'processLogout'])->name('logout');

Route::group(['middleware' => AuthMiddleware::class], function () {
  Route::resource("courses", CourseController::class)->except(['destroy']);
  Route::resource("students", StudentController::class)->except(['destroy']);

  Route::group(['middleware' => CheckSuperAdminMiddlware::class], function () {
    Route::delete('courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');
    Route::delete('students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
  });
});
