<?php

namespace App\Providers;
use App\Banner;
use App\ProCate;
use App\ProMaker;
use App\ProSubcate;
use App\SiteConfig;
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

        $proCate = ProCate::all();
        $subcate = ProSubcate::all();
        $proMaker = ProMaker::all();

        view()->share('proCate', $proCate);
        view()->share('proSubcate', $subcate);
        view()->share('proMaker', $proMaker);

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
