<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserCategoryController;
use App\Http\Controllers\UserTimeEntryController;
use App\Http\Controllers\UserTypeController;
use App\Http\Controllers\UserTagController;
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

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);

    Route::group(['middleware' => 'auth:sanctum'], function() {
        Route::get('logout', [AuthController::class, 'logout']);
        Route::get('user', [AuthController::class, 'user']);
    });
});

Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::get('users/{user}/types', [UserTypeController::class, 'index']);
    Route::get('users/{user}/categories', [UserCategoryController::class, 'index']);
    Route::get('users/{user}/tags', [UserTagController::class, 'index']);

    Route::get('users/{user}/time-entries', [UserTimeEntryController::class, 'index']);
    Route::post('users/{user}/time-entries', [UserTimeEntryController::class, 'store']);
    Route::put('users/{user}/time-entries/{timeEntry:id}', [UserTimeEntryController::class, 'update']);
    Route::delete('users/{user}/time-entries/{timeEntry:id}', [UserTimeEntryController::class, 'destroy']);
});
