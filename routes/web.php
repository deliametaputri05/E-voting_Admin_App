<?php

use App\Http\Controllers\DashboardController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\OrmawaController;
use App\Http\Controllers\PemiraController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\CalonKetuaController;
use App\Http\Controllers\CalonWakilController;
use App\Http\Controllers\KandidatController;
use App\Http\Controllers\VotingController;
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

Route::get('/coba', function () {
    return view('test');
});


Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::prefix('dashboard')
    ->middleware(['auth:sanctum', 'admin'])
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


        Route::resource('users', UserController::class);
        Route::resource('ormawa', OrmawaController::class);
        Route::resource('pemira', PemiraController::class);
        Route::resource('jurusan', JurusanController::class);
        Route::resource('mahasiswa', MahasiswaController::class);
        Route::resource('calonKetua', CalonKetuaController::class);
        Route::resource('calonWakil', CalonWakilController::class);
        Route::resource('kandidat', KandidatController::class);
        Route::resource('voting', VotingController::class);

        // user
        Route::get('user/create', [UserController::class, 'create'])->name('users.create');
        Route::get('ormawa/create', [OrmawaController::class, 'create'])->name('ormawa.create');
        Route::get('pemira/create', [PemiraController::class, 'create'])->name('pemira.create');
        Route::get('jurusan/create', [JurusanController::class, 'create'])->name('jurusan.create');
        Route::get('mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
        Route::get('calonKetua/create', [CalonKetuaController::class, 'create'])->name('calonKetua.create');
        Route::get('calonWakil/create', [CalonWakilController::class, 'create'])->name('calonWakil.create');
        Route::get('kandidat/create', [KandidatController::class, 'create'])->name('kandidat.create');
    });
