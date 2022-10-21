<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\NhanVienController;
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


Route::get('/', [EmployeeController::class, 'index'])->name('index');

Route::group(['prefix' => 'employees', 'as' => 'employee.'], function () {
    Route::get('/', [EmployeeController::class, 'index'])->name('index');
    Route::get('/create', [EmployeeController::class, 'create'])->name('create');
    Route::post('/create', [EmployeeController::class, 'store'])->name('store');
    Route::delete('/destroy/{employee}', [EmployeeController::class, 'destroy'])->name('destroy');
    Route::get('/edit/{employee}', [EmployeeController::class, 'edit'])->name('edit');
    Route::put('/update/{employee}', [EmployeeController::class, 'update'])->name('update');
});
