<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\Observers\{StoreObserver,ProductObserver,UserObserver};
use App\Models\{store,product,User};
use Illuminate\pagination\Paginator;

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

        // pagseguro

        \PagSeguro\Library::initialize();
        \PagSeguro\Library::cmsVersion()->setName("MarketPlace")->setRelease("1.0.0");
        \PagSeguro\Library::moduleVersion()->setName("MarketPlace")->setRelease("1.0.0"); 
 

        User::observe(UserObserver::class);
        store::observe(StoreObserver::class);
        product::observe(ProductObserver::class);
        Paginator::useBootstrap();
    }
}
