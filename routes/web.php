<?php

use App\Http\Controllers\Admin\AcademicsController;
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

    /*
     * Routes for academics in admin panel
     */
    Route::prefix('academics')->controller(AcademicsController::class)->group(function () {
        Route::get('/', 'index')->name('admin.academics');
        Route::post('/education', 'storeEducation')->name('admin.academics.education.store');
        Route::get('/education/{education}', 'showEducation')->name('admin.academics.education.show');
    });
});
