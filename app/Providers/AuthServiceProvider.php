<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // 管理者以上に許可
        Gate::define('admin-higher', function ($user) {
            return ($user->role >= 1 && $user->role <=10);
            // >=以上、<=以下、==イコール
        });
        // 一般ユーザー以上に許可
        Gate::define('user-higher', function ($user){
            return ($user->role >= 0);
        });
    }
}
