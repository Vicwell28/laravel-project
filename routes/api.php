<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccessCodeTypesController;
use App\Http\Controllers\ValidateCodesAccessController;
use App\Models\ValidateCodesAccess;
use App\Models\User;

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

Route::post('/validar-token/movil', [ValidateCodesAccessController::class, 'store_validate_movil'])->name('validar.token.movil');
