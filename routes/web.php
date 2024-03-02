<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\WebHomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [WebHomeController::class, 'index'])->name('homepage');

Route::get('login', function () {
    return view('auth.login');
})->name('login');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('admin.profile'); // Profile index page admin side
    Route::patch('/profile/update/{field}', [ProfileController::class, 'updateField'])->name('admin.profile.updateField'); // left part of profile page admin side
    Route::post('/profile/update-picture/', [ProfileController::class, 'updatePicture'])->name('admin.profile.updatePicture');
    Route::post('/profile/update-personal-info/', [ProfileController::class, 'updatePersonalInfo'])->name('admin.profile.updatePersonalInfo'); // right part of profile page admin side
});
