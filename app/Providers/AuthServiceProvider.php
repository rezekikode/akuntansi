<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Policies\AkunPolicy;
use App\Policies\JurnalPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Akun::class => AkunPolicy::class,
        Jurnal::class => JurnalPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
