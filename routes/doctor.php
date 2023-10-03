<?php

use App\Http\Controllers\Dashboard_doctor\DiagnosticController;
use App\Http\Controllers\Dashboard_doctor\PatientDetailsController;
use App\Http\Controllers\Dashboard_doctor\RayController;
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

                //############################# completed_invoices route ##########################################
                Route::get('completed_invoices', [InvoiceController::class, 'completedInvoices'])->name('completedInvoices');
                //############################# end invoices route ################################################

                //############################# review_invoices route ##########################################
                Route::get('review_invoices', [InvoiceController::class, 'reviewInvoices'])->name('reviewInvoices');
                //############################# end invoices route #############################################

                //############################# review_invoices route ##########################################
                Route::post('add_review', [DiagnosticController::class, 'addReview'])->name('add_review');
                //############################# end invoices route #############################################

                //############################# rays route ##########################################
                Route::resource('rays', RayController::class);
                //############################# end rays route #############################################

                //############################# patient_details route ##########################################
                Route::get('patient_details/{id}', [PatientDetailsController::class, 'index'])->name('patient_details');
                //############################# end patient_details route #############################################

            });
        });

        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });

        require __DIR__ . '/auth.php';

    });