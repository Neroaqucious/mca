<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\DashboardController;

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


Route::prefix('admin')->group(function(){
    Route::get('auth/login', [UserController::class, 'login'])->name('login');
    Route::post('auth/login', [UserController::class, 'authenticate']);

    Route::middleware('auth')->group(function(){                
        Route::get('auth/logout', [UserController::class, 'logout'])->name('logout');
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        Route::get('role/search',[RoleController::class, 'searchView']);
        Route::any('role/search',[RoleController::class, 'search'])->name('role.search');


        Route::get('role',[RoleController::class, 'index'])->name('role.index');
        Route::get('role/create', [RoleController::class, 'create'])->name('role.create');
        Route::post('role/create', [RoleController::class, 'store'])->name('role.store');
        Route::get('role/{role}/edit', [RoleController::class, 'edit'])->name('role.edit');
        Route::patch('role/update/{role}', [RoleController::class, 'update'])->name('role.update');
        Route::get('role/delete/{role}', [RoleController::class, 'destroy'])->name('role.destroy');

    });
    
});

