<?php

use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Dashboard\DashbordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('auth.login');
    })->name('login');

    Route::get('auth/google', [GoogleController::class, 'redirect'])->name('auth.google.redirect');
    Route::get('auth/google/callback', [GoogleController::class, 'callback'])->name('auth.google.callback');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [DashbordController::class, 'index'])->name('home');

    Route::auto('/task', Kanban\TaskController::class);

    Route::auto('/status', Kanban\StatusController::class);

    Route::prefix('user')->group(function () {
        
        Route::auto('/role', User\RoleController::class);
    });
});

Route::auto('/auth', Auth\AuthController::class);
