<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Policies\AdminPolicy;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        //
    }

    public function boot(): void
    {   
        Gate::policy(User::class, AdminPolicy::class);
        Paginator::defaultView('vendor.pagination.bootstrap-4');
    }
}
