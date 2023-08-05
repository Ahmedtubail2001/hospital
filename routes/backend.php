<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Backend routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "Backend" middleware group. Make something great!
|
 */

// Route::get('/', function () {
//     return view('Dashboard.index');
// });

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::group(
    [
        // 'prefix' => LaravelLocalization::setLocale(),
        // 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ]
    , function () {

        //################################### Dashboard User ###################################\\
        Route::get('/dashboard/user', function () {
            return view('Dashboard.User.dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard.user');

        //################################### End Dashboard User ###################################\\

        //################################### Dashboard Admin ###################################\\

        Route::get('/dashboard/admin', function () {
            return view('Dashboard.Admin.dashboard');
        })->middleware(['auth:admin', 'verified'])->name('dashboard.admin');

        //################################### End Dashboard Admin ###################################\\

        Route::middleware('auth:admin')->group(function () {
            
            Route::resource('Sections', SectionController::class);
            Route::resource('Doctors', DoctorController::class);


        });

        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });

        require __DIR__ . '/auth.php';

    });