<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\loaidichvu;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('header',function($view){
            $loaidichvu=loaidichvu::all();
            $view->with('loaidichvu',$loaidichvu);

        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
