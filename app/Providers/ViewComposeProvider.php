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

    /**
     *
     */
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
            $setting = $this->settingService->getSetting();
            $view->with([
                'userComposer' => $user,
                'settingComposer' => $setting
            ]);
        });
    }
}
