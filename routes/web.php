<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LearningMaterialsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/UploadPDF', [LearningMaterialsController::class, 'index'])->name('UploadPDF');
// });

Route::get('/admin', [AdminController::class, 'index'])->middleware(['auth', 'admin'])->name('admin');

Route::get('/pre', [LearningMaterialsController::class, 'pre'])->middleware(['auth'])->name('pre');

Route::get('/UploadPDF', [LearningMaterialsController::class, 'index'])->middleware(['auth'])->name('UploadPDF');
Route::post('/UploadPDF/upload', [LearningMaterialsController::class, 'upload'])->middleware(['auth'])->name('upload');

