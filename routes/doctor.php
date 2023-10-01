<?php

use App\Http\Controllers\doctor\DiagnosticController;
use App\Http\Controllers\doctor\InvoiceController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Doctor Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Backend routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "Backend" middleware group. Make something great!
|
 */

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ]
    , function () {

        //################################### Dashboard doctor ###################################\\

        Route::get('/dashboard/doctor', function () {
            return view('Dashboard.doctor.dashboard');
        })->middleware(['auth:doctor', 'verified'])->name('dashboard.doctor');

        //################################### End Dashboard doctor ###################################\\

        Route::middleware('auth:doctor')->group(function () {

            Route::prefix('doctor')->group(function () {

                //############################# invoices route ##########################################
                Route::resource('invoices', InvoiceController::class);
                //############################# end invoices route ######################################

                //############################# Diagnostics route ##########################################
                Route::resource('Diagnostics', DiagnosticController::class);
                //############################# end Diagnostics route ######################################

            });
        });

        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });

        require __DIR__ . '/auth.php';

    });