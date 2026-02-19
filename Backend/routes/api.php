<?php

use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    require base_path('app/Domain/Auth/routes.php');
});

Route::middleware(['auth:sanctum', 'company'])->group(function () {

    Route::prefix('users')->group(function () {
        require base_path('app/Domain/Users/routes.php');
    });

    Route::prefix('financial')->group(function () {
        require base_path('app/Domain/Financial/routes.php');
    });

    Route::prefix('companies')->group(function () {
        require base_path('app/Domain/Companies/routes.php');
    });

});

