<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group ([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('admin/', [App\Http\Controllers\AdminController::class, 'store']);
    Route::post('admin/login', [App\Http\Controllers\AdminController::class, 'login'])->name('login');
    Route::post('admin/logout', [App\Http\Controllers\AdminController::class, 'logout']);
    Route::post('admin/me', [App\Http\Controllers\AdminController::class, 'me']);
});

Route::group ([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('dokter/', [App\Http\Controllers\DokterController::class, 'store']);
    Route::post('dokter/login', [App\Http\Controllers\DokterController::class, 'login'])->name('login');
    Route::post('dokter/logout', [App\Http\Controllers\DokterController::class, 'logout']);
    Route::post('dokter/me', [App\Http\Controllers\DokterController::class, 'me']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'obat'
], function ($router) {
    Route::get('/', [App\Http\Controllers\ObatController::class, 'index']);
    Route::get('/{id}', [App\Http\Controllers\ObatController::class, 'show']);
    Route::post('/', [App\Http\Controllers\ObatController::class, 'store']);
    Route::put('/{id}', [App\Http\Controllers\ObatController::class, 'update']);
    Route::delete('/{id}', [App\Http\Controllers\ObatController::class, 'destroy']);
});
