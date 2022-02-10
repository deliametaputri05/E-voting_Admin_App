<?php

use App\Http\Controllers\API\ApplyController;
use App\Http\Controllers\API\EducationController;
use App\Http\Controllers\API\JobController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CompanyController;
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
    Route::post('user', [UserController::class, 'updateProfile']);
    Route::post('user/photo', [UserController::class, 'updatePhoto']);
    Route::post('logout', [UserController::class, 'logout']);

    Route::post('user/cv', [ApplyController::class, 'uploadFile']);
    Route::post('upload', [ApplyController::class, 'upload']);

    Route::post('submit', [ApplyController::class, 'submit']);
    Route::get('apply', [ApplyController::class, 'all']);
    Route::post('create', [EducationController::class, 'create']);
    Route::get('edu', [EducationController::class, 'all']);
    Route::post('apply/{id}', [ApplyController::class, 'update']);
});


Route::post('login', [UserController::class, 'login']);

Route::post('register', [UserController::class, 'register']);
Route::post('signup', [UserController::class, 'signup']);





Route::get('job', [JobController::class, 'all']);
Route::get('company', [CompanyController::class, 'all']);
