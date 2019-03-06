<?php

namespace App\Providers;
use App\Banner;
use App\Cate;
use App\Nsx;
use App\Order;
use App\Partners;
use App\Post;
use App\Product;
use App\Slider;
use App\Subcate;
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

        $cate = Cate::all();
        $subcate = Subcate::all();
        $nsx = Nsx::all();

        $order = Order::all();
        view()->share('cate', $cate);
        view()->share('subcate', $subcate);
        view()->share('nsx', $nsx);

        view()->share('order', $order);
        $banner = Banner::where('name', 'home')->get()->first();
        view()->share('banner', $banner);

        $newCategory = NewsCategory::all();
		view()->share('newCategory', $newCategory);

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
