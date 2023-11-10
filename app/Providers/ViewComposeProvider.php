<?php

namespace App\Providers;

use App\Services\Profile\ProfileService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposeProvider extends ServiceProvider
{
    private $profileService;
    //contructor
    public function __construct()
    {
        $this->profileService = new ProfileService();
    }
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer(['*'], function ($view) {
            $user = $this->profileService->getProfile();
            
            $view->with([
                'userComposer' => $user
            ]);
        });
    }
}