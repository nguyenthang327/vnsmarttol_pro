<?php

namespace App\Providers;

use App\Services\Admin\SettingService;
use App\Services\Profile\ProfileService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposeProvider extends ServiceProvider
{
    private $profileService;
    private $settingService;
    //contructor
    public function __construct()
    {
        $this->profileService = new ProfileService();
        $this->settingService = new SettingService();
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
            $settingsComposer = $this->settingService->getAllSettings();
            $view->with([
                'user' => $user,
                'settingsComposer' => $settingsComposer
            ]);
        });
    }
}
