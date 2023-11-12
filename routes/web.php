<?php

use App\Http\Controllers\AlatController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BibitController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TanamanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PupukController;

Route::get('/', function () {
    return view('auth/login');
});

//Route Auth
Route::controller(AuthController::class)->group(function () {
Route::get('register', 'register')->name('register');
Route::post('register', 'registerSave')->name('register.save');
Route::get('login', 'login')->name('login');
Route::post('login', 'loginAction')->name('login.action');
Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

//Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {
   
    Route::get('admin/dashboard', [AuthController::class, 'index'])->name('admin.dashboard');

    Route::controller(TanamanController::class)->prefix('admin')->group(function () {
        Route::get('tanaman/', 'index')->name('tanamans.index');
        Route::get('create', 'create')->name('tanamans.create');
        Route::post('store', 'store')->name('tanamans.store');
        Route::get('show/{id}', 'show')->name('tanamans.show');
        Route::get('edit/{id}', 'edit')->name('tanamans.edit');
        Route::put('edit/{id}', 'update')->name('tanamans.update');
        Route::delete('destroy/{id}', 'destroy')->name('tanamans.destroy');
        });
    //Route Profile Admin
    Route::get('admin/profile', [AuthController::class, 'profile'])->name('admin.profile');
});
   
// //supplier Routes List
Route::middleware(['auth', 'user-access:supplier'])->group(function () {
   
    Route::get('supplier/dashboard', [AuthController::class, 'index'])->name('supplier.dashboard');
    //Route Tanaman Tabel supplier
    Route::controller(TanamanController::class)->prefix('supplier')->group(function () {
        Route::get('tanaman/', 'index')->name('tanamans.index');
        Route::get('create', 'create')->name('tanamans.create');
        Route::post('store', 'store')->name('tanamans.store');
        Route::get('show/{id}', 'show')->name('tanamans.show');
        Route::get('edit/{id}', 'edit')->name('tanamans.edit');
        Route::put('edit/{id}', 'update')->name('tanamans.update');
        Route::delete('destroy/{id}', 'destroy')->name('tanamans.destroy');
        });
//Route Profile supplier
            Route::get('supplier/profile', [AuthController::class, 'profile'])->name('supplier.profile');
});

//Normal Users Routes List
Route::middleware(['auth', 'user-access:user'])->group(function () {
   
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/{chartId}', [DashboardController::class ,'index'])->name('dashboard.chart');

///Route tanamans
Route::controller(TanamanController::class)->prefix('tanaman')->group(function () {
    Route::get('', 'index')->name('tanamens');
    Route::get('create', 'create')->name('tanamens.create');
    Route::post('store', 'store')->name('tanamens.store');
    Route::get('show/{id}', 'show')->name('tanamens.show');
    Route::get('edit/{id}', 'edit')->name('tanamens.edit');
    Route::put('edit/{id}', 'update')->name('tanamens.update');
    Route::delete('destroy/{id}', 'destroy')->name('tanamens.destroy');
    });

    ///Route pupuks
Route::controller(PupukController::class)->prefix('pupuk')->group(function () {
    Route::get('', 'index')->name('pupuks');
    Route::get('create', 'create')->name('pupuks.create');
    Route::post('store', 'store')->name('pupuks.store');
    Route::get('show/{id}', 'show')->name('pupuks.show');
    Route::get('edit/{id}', 'edit')->name('pupuks.edit');
    Route::put('edit/{id}', 'update')->name('pupuks.update');
    Route::delete('destroy/{id}', 'destroy')->name('pupuks.destroy');
    });

    ///Route bibits
Route::controller(BibitController::class)->prefix('bibit')->group(function () {
    Route::get('', 'index')->name('bibits');
    Route::get('create', 'create')->name('bibits.create');
    Route::post('store', 'store')->name('bibits.store');
    Route::get('show/{id}', 'show')->name('bibits.show');
    Route::get('edit/{id}', 'edit')->name('bibits.edit');
    Route::put('edit/{id}', 'update')->name('bibits.update');
    Route::delete('destroy/{id}', 'destroy')->name('bibits.destroy');
    });

    ///Route alats
Route::controller(AlatController::class)->prefix('alat')->group(function () {
    Route::get('', 'index')->name('alats');
    Route::get('create', 'create')->name('alats.create');
    Route::post('store', 'store')->name('alats.store');
    Route::get('show/{id}', 'show')->name('alats.show');
    Route::get('edit/{id}', 'edit')->name('alats.edit');
    Route::put('edit/{id}', 'update')->name('alats.update');
    Route::delete('destroy/{id}', 'destroy')->name('alats.destroy');
    });

    ///Route users
Route::controller(KaryawanController::class)->prefix('user')->group(function () {
    Route::get('', 'index')->name('users');
    Route::get('create', 'create')->name('users.create');
    Route::post('store', 'store')->name('users.store');
    Route::get('show/{id}', 'show')->name('users.show');
    Route::get('edit/{id}', 'edit')->name('users.edit');
    Route::put('edit/{id}', 'update')->name('users.update');
    Route::delete('destroy/{id}', 'destroy')->name('users.destroy');
    });

//Route Profil
Route::get('profile', [AuthController::class, 'profile'])->name('profile');
});

//Route notifikasi
// Route::get('user-notify', [UserController::class, 'notif']);
//Route chart 
// Route::get('/dashboard', 'DashboardController@index')->name('dashboard');