<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Discount;
use App\Models\Notification;
use App\Models\Question;
use App\Policies\ContactPolicy;
use App\Policies\DiscountPolicy;
use App\Policies\NotificationPolicy;
use App\Policies\QuestionPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Discount::class => DiscountPolicy::class,
        Contact::class => ContactPolicy::class,
        Question::class => QuestionPolicy::class,
        Notification::class => NotificationPolicy::class,
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
