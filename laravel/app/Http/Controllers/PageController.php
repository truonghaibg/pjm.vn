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
use App\Banner;
use App\TagsBelong;
use App\NewsCategory;
use App\ProductContact;

class PageController extends Controller
{
    //
    function __construct()
    {
        $cate = Cate::all();
        $subcate = Subcate::all();
        $nsx = Nsx::all();
        $product = Product::all();
        $productSuggests = Product::where('issuggest', 1)->take(8)->orderBy('created_at', 'desc')->get();
		
        $news = News::all();
        $order = Order::all();
        $posts = Post::all();
        $banner = Banner::where('name', 'home')->get()->first();

        view()->share('banner', $banner);
        view()->share('cate', $cate);
        view()->share('subcate', $subcate);
        view()->share('nsx', $nsx);
        view()->share('product', $product);
        view()->share('productSuggests', $productSuggests);
        view()->share('news', $news);
        view()->share('order', $order);

        view()->share('posts', $posts);

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
        $news = News::where('news_category_id', "!=", 0)->orderBy('id', 'DESC')->paginate(20);
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
        $news = News::where('news_category_id', $id)->orderBy('id', 'DESC')->paginate(20);
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
		$relatedNews = News::where("news_category_id", $new->news_category_id)->take(5)->orderBy('created_at', 'desc')->get();
        return view('pages.news-detail', ['new' => $new, 'n' => $n, "newsCategory" => $newsCategory, "relatedNews" => $relatedNews]);
    }

    function detailPost($slug)
    {
        $posts = Post::all();
        $post = Post::where('slug', $slug)->first();
        view()->share('post_view', $post);
        return view('pages.post-detail', ['post' => $post]);
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

    function search($key, Request $request)
    {
        $keySearch = $key;
        $products = Product::where('product_name', 'like', "%$keySearch%")->orWhere('product_model', 'like', "%$keySearch%")->paginate(20);
        return view('pages.search', ['products' => $products, 'key_search' => $keySearch]);
    }

    function chuyenmuc($cate_namekd)
    {
        $cate = Cate::where('cate_namekd', $cate_namekd)->first();//1 item
        $subcate = Subcate::where('cate_id', $cate->id)->pluck('id')->toArray();//array
        $subCategory = Subcate::where('cate_id', $cate->id)->get();//array
		$products = Product::whereIn('subcate_id', $subcate)->paginate(30);
		$productSuggests = Product::where('issuggest', 1)->take(8)->orderBy('created_at', 'desc')->get();
        // dd($subcate);
        return view('pages.chuyenmuc', ['cate2' => $cate, 'products' => $products, 'subCategory'=>$subCategory, 'productSuggests' => $productSuggests]);
    }

    function chuyenmuc2($cate_namekd, $subcate_namekd)
    {
        $cate = Cate::where('cate_namekd', $cate_namekd)->first();//1 item
        $subcate = Subcate::where('subcate_namekd', $subcate_namekd)->first();//1 item
        $product = Product::where('subcate_id', $subcate->id)->paginate(30);//array
		$productSuggests = Product::where('issuggest', 1)->take(8)->orderBy('created_at', 'desc')->get();
        return view('pages.loaitin', ['cate1' => $cate, 'subcate2' => $subcate, 'product2' => $product, 'productSuggests' => $productSuggests]);
    }

    function nhasx($cate_namekd, $subcate_namekd, $nsx_namekd)
    {
        $nsx = Nsx::where('nsx_namekd', $nsx_namekd)->first();
        $product = Product::where('nsx_id', $nsx->id)->paginate(40);
		$productSuggests = Product::where('issuggest', 1)->take(8)->orderBy('created_at', 'desc')->get();
        return view('pages.nhasx', ['nsx3' => $nsx, 'product3' => $product, 'productSuggests' => $productSuggests] );
    }

    function detailProduct($product_namekd)
    {
        $product = Product::where('product_namekd', $product_namekd)->first();
		view()->share('productview', $product);
        $images = $product->images()->orderBy("sort")->get();
		$relatedProduct = Product::where('subcate_id', $product->subcate_id)->where('id', '!=', $product->id)->take(4)->orderBy('id')->get();
		$productSuggests = Product::where('issuggest', 1)->take(8)->orderBy('created_at', 'desc')->get();
		return view('pages.product-detail', ['product4' => $product, 'images' => $images, 'relatedProduct'=>$relatedProduct, 'productSuggests' => $productSuggests]);
    }
	function productContact(Request $request, $product_namekd)
    {
		$this->validate($request,
		[
			'number' => 'required',
			'content' => 'required',
		],
		[
			'number' => 'Số lượng không được để trống',
			'content' => 'Nội dung không được để trống'
		]);
		$productContact = new ProductContact;
		$productContact->product_id = $request->id;
		$productContact->number = $request->number;
		$productContact->content = $request->content;
		$productContact->phone = $request->phone;
		$productContact->email = $request->email;;
		$productContact->status = 0;
		$productContact->save();
		return redirect('san-pham/'.$product_namekd)->with('thongbao', 'Cảm ơn bạn đã quan tâm đến sản phẩm.Chúng tôi sẽ sớm liên hệ bạn.');
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
