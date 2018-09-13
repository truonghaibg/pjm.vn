<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Cate;
use App\Subcate;
use App\Nsx;
use App\Post;
use App\Product;
use App\News;
use App\Events;
use Cart;
use Excel;
use App\Order;
use App\Tags;
use App\TagsBelong;
use App\NewsCategory;

class PageController extends Controller
{
    //
    function __construct()
    {
        $cate = Cate::all();
        $subcate = Subcate::all();
        $nsx = Nsx::all();
        $product = Product::all();
        $news = News::all();
        $order = Order::all();

        view()->share('cate', $cate);
        view()->share('subcate', $subcate);
        view()->share('nsx', $nsx);
        view()->share('product', $product);
        view()->share('news', $news);
        view()->share('order', $order);


        $news = News::all();
        view()->share('news', $news);
        $events = Events::all();
        view()->share('events', $events);
    }

    function getHome()
    {
        $post = Post::where('id', '7')->paginate(6);
        return view('pages.home', ['post' => $post]);
    }

    function export()
    {
        $export = Cate::all();

        Excel::create('test', function ($excel) use ($export) {
            $excel->sheet('sheet', function ($sheet) use ($export) {
                $sheet->fromArray($export);
            });
        })->export('xls');
    }

    function contact()
    {
        return view('pages.contact');
    }

    function news()
    {
        $news = News::where('news_category_id', "!=", 0)->orderBy('id', 'DESC')->get();
        $newsCategory = NewsCategory::all();
        $i = 0;
        foreach ($news as $item) {
            $tagsNameArray = [];
            $tagsList = TagsBelong::where("news_id", $item->id)->get();
            foreach ($tagsList as $tagId) {
                $singleTag = Tags::where("id", $tagId->tags_id)->get()->first();
                $tagsNameArray[] = $singleTag;
            }
            $news[$i]->tags = $tagsNameArray;
            $i++;
        }
        return view('pages.news', ['news' => $news, "newsCategory" => $newsCategory]);
    }

    function newsCategory($id)
    {
        $news = News::where('news_category_id', $id)->orderBy('id', 'DESC')->get();
        $newsCategory = NewsCategory::all();
        $i = 0;
        foreach ($news as $item) {
            $tagsNameArray = [];
            $tagsList = TagsBelong::where("news_id", $item->id)->get();
            foreach ($tagsList as $tagId) {
                $singleTag = Tags::where("id", $tagId->tags_id)->get()->first();
                $tagsNameArray[] = $singleTag;
            }
            $news[$i]->tags = $tagsNameArray;
            $i++;
        }
        return view('pages.news', ['news' => $news, "newsCategory" => $newsCategory]);
    }

    function detailNews($titlekd)
    {
        $newsCategory = NewsCategory::all();
        $new = News::where('titlekd', $titlekd)->first();
        view()->share('newview', $new);
        $n = News::all();
        return view('pages.news-detail', ['new' => $new, 'n' => $n, "newsCategory" => $newsCategory]);
    }

    function events()
    {
        return view('pages.events');
    }

    function eventsNoidung($id)
    {
        $ea = Events::all();
        $events = Events::find($id);
        return view('pages.eventsNoidung', ['events' => $events, 'ea' => $ea]);
    }

    function themvaogio($id)
    {
        $product = Product::find($id);
        $phantram = ($product->product_salevalue) / 100;
        $tiensale = ($product->product_price) * $phantram;
        $price = ($product->product_price) - $tiensale;
        Cart::add(['id' => $product->id, 'name' => $product->product_name, 'options' => array('img' => $product->product_img,
            'namekd' => $product->product_namekd, 'sale' => $product->product_salevalue, 'model' => $product->product_model),
            'qty' => 1, 'price' => $price]);
        return redirect('item/' . $product->product_namekd);
    }

    function themmuangay($id)
    {
        $product = Product::find($id);
        $phantram = ($product->product_salevalue) / 100;
        $tiensale = ($product->product_price) * $phantram;
        $price = ($product->product_price) - $tiensale;
        Cart::add(['id' => $product->id, 'name' => $product->product_name, 'options' => array('img' => $product->product_img,
            'namekd' => $product->product_namekd, 'sale' => $product->product_salevalue, 'model' => $product->product_model),
            'qty' => 1, 'price' => $price]);
        return redirect('gio-hang');
    }

    function giohangstep2()
    {
        return view('pages.giohangstep2');
    }

    function delitem($rowId)
    {
        Cart::remove($rowId);
        return redirect('gio-hang');
    }

    function update(Request $request)
    {
        $qty = $request->qty;
        $rowId = json_decode($request->rowid, true);
        $result = count($rowId);
        $i = 0;
        while ($i < $result) {
            Cart::update($rowId[$i], $qty[$i]);
            $i++;
        }
        return redirect('gio-hang');
    }

