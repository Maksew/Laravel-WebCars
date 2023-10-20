<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Comment;
use App\Models\Vehicle;
use App\Policies\CommentPolicy;
use App\Policies\VehiclePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Vehicle::class => VehiclePolicy::class,
        Comment::class => CommentPolicy::class,
    ];


    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
