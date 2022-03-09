<?php

use App\Http\Controllers\DashboardController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\OrmawaController;
use App\Http\Controllers\PemiraController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasiswaController;

use App\Http\Controllers\MPM\MpmCalonKetuaController;
use App\Http\Controllers\MPM\MpmCalonWakilController;
use App\Http\Controllers\MPM\MpmKandidatController;

use App\Http\Controllers\BEM\BemCalonKetuaController;
use App\Http\Controllers\BEM\BemCalonWakilController;
use App\Http\Controllers\BEM\BemKandidatController;

use App\Http\Controllers\HIMATIF\HimatifCalonKetuaController;
use App\Http\Controllers\HIMATIF\HimatifCalonWakilController;
use App\Http\Controllers\HIMATIF\HimatifKandidatController;

use App\Http\Controllers\HMM\HmmCalonKetuaController;
use App\Http\Controllers\HMM\HmmKandidatController;

use App\Http\Controllers\HIMRA\HimraCalonKetuaController;
use App\Http\Controllers\HIMRA\HimraKandidatController;

use App\Http\Controllers\HIMAKES\HimakesCalonKetuaController;
use App\Http\Controllers\HIMAKES\HimakesCalonWakilController;
use App\Http\Controllers\HIMAKES\HimakesKandidatController;



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

        // mpm
        Route::resource('mpm/calonKetuaMpm', MpmCalonKetuaController::class);
        Route::resource('mpm/calonWakilMpm', MpmCalonWakilController::class);
        Route::resource('mpm/kandidatMpm', MpmKandidatController::class);

        // bem
        Route::resource('bem/calonKetuaBem', BemCalonKetuaController::class);
        Route::resource('bem/calonWakilBem', BemCalonWakilController::class);
        Route::resource('bem/kandidatBem', BemKandidatController::class);

        // himatif
        Route::resource('himatif/calonKetuaHimatif', HimatifCalonKetuaController::class);
        Route::resource('himatif/calonWakilHimatif', HimatifCalonWakilController::class);
        Route::resource('himatif/kandidatHimatif', HimatifKandidatController::class);

        // hmm
        Route::resource('hmm/calonKetuaHmm', HmmCalonKetuaController::class);
        Route::resource('hmm/kandidatHmm', HmmKandidatController::class);

        // himra
        Route::resource('himra/calonKetuaHimra', HimraCalonKetuaController::class);
        Route::resource('himra/kandidatHimra', HimraKandidatController::class);

        // himakes
        Route::resource('himakes/calonKetuaHimakes', HimakesCalonKetuaController::class);
        Route::resource('himakes/calonWakilHimakes', HimakesCalonWakilController::class);
        Route::resource('himakes/kandidatHimakes', HimakesKandidatController::class);



        // user
        Route::get('user/create', [UserController::class, 'create'])->name('users.create');
        Route::get('ormawa/create', [OrmawaController::class, 'create'])->name('ormawa.create');
        Route::get('pemira/create', [PemiraController::class, 'create'])->name('pemira.create');
        Route::get('jurusan/create', [JurusanController::class, 'create'])->name('jurusan.create');
        Route::get('mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');

        Route::get('mpm/calonKetua/create', [MpmCalonKetuaController::class, 'create'])->name('mpm.calonKetua.create');
        Route::get('mpm/calonKetua/edit{id}', [MpmCalonKetuaController::class, 'edit'])->name('mpm.calonKetua.edit');
        Route::get('mpm/calonWakil/create', [MpmCalonWakilController::class, 'create'])->name('mpm.calonWakil.create');
        Route::get('mpm/kandidat/create', [MpmKandidatController::class, 'create'])->name('mpm.kandidat.create');

        Route::get('bem/calonKetua/create', [BemCalonKetuaController::class, 'create'])->name('bem.calonKetua.create');
        Route::get('bem/calonWakil/create', [BemCalonWakilController::class, 'create'])->name('bem.calonWakil.create');
        Route::get('bem/kandidat/create', [BemKandidatController::class, 'create'])->name('bem.kandidat.create');

        Route::get('himatif/calonKetua/create', [HimatifCalonKetuaController::class, 'create'])->name('himatif.calonKetua.create');
        Route::get('himatif/calonWakil/create', [HimatifCalonWakilController::class, 'create'])->name('himatif.calonWakil.create');
        Route::get('himatif/kandidat/create', [HimatifKandidatController::class, 'create'])->name('himatif.kandidat.create');

        Route::get('hmm/calonKetua/create', [HmmCalonKetuaController::class, 'create'])->name('hmm.calonKetua.create');
        Route::get('hmm/kandidat/create', [HmmKandidatController::class, 'create'])->name('hmm.kandidat.create');

        Route::get('himra/calonKetua/create', [HimraCalonKetuaController::class, 'create'])->name('himra.calonKetua.create');
        Route::get('himra/kandidat/create', [HimraKandidatController::class, 'create'])->name('himra.kandidat.create');

        Route::get('himakes/calonKetua/create', [HimakesCalonKetuaController::class, 'create'])->name('himakes.calonKetua.create');
        Route::get('himakes/calonWakil/create', [HimakesCalonWakilController::class, 'create'])->name('himakes.calonWakil.create');
        Route::get('himakes/kandidat/create', [HimakesKandidatController::class, 'create'])->name('himakes.kandidat.create');
    });
