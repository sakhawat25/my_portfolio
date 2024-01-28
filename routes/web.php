<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebHomeController;

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

Route::get('/', [WebHomeController::class, 'index']);

Route::get('login', function() {
    return view('auth.login');
})->name('login');

Route::middleware('auth')->prefix('admin')->group(function() {
    Route::get('/', function() {
        return view('admin.dashboard');
    });
});
