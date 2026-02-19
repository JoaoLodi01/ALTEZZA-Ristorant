<?php

namespace App\Providers;

use App\Repositories\Contracts\UsersContracts;
use App\Repositories\Eloquent\UsersRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
        UsersContracts::class,
        UsersRepository::class
    );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
