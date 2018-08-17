<?php

namespace App\Providers;
use App\Partners;
use App\Slider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		view()->composer('layout.header', function ($view) {
            $headerData = Partners::all();
            $view->headerData = $headerData;
        });
		
		view()->composer('layout.menu', function ($view) {
            $slider = Slider::all();
            $view->slider = $slider;
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
