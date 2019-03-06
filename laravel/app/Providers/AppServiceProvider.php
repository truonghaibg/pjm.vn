<?php

namespace App\Providers;
use App\Partners;
use App\Slider;
use App\Video;
use App\NewsCategory;
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
		view()->composer('layout.footer', function ($view) {
            $headerData = Partners::take(6)->get();
            $view->headerData = $headerData;
        });
		
        view()->composer('layout.slider', function ($view) {
            $slider = Slider::all();
            $view->slider = $slider;
            $video = Video::all()->first();
            $view->video = $video;
        });
		
		view()->composer('layout.menu', function ($view) {
            $newCategory = NewsCategory::all();
            $view->newCategory = $newCategory;
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