    function giohang()
    {
        return view('pages.giohang');
    }

    function success()
    {
        return view('pages.success');
    }

    function search(Request $request)
    {
        $keySearch = $request->search;
        $products = Product::where('product_name', 'like', "%$keySearch%")->orWhere('product_model', 'like', "%$keySearch%")->paginate(20);
        return view('pages.search', ['products' => $products, 'key_search' => $keySearch]);
    }

    function chuyenmuc($cate_namekd)
    {
        $cate = Cate::where('cate_namekd', $cate_namekd)->first();//1 item
        $subcate = Subcate::where('cate_id', $cate->id)->pluck('id')->toArray();//array
        $subCategory = Subcate::where('cate_id', $cate->id)->get();//array
		$products = Product::whereIn('subcate_id', $subcate)->paginate(30);
        // dd($subcate);
        return view('pages.chuyenmuc', ['cate2' => $cate, 'products' => $products, 'subCategory'=>$subCategory]);
    }

    function chuyenmuc2($cate_namekd, $subcate_namekd)
    {
        $cate = Cate::where('cate_namekd', $cate_namekd)->first();//1 item
        $subcate = Subcate::where('subcate_namekd', $subcate_namekd)->first();//1 item
        $product = Product::where('subcate_id', $subcate->id)->paginate(30);//array
		
        return view('pages.loaitin', ['cate1' => $cate, 'subcate2' => $subcate, 'product2' => $product]);
    }

    function nhasx($cate_namekd, $subcate_namekd, $nsx_namekd)
    {
        $nsx = Nsx::where('nsx_namekd', $nsx_namekd)->first();
        $product = Product::where('nsx_id', $nsx->id)->paginate(40);
        return view('pages.nhasx', ['nsx3' => $nsx, 'product3' => $product]);
    }

    function detailProduct($product_namekd)
    {
        $product = Product::where('product_namekd', $product_namekd)->first();
		view()->share('productview', $product);
        $images = $product->images()->orderBy("sort")->get();
		$relatedProduct = Product::where('subcate_id', $product->subcate_id)->where('id', '!=', $product->id)->take(4)->orderBy('id')->get();
        return view('pages.product-detail', ['product4' => $product, 'images' => $images, 'relatedProduct'=>$relatedProduct]);
    }

    function chuyenmucnew($cate_namekd, $sort)
    {
        $cate = Cate::where('cate_namekd', $cate_namekd)->first();//1 item
        $subcate = Subcate::where('cate_id', $cate->id)->get();//array
        switch ($sort) {
            case 'sort=new':
                $pro = array();
                foreach ($subcate as $s) {
                    $product = Product::where('subcate_id', $s->id)->orderBy('id', 'asc')->get();
                    json_decode($product);
                    $pro = array_merge($pro, json_decode($product));
                }
                usort($pro, function ($a, $b) {
                    if ($a->id == $b->id) return 0;
                    return ($a->id) < ($b->id) ? 1 : -1;
                    return strcmp($a->id, $b->id);
                });
                $pro = (object)$pro;
                break;
            case 'sort=price-asc':
                $pro = array();
                foreach ($subcate as $s) {
                    $product = Product::where('subcate_id', $s->id)->orderBy('product_price', 'asc')->get();
                    json_decode($product);
                    $pro = array_merge($pro, json_decode($product));
                }
                usort($pro, function ($a, $b) {
                    if ($a->product_price == $b->product_price) return 0;
                    return ($a->product_price) > ($b->product_price) ? 1 : -1;
                    return strcmp($a->product_price, $b->product_price);
                });
                $pro = (object)$pro;
                break;
            case 'sort=price-desc':
                $pro = array();
                foreach ($subcate as $s) {
                    $product = Product::where('subcate_id', $s->id)->orderBy('product_price', 'desc')->get();
                    json_decode($product);
                    $pro = array_merge($pro, json_decode($product));
                }

                usort($pro, function ($a, $b) {
                    if ($a->product_price == $b->product_price) return 0;
                    return ($a->product_price) < ($b->product_price) ? 1 : -1;
                    return strcmp($a->product_price, $b->product_price);
                });
                $pro = (object)$pro;
                break;
            case 'sort=name':
                $pro = array();
                $pro2 = array();
                foreach ($subcate as $s) {
                    $product = Product::where('subcate_id', $s->id)->orderBy('product_name')->get();
                    json_decode($product);
                    $pro = array_merge($pro, json_decode($product));
                }

                usort($pro, function ($a, $b) {
                    return strcmp($a->product_name, $b->product_name);
                });
                $pro = (object)$pro;
                break;
        }
        return view('pages.chuyenmuc', ['cate2' => $cate, 'subcate3' => $subcate, 'product_sapxep' => $pro]);
    }

}
