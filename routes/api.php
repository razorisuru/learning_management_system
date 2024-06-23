<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserAPIController;
use App\Http\Controllers\Api\DegreeProgrammeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/degree_programmes/{degree}/subjects', [DegreeProgrammeController::class, 'getSubjects']);

Route::get('/users', [UserAPIController::class, 'index']);
Route::post('/users', [UserAPIController::class, 'store']);
Route::get('/users/{id}', [UserAPIController::class, 'show']);
Route::put('/users/{id}', [UserAPIController::class, 'update']);
Route::delete('/users/{id}', [UserAPIController::class, 'destroy']);
