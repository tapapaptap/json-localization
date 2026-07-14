<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Service\Account\AccountService;
use App\Service\Project\ProjectService;
use Illuminate\Http\Resources\Json\JsonResource;
use Laravel\Sanctum\Sanctum;
use Laravel\Sanctum\PersonalAccessToken;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind('account_service', AccountService::class);
        $this->app->bind('project_service', ProjectService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        JsonResource::withoutWrapping();
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
    }
}
