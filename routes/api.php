<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\KabupatenController;
use App\Http\Controllers\Api\KecamatanController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('kabupaten', [KabupatenController::class, 'index']);
Route::post('kabupaten', [KabupatenController::class, 'store']);

Route::get('kecamatan', [KecamatanController::class, 'index']);
Route::post('kecamatan', [KecamatanController::class, 'store']);




