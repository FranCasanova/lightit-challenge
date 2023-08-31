<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Patients\PatientService;
use App\Services\Patients\PatientServiceInterface;

class ServicesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(PatientServiceInterface::class, PatientService::class);

    }
}
