<?php

use App\Http\Controllers\DetailController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\StoreController;
use App\Models\machine;
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

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['role:Admin|SupperAdmin'])->prefix('')->group(function () {
    Route::group(['prefix' => 'employees', 'as' => 'employee.'], function () {
        Route::get('/', [EmployeeController::class, 'index'])->name('index');
        Route::get('/create', [EmployeeController::class, 'create'])->name('create');
        Route::post('/create', [EmployeeController::class, 'store'])->name('store');
        Route::delete('/destroy/{employee}', [EmployeeController::class, 'destroy'])->name('destroy');
        Route::get('/edit/{employee}', [EmployeeController::class, 'edit'])->name('edit');
        Route::put('/update/{employee}', [EmployeeController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => 'stores', 'as' => 'store.'], function () {
        Route::get('/', [StoreController::class, 'index'])->name('index');
        Route::get('/create', [StoreController::class, 'create'])->name('create');
        Route::post('/create', [StoreController::class, 'store'])->name('store');
        Route::delete('/destroy/{store}', [StoreController::class, 'destroy'])->name('destroy');
        Route::get('/edit/{store}', [StoreController::class, 'edit'])->name('edit');
        Route::put('/update/{store}', [StoreController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => 'machines', 'as' => 'machine.'], function () {
        Route::get('/', [MachineController::class, 'index'])->name('index');
        Route::get('/create', [MachineController::class, 'create'])->name('create');
        Route::post('/create', [MachineController::class, 'store'])->name('store');
        Route::delete('/destroy/{machine}', [MachineController::class, 'destroy'])->name('destroy');
        Route::get('/edit/{machine}', [MachineController::class, 'edit'])->name('edit');
        Route::put('/update/{machine}', [MachineController::class, 'update'])->name('update');
    });
});

Route::middleware(['role:User|Admin|SupperAdmin'])->prefix('')->group(function () {
    Route::group(['prefix' => 'details', 'as' => 'detail.'], function () {
        Route::get('/', [DetailController::class, 'index'])->name('index');
        Route::get('/create', [DetailController::class, 'create'])->name('create');
        Route::post('/create', [DetailController::class, 'store'])->name('store');
        // TODO: get Details
        Route::post('/getdetails', [DetailController::class, 'getDetail'])->name('getdetails');
        Route::post('/destroy/', [DetailController::class, 'destroy'])->name('destroy');
        Route::get('/edit/{detail}', [DetailController::class, 'edit'])->name('edit');
        Route::put('/update/{detail}', [DetailController::class, 'update'])->name('update');
        Route::post('export/', [DetailController::class, 'export'])->name('export');
    });
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
});
