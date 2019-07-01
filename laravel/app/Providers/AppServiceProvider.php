<?php

namespace App\Providers;
use App\Banner;
use App\Cate;
use App\Nsx;
use App\Order;
use App\ProCate;
use App\ProMaker;
use App\ProSubcate;
use App\SiteConfig;
use App\Subcate;
use App\NewsCategory;
use App\Partners;
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
        $siteConfig = SiteConfig::first();
        view()->share('siteConfig', $siteConfig);

        $partners = Partners::where('status', 1)->take(6)->get();
        view()->share('partners', $partners);

        $cate = ProCate::all();
        $subcate = ProSubcate::all();
        $nsx = ProMaker::all();

        view()->share('cate', $cate);
        view()->share('subcate', $subcate);
        view()->share('nsx', $nsx);

        $bannerList = Banner::where('status', 1)->get();
        $banner = [];
        foreach($bannerList as $item){
            $banner[$item->location] = $item;
        }
        view()->share('banners', $banner);

        $newCategory = NewsCategory::where('status', 1)->get();
		view()->share('newsCategory', $newCategory);

    }

    public function register()
    {
        //
    }
}
