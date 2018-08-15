<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/','PageController@trangchu');
Route::get('trangchu','PageController@trangchu');

Route::post('check-out','PaymentController@getCheckout');
Route::get('get-done/{id}','PaymentController@getDone');
Route::get('get-cancel','PaymentController@getCancel');

Route::get('success','PageController@success');
Route::post('tim-kiem','PageController@timkiem');

Route::get('tin-tuc','PageController@news');
Route::get('tin-tuc/{titlekd}','PageController@newsNoidung');
Route::get('events','PageController@events');
Route::get('events/{id}','PageController@eventsNoidung');

Route::get('cart/{id}','PageController@themvaogio');
Route::get('gio-hang','PageController@giohang');
Route::get('gh/{id}','PageController@themmuangay');
Route::get('del-item/{rowId}','PageController@delitem');
Route::post('update-cart','PageController@update');
Route::get('gio-hang-buoc-2','PageController@giohangstep2');
Route::post('dat-hang','OrderController@postAdd');

Route::get('export-order/{id}','OrderController@exportid');
Route::get('export-order','OrderController@exportorder');

Route::get('item/{product_namekd}','PageController@sanpham');
Route::get('danh-sach/{cate_namekd}','PageController@chuyenmuc');

Route::get('danh-sach/{cate_namekd}/sapxep/{sort}','PageController@chuyenmucnew');

// Route::get('danh-sach/{cate_namekd}/?sort=new','PageController@chuyenmucnew');
// Route::get('danh-sach/{cate_namekd}/?sort=price-asc','PageController@chuyenmucpriceasc');
// Route::get('danh-sach/{cate_namekd}/?sort=price-desc','PageController@chuyenmucpricedesc');
// Route::get('danh-sach/{cate_namekd}/sort=sort=name','PageController@chuyenmucname');



Route::get('danh-sach/{cate_namekd}/{subcate_namekd}','PageController@loaitin');//list post (subcate $id)
Route::get('danh-sach/{cate_namekd}/{subcate_namekd}/{nsx_namekd}','PageController@nhasx');
//Route::get('{cate_namekd}/{subcate_namekd}/{post_titlekd}','PageController@tintuc');//tin tuc

Route::get('admin','UserController@getLoginAdmin');
Route::get('admin/login','UserController@getLoginAdmin');
Route::post('admin/login','UserController@postLoginAdmin');
Route::get('admin/logout','UserController@getLogout');
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
	Route::get('/','CateController@getList');
	Route::group(['prefix'=>'cate'],function(){
		Route::get('/','CateController@getList');
		//admin/cate/list
		Route::get('list','CateController@getList');

		Route::get('edit/{id}','CateController@getEdit');

		Route::post('edit/{id}','CateController@postEdit');

		Route::get('add','CateController@getAdd');

		Route::post('add','CateController@postAdd');

		Route::get('del/{id}','CateController@getDel');
	});

	Route::group(['prefix'=>'subcate'],function(){
		//admin/cate/list
		Route::get('/','SubcateController@getList');
		Route::get('list','SubcateController@getList');

		Route::get('edit/{id}','SubcateController@getEdit');

		Route::post('edit/{id}','SubcateController@postEdit');

		Route::get('add','SubcateController@getAdd');

		Route::post('add','SubcateController@postAdd');

		Route::get('del/{id}','SubcateController@getDel');
	});
	Route::group(['prefix'=>'nsx'],function(){
		//admin/cate/list
		Route::get('list','NsxController@getList');

		Route::get('edit/{id}','NsxController@getEdit');

		Route::post('edit/{id}','NsxController@postEdit');

		Route::get('add','NsxController@getAdd');

		Route::post('add','NsxController@postAdd');

		Route::get('del/{id}','NsxController@getDel');
	});

	Route::group(['prefix'=>'post'],function(){
		//admin/cate/list
		Route::get('/','PostController@getList');
		Route::get('list','PostController@getList');

		Route::get('edit/{id}','PostController@getEdit');

		Route::post('edit/{id}','PostController@postEdit');

		Route::get('add','PostController@getAdd');

		Route::post('add','PostController@postAdd');

		Route::get('del/{id}','PostController@getDel');
	});

    Route::group(['prefix'=>'partners'],function(){
		Route::get('/','PartnersController@getList');
		Route::get('list','PartnersController@getList');
		Route::get('add','PartnersController@getAdd');
        Route::post('add','PartnersController@postAdd');
        Route::get('edit/{id}','PartnersController@getEdit');
        Route::post('edit/{id}','PartnersController@postEdit');
        Route::get('delete/{id}','PartnersController@getDelete');
	});

	Route::group(['prefix'=>'product'],function(){
		//admin/cate/list
		Route::get('list','ProductController@getList');

		Route::get('edit/{id}','ProductController@getEdit');

		Route::post('edit/{id}','ProductController@postEdit');

		Route::get('add','ProductController@getAdd');

		Route::post('add','ProductController@postAdd');

		Route::get('del/{id}','ProductController@getDel');
	});
	Route::group(['prefix'=>'news'],function(){
		//admin/cate/list
		Route::get('list','NewsController@getList');

        Route::get('list-tin-tuc','NewsController@getListNews');

		Route::get('edit/{id}','NewsController@getEdit');

		Route::post('edit/{id}','NewsController@postEdit');

		Route::get('add','NewsController@getAdd');

		Route::post('add','NewsController@postAdd');

		Route::get('del/{id}','NewsController@getDel');
	});

	Route::group(['prefix'=>'order'],function(){
		//admin/cate/list
		Route::get('list','OrderController@getList');

		Route::get('edit/{id}','OrderController@getEdit');

		Route::post('edit/{id}','OrderController@postEdit');

		Route::get('del/{id}','OrderController@getDel');
	});
	Route::group(['prefix'=>'report'],function(){
		//admin/cate/list
		Route::get('list','ReportController@getList');
	});

	Route::group(['prefix'=>'ajax'],function(){
		Route::get('subcate/{cate_id}','AjaxController@getSubcate');
		Route::get('nsx/{subcate_id}','AjaxController@getNsx');
		Route::get('remove-product-image/{id}','AjaxController@removeImage');
	});


	Route::group(['prefix'=>'user'],function(){
		//admin/cate/list
		Route::get('/','UserController@getList');
		Route::get('list','UserController@getList');

		Route::get('edit/{id}','UserController@getEdit');

		Route::post('edit/{id}','UserController@postEdit');

		Route::get('add','UserController@getAdd');

		Route::post('add','UserController@postAdd');

		Route::get('del/{id}','UserController@getDel');
	});

	Route::group(['prefix'=>'slide'] ,function(){
		//admin/cate/list
		Route::get('/','SlideController@getList');
		Route::get('list','SlideController@getList');

		Route::get('edit','SlideController@getEdit');

		Route::get('add','SlideController@getAdd');
	});

	Route::group(['prefix'=>'customer'] ,function(){
		//admin/cate/list
		Route::get('/','CustomerController@getList');
		Route::get('list','CustomerController@getList');

		Route::get('edit','CustomerController@getEdit');

		Route::get('add','CustomerController@getAdd');
	});
});
