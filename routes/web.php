<?php

use App\Http\Controllers\Admin\AcademicsController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProjectsController;
use App\Http\Controllers\Admin\ServicesController;
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

Route::controller(WebHomeController::class)->group(function () {
    Route::get('/', 'index')->name('homepage');
    Route::post('contact-us', 'contactUs')->name('contact-us');
    Route::get('test-smtp', 'testSMTP')->name('test-smtp');
    Route::get('project-detail/{slug}', 'showProjectDetail')->name('project-detail');
});

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

        // Technical skills routes
        Route::prefix('tech-skills')->group(function () {
            Route::post('/', 'storeTechSkill')->name('admin.career.tech-skills.store');
            Route::put('/{technicalSkill}/update', 'updateTechSkill')->name('admin.career.tech-skills.update');
            Route::delete('/{technicalSkill}/delete', 'deleteTechSkill')->name('admin.career.tech-skills.delete');
        });
    });

    /*
     * Routes for projects in admin panel
     */
    Route::resource('/projects', ProjectsController::class);
    Route::post('/update-status/{project}', [ProjectsController::class, 'updateStatus'])->name('projects.update-status');

    /*
     * Routes for services in admin panel
     */
    Route::prefix('services')->controller(ServicesController::class)->group(function () {
        Route::get('/', 'index')->name('admin.services');
        Route::post('/', 'store')->name('admin.services.store');
        Route::get('/{service}', 'show')->name('admin.services.show');
        Route::put('/{service}', 'update')->name('admin.services.update');
        Route::delete('/{service}', 'destroy')->name('admin.services.destroy');
    });
});
