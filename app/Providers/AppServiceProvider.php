<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\Observers\{StoreObserver,ProductObserver,UserObserver};
use App\Models\{store,product,User};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        store::observe(StoreObserver::class);
        product::observe(ProductObserver::class);
    }
}
