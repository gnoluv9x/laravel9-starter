<?php

use App\Http\Controllers\StudentController;
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

Route::resource("students", StudentController::class);

// Route::group(['prefix' => "student", "as" => "student."], function () {
//   Route::get('/create', [StudentController::class, 'create'])->name('create');
//   Route::post('/create', [StudentController::class, 'store'])->name('store');
//   Route::get('/{id}', [StudentController::class, 'edit'])->name('edit');
//   Route::put('/{id}', [StudentController::class, 'update'])->name('update');
//   Route::delete('/{id}', [StudentController::class, 'destroy'])->name('delete');
//   Route::get('/', [StudentController::class, 'index'])->name('index');
// });
