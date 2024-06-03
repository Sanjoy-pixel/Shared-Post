<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthSignupController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\TestAdmin;

use Illuminate\Support\Facades\Route;






// Route::resource('shareposts', SharePostController::class)->only(['index', 'show']);




Route::get('/', fn () => to_route('checks.index'));



Route::middleware('auth')->group(function () {

    Route::middleware('admin')->resource('admin', AdminController::class);

    Route::resource('checks', CheckController::class);
});








Route::get('signup', fn () => to_route('authsignup.create'))->name('signup');
Route::resource('authsignup', AuthSignupController::class)->only(['create', 'store']);


Route::get('login', fn () => to_route('auth.create'))->name('login');
Route::resource('auth', AuthController::class)->only(['create', 'store']);


Route::delete('logout', fn () => to_route('auth.destroy'))->name('logout');
Route::delete('auth', [AuthController::class, 'destroy'])->name('auth.destroy');
