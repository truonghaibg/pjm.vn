<?php
/* FRONT-END */
Route::get('/', 'PageController@getHome');

Route::get('lien-he', 'PageController@getContact');
Route::post('lien-he', 'PageController@postContact');

Route::post('check-out', 'PaymentController@getCheckout');
Route::get('get-done/{id}', 'PaymentController@getDone');
Route::get('get-cancel', 'PaymentController@getCancel');

Route::get('success', 'PageController@success');
Route::get('tim-kiem/{key}', 'PageController@search');

Route::get('tin-tuc', 'PageController@news');
Route::get('danh-muc-tin-tuc/{id}', 'PageController@newsCategory');
Route::get('tin-tuc/{title}', 'PageController@detailNews');
Route::get('events', 'PageController@events');
Route::get('events/{id}', 'PageController@eventsNoidung');

Route::get('cart/{id}', 'PageController@themvaogio');
Route::get('gio-hang', 'PageController@giohang');
Route::get('gh/{id}', 'PageController@themmuangay');
Route::get('del-item/{rowId}', 'PageController@delitem');
Route::post('update-cart', 'PageController@update');
Route::get('gio-hang-buoc-2', 'PageController@giohangstep2');
Route::post('dat-hang', 'OrderController@postAdd');

Route::get('export-order/{id}', 'OrderController@exportid');
Route::get('export-order', 'OrderController@exportorder');

Route::get('san-pham/{slug}', 'PageController@detailProduct');
Route::get('danh-sach/{slug}', 'PageController@chuyenmuc');

Route::get('danh-sach/{cate_slug}/{subcate_slug}', 'PageController@chuyenmuc2');
Route::get('danh-sach/{cate_slug}/{subcate_slug}/{nsx_slug}', 'PageController@nhasx');
Route::get('danh-muc-san-pham/{slug}', 'CateController@FrontEndCategory');

Route::get('bai-viet/{slug}', 'PageController@detailPost');
Route::post('lien-he-san-pham/{slug}', 'PageController@productContact');

