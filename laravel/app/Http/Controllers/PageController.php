<?php

namespace App\Http\Controllers;

use App\Partners;
use App\Slider;
use App\Video;
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
use App\Tags;
use App\TagsBelong;
use App\NewsCategory;
use App\ProductContact;

class PageController extends Controller
{
    function getHome()
    {
        $headerData = Partners::take(6)->get();
        $productSuggests = Product::where('issuggest', 1)->take(8)->orderBy('created_at', 'desc')->get();
        $slider = Slider::all();
        $video = Video::all()->first();
        return view('pages.home', ['slider'=>$slider,
            'video'=>$video, 'productSuggests'=>$productSuggests,
            'headerData'=>$headerData]);
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
        $new = News::where('titlekd', $titlekd)->first();
        view()->share('newview', $new);
        $n = News::all();
		$relatedNews = News::where("news_category_id", $new->news_category_id)->take(5)->orderBy('created_at', 'desc')->get();
        return view('pages.news-detail', ['new' => $new, 'n' => $n, "relatedNews" => $relatedNews]);
    }

    function detailPost($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $posts = Post::where('status', 1)->get();
        view()->share('post_view', $post);
        return view('pages.post-detail', ['post' => $post, 'posts'=>$posts]);
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
        $subcate = Subcate::where('cate_id', $cate->id)->pluck('id')->toArray();
        $subCategory = Subcate::where('cate_id', $cate->id)->get();//array
		$products = Product::whereIn('subcate_id', $subcate)->paginate(27);
		$productSuggests = Product::where('issuggest', 1)
            ->take(8)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.chuyenmuc',
            [
                'item' => $cate,
                'products' => $products,
                'subCategory'=>$subCategory,
                'productSuggests' => $productSuggests
            ]);
    }

    function chuyenmuc2($cate_namekd, $subcate_namekd)
    {
        $cate = Cate::where('cate_namekd', $cate_namekd)->first();
        $subcate = Subcate::where('subcate_namekd', $subcate_namekd)->first();
        $product = Product::where('subcate_id', $subcate->id)->paginate(27);
		$productSuggests = Product::where('issuggest', 1)->take(8)->orderBy('created_at', 'desc')->get();
        return view('pages.loaitin',
            [
                'cate1' => $cate,
                'subcate2' => $subcate,
                'product2' => $product,
                'productSuggests' => $productSuggests
            ]);
    }

    function nhasx($cate_namekd, $subcate_namekd, $nsx_namekd)
    {
        $nsx = Nsx::where('nsx_namekd', $nsx_namekd)->first();
        $product = Product::where('nsx_id', $nsx->id)->paginate(20);
		$productSuggests = Product::where('issuggest', 1)->take(8)->orderBy('created_at', 'desc')->get();
        return view('pages.nhasx', [
            'nsx3' => $nsx,
            'product3' => $product,
            'productSuggests' => $productSuggests
        ]);
    }

    function detailProduct($product_namekd)
    {
        $product = Product::where('product_namekd', $product_namekd)->first();
		view()->share('productview', $product);
        $images = $product->images()->orderBy("sort")->get();
		$relatedProduct = Product::where('subcate_id', $product->subcate_id)->where('id', '!=', $product->id)->take(4)->orderBy('id')->get();
		$productSuggests = Product::where('issuggest', 1)->take(8)->orderBy('created_at', 'desc')->get();
		return view('pages.product-detail', [
		    'product4' => $product,
            'images' => $images,
            'relatedProduct'=>$relatedProduct,
            'productSuggests' => $productSuggests
        ]);
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

}
