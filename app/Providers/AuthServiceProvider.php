<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Car;
use App\Models\Owner;
use App\Models\User;
use App\Policies\OwnerPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Owner::class => OwnerPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define("search", function (User $user)
        {
            return ($user->admin === 1);
        });

        Gate::define("view_specific_owners", function (User $user, Owner $owner)
        {
            if($user->admin===0)
            {
                return ($user->id === $owner->user_id);
            }
            else
                return true;
        });

        Gate::define("view_specific_cars", function (User $user, Car $car)
        {
            $owner = Owner::find($car->owner_id);
            if($user->admin===0)
            {
                return ($user->id === $owner->user_id);
            }
            else
                return true;
        });

        Gate::define("update_car", function (User $user, Car $car)
        {
            return ($user->admin === 1);
        });

        Gate::define("delete_car", function (User $user, Car $car)
        {
            return ($user->admin === 1);
        });

    }
}
