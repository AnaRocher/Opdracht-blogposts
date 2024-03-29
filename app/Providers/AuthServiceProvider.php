<?php

namespace App\Providers;
use Illuminate\Support\Facades\Gate;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update-post', function($user, $post){
        return $user->id === $post->user_id;});

        Gate::define('delete-post', function($user, $post){
            return $user->id === $post->user_id;});

        Gate::define('update-comment', function ($user, $comment) {
            return $user->id === $comment->user_id;});
    
        Gate::define('delete-comment', function ($user, $comment) {
            return $user->id === $comment->user_id;});
    }
}