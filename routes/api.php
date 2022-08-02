<?php


use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\JurusanController;
use App\Http\Controllers\API\OrmawaController;
use App\Http\Controllers\API\PemiraController;
use App\Http\Controllers\API\CalonKetuaController;
use App\Http\Controllers\API\CalonWakilController;
use App\Http\Controllers\API\KandidatController;
use App\Http\Controllers\API\MahasiswaController;
use App\Http\Controllers\API\VotingController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [UserController::class, 'fetch']);
    Route::get('jurusan', [JurusanController::class, 'all']);
});

Route::get('mahasiswa', [MahasiswaController::class, 'all']);
Route::get('calonKetua', [CalonKetuaController::class, 'all']);
Route::get('calonWakil', [CalonWakilController::class, 'all']);
Route::get('kandidat', [KandidatController::class, 'all']);
Route::get('kandidats', [KandidatController::class, 'show']);
Route::get('ormawa', [OrmawaController::class, 'all']);
Route::get('pemira', [PemiraController::class, 'all']);
Route::post('voting', [VotingController::class, 'vote']);
Route::get('voting', [VotingController::class, 'all']);
Route::post('login', [UserController::class, 'login']);

Route::post('register', [UserController::class, 'register']);
Route::post('signup', [UserController::class, 'signup']);
