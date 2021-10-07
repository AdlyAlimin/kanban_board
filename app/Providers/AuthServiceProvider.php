<?php

namespace App\Providers;

use App\Interfaces\Auth\AuthInterface;
use App\Interfaces\Auth\GoogleInterface;
use App\Repositories\Auth\AuthRepository;
use App\Repositories\Auth\GoogleRepository;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
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

    public function register()
    {
        $this->app->bind(
            AuthInterface::class, 
            AuthRepository::class
        );

        $this->app->bind(
            GoogleInterface::class,
            GoogleRepository::class
        );
    }
}
