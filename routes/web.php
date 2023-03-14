<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ValidateCodesAccess;
use App\Http\Controllers\ValidateCodesAccessController;


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

Route::get('/token/{user}', [ValidateCodesAccessController::class, 'show'])->name('token');
Route::post('/validar-token', [ValidateCodesAccessController::class, 'store_validate'])->name('validar.token');
Route::get('/send/token', [ValidateCodesAccessController::class, 'store'])->name('send.token');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'AuthCode'])->name('dashboard');

Route::middleware(['auth', 'AuthCode'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
