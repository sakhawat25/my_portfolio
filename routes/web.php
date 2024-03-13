<?php

use App\Http\Controllers\Admin\AcademicsController;
use App\Http\Controllers\Admin\CareerController;
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

        // Education routes
        Route::prefix('education')->group(function () {
            Route::post('/', 'storeEducation')->name('admin.academics.education.store');
            Route::get('/{education}', 'showEducation')->name('admin.academics.education.show');
            Route::put('/{education}', 'updateEducation')->name('admin.academics.education.update');
            Route::delete('/{education}', 'deleteEducation')->name('admin.academics.education.delete');
        });

        // Certificates routes
        Route::prefix('certificates')->group(function () {
            Route::post('/', 'storeCertificate')->name('admin.academics.certificate.store');
            Route::get('/{certificate}', 'showCertificate')->name('admin.academics.certificate.show');
            Route::put('/{certificate}', 'updateCertificate')->name('admin.academics.certificate.update');
            Route::delete('/{certificate}', 'deleteCertificate')->name('admin.academics.certificate.delete');
        });
    });

    /*
     * Routes for career in admin panel
     */
    Route::prefix('career')->controller(CareerController::class)->group(function () {
        Route::get('/', 'index')->name('admin.career');

        // Experience routes
        Route::prefix('experiences')->group(function () {
            Route::post('/', 'storeExperience')->name('admin.career.experience.store');
            Route::get('/{experience}', 'showExperience')->name('admin.career.experience.show');
            Route::put('/{experience}', 'updateExperience')->name('admin.career.experience.update');
            Route::delete('/{experience}', 'deleteExperience')->name('admin.career.experience.delete');
        });

        // Skills routes
        Route::prefix('skills')->group(function () {
            Route::put('/{user}', 'updateSkills')->name('admin.career.skills.update');
        });
    });
});
