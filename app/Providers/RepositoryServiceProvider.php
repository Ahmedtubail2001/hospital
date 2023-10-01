<?php

namespace App\Providers;

use App\Interface\Ambulance\AmbulanceRepositoryInterface;
use App\Interface\doctor_dashboard\InvoicesRepositoryInterface;
use App\Interface\Doctors\DoctorRepositoryInterface;
use App\Interface\Finance\PaymentRepositoryInterface;
use App\Interface\Finance\ReceiptRepositoryInterface;
use App\Interface\insurances\insuranceRepositoryInterface;
use App\Interface\Patients\PatientRepositoryInterface;
use App\Interface\Section\SectionRepositoryInterface;
use App\Interface\Services\SingleServiceRepositoryInterface;
use App\Repository\Ambulance\AmbulanceRepository;
use App\Repository\doctor_dashboard\InvoicesRepository;
use App\Repository\Doctors\DoctorRepository;
use App\Repository\Finance\PaymentRepository;
use App\Repository\Finance\ReceiptRepository;
use App\Repository\insurances\insuranceRepository;
use App\Repository\Patients\PatientRepository;
use App\Repository\Section\SectionRepository;
use App\Repository\Services\SingleServiceRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(SectionRepositoryInterface::class, SectionRepository::class);
        $this->app->bind(DoctorRepositoryInterface::class, DoctorRepository::class);
        $this->app->bind(SingleServiceRepositoryInterface::class, SingleServiceRepository::class);
        $this->app->bind(insuranceRepositoryInterface::class, insuranceRepository::class);
        $this->app->bind(AmbulanceRepositoryInterface::class, AmbulanceRepository::class);
        $this->app->bind(PatientRepositoryInterface::class, PatientRepository::class);
        $this->app->bind(ReceiptRepositoryInterface::class, ReceiptRepository::class);
        $this->app->bind(PaymentRepositoryInterface::class, PaymentRepository::class);

        // Doctor
        
        $this->app->bind(InvoicesRepositoryInterface::class, InvoicesRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}