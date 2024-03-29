<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\CarController;
use App\Models\Car;
use App\Models\CarManufacturer;
use App\Models\Drive;
use App\Models\Prop;
use App\Models\User;
use App\Policies\AdminPolicy;
use App\Policies\CarManufacturerPolicy;
use App\Policies\CarPolicy;
use App\Policies\DrivePolicy;
use App\Policies\PropPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Car::class => CarPolicy::class,
        User::class => AdminPolicy::class,
        CarManufacturer::class => CarManufacturerPolicy::class,
        Drive::class => DrivePolicy::class,
        Prop::class => PropPolicy::class,
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