/* ADMIN */
Route::get('admin', 'UserController@getLoginAdmin');
Route::get('admin/login', 'UserController@getLoginAdmin');
Route::post('admin/login', 'UserController@postLoginAdmin');
Route::get('admin/logout', 'UserController@getLogout');

Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function () {

    Route::get('/clear-all', function() {
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        return "Cache is cleared";
    });

    Route::get('', 'HomeController@getDashboard');
    Route::group(['prefix'=>'home'], function () {
        Route::get('', 'HomeController@getDashboard');
    });

    Route::group(['prefix'=>'dashboard'], function () {
        Route::get('', 'HomeController@getDashboard');
    });

    Route::group(['prefix'=>'post'], function () {
        Route::get('create', 'PostController@create');
        Route::post('store', 'PostController@store');
        Route::get('', 'PostController@index');
        Route::get('index', 'PostController@index');
        Route::get('edit/{id}', 'PostController@edit')->where(['id'=>'[0-9]+']);
        Route::post('update/{id}', 'PostController@update')->where(['id'=>'[0-9]+']);
        Route::get('delete/{id}', 'PostController@destroy')->where(['id'=>'[0-9]+']);
    });

    Route::group(['prefix' => 'manager'], function () {
        Route::get('videonew', 'ManagerController@video');
        Route::post('videonew', 'ManagerController@video');
        Route::get('video', 'ManagerController@getVideo');
        Route::post('video', 'ManagerController@postVideo');
		
    });

    Route::group(['prefix'=>'banner'], function () {
        Route::get('create', 'BannerController@create');
        Route::post('store', 'BannerController@store');
        Route::get('', 'BannerController@index');
        Route::get('index', 'BannerController@index');
        Route::get('edit/{id}', 'BannerController@edit')->where(['id'=>'[0-9]+']);
        Route::post('update/{id}', 'BannerController@update')->where(['id'=>'[0-9]+']);
        Route::get('delete/{id}', 'BannerController@destroy')->where(['id'=>'[0-9]+']);
    });

    Route::group(['prefix'=>'slider'], function () {
        Route::get('create', 'SliderController@create');
        Route::post('store', 'SliderController@store');
        Route::get('', 'SliderController@index');
        Route::get('index', 'SliderController@index');
        Route::get('edit/{id}', 'SliderController@edit')->where(['id'=>'[0-9]+']);
        Route::post('update/{id}', 'SliderController@update')->where(['id'=>'[0-9]+']);
        Route::get('delete/{id}', 'SliderController@destroy')->where(['id'=>'[0-9]+']);
    });

    Route::group(['prefix' => 'product'], function () {
		Route::get('product-contact-list', 'ProductContactController@GetContactList');
		Route::get('product-contact-details/{id}', 'ProductContactController@GetContactDetails');
		Route::post('product-contact-details/{id}', 'ProductContactController@PostContactDetails');
		Route::get('product-contact-details-delete/{id}', 'ProductContactController@RemoveContactDetails');
		Route::get('list', 'ProductController@getList');
        Route::get('edit/{id}', 'ProductController@getEdit');
        Route::post('edit/{id}', 'ProductController@postEdit');
        Route::get('add', 'ProductController@getAdd');
        Route::post('add', 'ProductController@postAdd');
        Route::get('del/{id}', 'ProductController@getDel');


        Route::get('create', 'ProductController@create');
        Route::post('store', 'ProductController@store');
        Route::get('', 'ProductController@index');
        Route::get('index', 'ProductController@index');
        Route::get('edit/{id}', 'ProductController@edit')->where(['id'=>'[0-9]+']);
        Route::post('update/{id}', 'ProductController@update')->where(['id'=>'[0-9]+']);
        Route::get('delete/{id}', 'ProductController@destroy')->where(['id'=>'[0-9]+']);
    });

    Route::group(['prefix' => 'news'], function () {
        Route::get('create', 'NewsController@create');
        Route::post('store', 'NewsController@store');
        Route::get('', 'NewsController@index');
        Route::get('index', 'NewsController@index');
        Route::get('edit/{id}', 'NewsController@edit')->where(['id'=>'[0-9]+']);
        Route::post('update/{id}', 'NewsController@update')->where(['id'=>'[0-9]+']);
        Route::get('delete/{id}', 'NewsController@destroy')->where(['id'=>'[0-9]+']);
    });

    Route::group(['prefix'=>'news-category'], function () {
        Route::get('create', 'NewsCategoryController@create');
        Route::post('store', 'NewsCategoryController@store');
        Route::get('', 'NewsCategoryController@index');
        Route::get('index', 'NewsCategoryController@index');
        Route::get('edit/{id}', 'NewsCategoryController@edit')->where(['id'=>'[0-9]+']);
        Route::post('update/{id}', 'NewsCategoryController@update')->where(['id'=>'[0-9]+']);
        Route::get('delete/{id}', 'NewsCategoryController@destroy')->where(['id'=>'[0-9]+']);
    });

    Route::group(['prefix' => 'order'], function () {
        Route::get('list', 'OrderController@getList');
        Route::get('edit/{id}', 'OrderController@getEdit');
        Route::post('edit/{id}', 'OrderController@postEdit');
        Route::get('del/{id}', 'OrderController@getDel');
    });
    Route::group(['prefix' => 'report'], function () {
        Route::get('list', 'ReportController@getList');
    });

    Route::group(['prefix' => 'ajax'], function () {
        Route::get('subcate/{cate_id}', 'AjaxController@getSubcate');
        Route::get('nsx/{subcate_id}', 'AjaxController@getNsx');
        Route::get('remove-product-image/{id}', 'AjaxController@removeImage');
        Route::post('ajax-upload-image', 'AjaxController@ajaxUploadImage');
    });


    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'UserController@getList');
        Route::get('list', 'UserController@getList');
        Route::get('edit/{id}', 'UserController@getEdit');
        Route::post('edit/{id}', 'UserController@postEdit');
        Route::get('add', 'UserController@getAdd');
        Route::post('add', 'UserController@postAdd');
        Route::get('del/{id}', 'UserController@getDel');
    });

    Route::group(['prefix' => 'slide'], function () {
        Route::get('/', 'SlideController@getList');
        Route::get('list', 'SlideController@getList');
        Route::get('edit', 'SlideController@getEdit');
        Route::get('add', 'SlideController@getAdd');
    });

    Route::group(['prefix' => 'customer'], function () {
        Route::get('/', 'CustomerController@getList');
        Route::get('list', 'CustomerController@getList');
        Route::get('edit', 'CustomerController@getEdit');
        Route::get('add', 'CustomerController@getAdd');
    });

    Route::group(['prefix'=>'contact'], function () {
        //Route::get('create', 'ContactController@create');
        //Route::post('store', 'ContactController@store');
        Route::get('', 'ContactController@index');
        Route::get('index', 'ContactController@index');
        Route::get('edit/{id}', 'ContactController@edit')->where(['id'=>'[0-9]+']);
        Route::post('update/{id}', 'ContactController@update')->where(['id'=>'[0-9]+']);
        Route::get('delete/{id}', 'ContactController@destroy')->where(['id'=>'[0-9]+']);
    });

    Route::group(['prefix'=>'site-config'], function () {
        Route::get('edit/{id}', 'SiteConfigController@edit')->where(['id'=>'[0-9]+']);
        Route::get('edit', 'SiteConfigController@getEdit');
        Route::get('', 'SiteConfigController@index');
        Route::post('update/{id}', 'SiteConfigController@update')->where(['id'=>'[0-9]+']);
    });

    Route::group(['prefix'=>'banner'], function () {
        Route::get('create', 'BannerController@create');
        Route::post('store', 'BannerController@store');
        Route::get('', 'BannerController@index');
        Route::get('index', 'BannerController@index');
        Route::get('edit/{id}', 'BannerController@edit')->where(['id'=>'[0-9]+']);
        Route::post('update/{id}', 'BannerController@update')->where(['id'=>'[0-9]+']);
        Route::get('delete/{id}', 'BannerController@destroy')->where(['id'=>'[0-9]+']);
    });

    Route::group(['prefix'=>'partner'], function () {
        Route::get('create', 'PartnersController@create');
        Route::post('store', 'PartnersController@store');
        Route::get('', 'PartnersController@index');
        Route::get('index', 'PartnersController@index');
        Route::get('edit/{id}', 'PartnersController@edit')->where(['id'=>'[0-9]+']);
        Route::post('update/{id}', 'PartnersController@update')->where(['id'=>'[0-9]+']);
        Route::get('delete/{id}', 'PartnersController@destroy')->where(['id'=>'[0-9]+']);
    });

    Route::group(['prefix'=>'pro-cate'], function () {
        Route::get('create', 'ProCateController@create');
        Route::post('store', 'ProCateController@store');
        Route::get('', 'ProCateController@index');
        Route::get('index', 'ProCateController@index');
        Route::get('edit/{id}', 'ProCateController@edit')->where(['id'=>'[0-9]+']);
        Route::post('update/{id}', 'ProCateController@update')->where(['id'=>'[0-9]+']);
        Route::get('delete/{id}', 'ProCateController@destroy')->where(['id'=>'[0-9]+']);
    });

    Route::group(['prefix'=>'pro-subcate'], function () {
        Route::get('create', 'ProSubcateController@create');
        Route::post('store', 'ProSubcateController@store');
        Route::get('', 'ProSubcateController@index');
        Route::get('index', 'ProSubcateController@index');
        Route::get('edit/{id}', 'ProSubcateController@edit')->where(['id'=>'[0-9]+']);
        Route::post('update/{id}', 'ProSubcateController@update')->where(['id'=>'[0-9]+']);
        Route::get('delete/{id}', 'ProSubcateController@destroy')->where(['id'=>'[0-9]+']);
    });

    Route::group(['prefix'=>'pro-maker'], function () {
        Route::get('create', 'ProMakerController@create');
        Route::post('store', 'ProMakerController@store');
        Route::get('', 'ProMakerController@index');
        Route::get('index', 'ProMakerController@index');
        Route::get('edit/{id}', 'ProMakerController@edit')->where(['id'=>'[0-9]+']);
        Route::post('update/{id}', 'ProMakerController@update')->where(['id'=>'[0-9]+']);
        Route::get('delete/{id}', 'ProMakerController@destroy')->where(['id'=>'[0-9]+']);
    });

    Route::group(['prefix'=>'pro-contact'], function () {
        Route::get('create', 'ProContactController@create');
        Route::post('store', 'ProContactController@store');
        Route::get('', 'ProContactController@index');
        Route::get('index', 'ProContactController@index');
        Route::get('edit/{id}', 'ProContactController@edit')->where(['id'=>'[0-9]+']);
        Route::post('update/{id}', 'ProContactController@update')->where(['id'=>'[0-9]+']);
        Route::get('delete/{id}', 'ProContactController@destroy')->where(['id'=>'[0-9]+']);
    });

    Route::group(['prefix'=>'migrate'], function () {
        Route::get('product_image', 'MigrateController@migrateProduct');
        Route::get('path_image', 'MigrateController@pathImage');
    });
});
