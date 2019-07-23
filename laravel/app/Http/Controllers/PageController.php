<?php

namespace App\Http\Controllers;

use App\Contact;
use App\ProCate;
use App\ProMaker;
use App\ProSubcate;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use Cart;
use App\Product;
use App\News;
use App\Events;
use Excel;
use App\ProductContact;
use Validator;

class PageController extends Controller
{
    function getHome()
    {
        $productSuggests = Product::where('is_suggest', 1)->take(8)->orderBy('created_at', 'desc')->get();
        $productLatest = Product::where('is_new', 1)->take(8)->orderBy('created_at', 'desc')->get();
        $productSale = Product::where('is_sale', 1)->take(8)->orderBy('created_at', 'desc')->get();
        $slider = Slider::take(4)->get();
        return view('pages.home', [
            'sliders'=>$slider,
            'productSuggests'=>$productSuggests,
            'productLatest' => $productLatest,
            'productSale' => $productSale
        ]);
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
        $news = News::where('category_id', "!=", 0)->orderBy('id', 'DESC')->paginate(12);
        return view('pages.news', ['news' => $news]);
    }

    function newsCategory($id)
    {
        $news = News::where('category_id', $id)->orderBy('id', 'DESC')->paginate(12);
        return view('pages.news', ['news' => $news]);
    }

    function detailNews($slug)
    {
        $new = News::where('slug', $slug)->first();
		$relatedNews = News::where("category_id", $new->category_id)->take(3)->orderBy('created_at', 'desc')->get();
        return view('pages.news-detail', ['new' => $new, 'relatedNews' => $relatedNews]);
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
        $tiensale = ($product->price) * $phantram;
        $price = ($product->price) - $tiensale;
        Cart::add([
            'id' => $product->id,
            'name' => $product->title,
            'options' => array(
                'img' => $product->image,
                'slug' => $product->slug,
                'sale' => $product->product_salevalue,
                'model' => $product->product_model
            ),
            'qty' => 1,
            'price' => $price
        ]);
        return redirect('item/' . $product->slug);
    }

    function themmuangay($id)
    {
        $product = Product::find($id);
        $phantram = ($product->product_salevalue) / 100;
        $tiensale = ($product->price) * $phantram;
        $price = ($product->price) - $tiensale;
        Cart::add([
            'id' => $product->id,
            'name' => $product->title,
            'options' => array(
                'img' => $product->image,
                'slug' => $product->slug,
                'sale' => $product->product_salevalue,
                'model' => $product->product_model
            ),
            'qty' => 1,
            'price' => $price
        ]);
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
        $products = Product::where('title', 'like', "%$keySearch%")->orWhere('product_model', 'like', "%$keySearch%")->paginate(20);
        return view('pages.search', ['products' => $products, 'key_search' => $keySearch]);
    }

    function chuyenmuc($slug)
    {
        $proCate = ProCate::where('slug', $slug)->first();//1 item
        $subcate = ProSubcate::where('cate_id', $proCate->id)->pluck('id')->toArray();
        $subCategory = ProSubcate::where('cate_id', $proCate->id)->get();//array
		$products = Product::whereIn('subcate_id', $subcate)->paginate(27);
		$productSuggests = Product::where('is_suggest', 1)
            ->take(8)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.chuyenmuc',
            [
                'item' => $proCate,
                'products' => $products,
                'subCategory'=>$subCategory,
                'productSuggests' => $productSuggests
            ]);
    }

    function chuyenmuc2($cate_slug, $subcate_slug)
    {
        $proCate = ProCate::where('slug', $cate_slug)->first();
        $subcate = ProSubcate::where('slug', $subcate_slug)->first();
        $product = Product::where('subcate_id', $subcate->id)->paginate(27);
		$productSuggests = Product::where('is_suggest', 1)->take(8)->orderBy('created_at', 'desc')->get();
        return view('pages.loaitin',
            [
                'cate1' => $proCate,
                'subcate2' => $subcate,
                'product2' => $product,
                'productSuggests' => $productSuggests
            ]);
    }

    function nhasx($cate_slug, $subcate_slug, $nsx_slug)
    {
        $nsx = ProMaker::where('slug', $nsx_slug)->first();
        $product = Product::where('nsx_id', $nsx->id)->paginate(20);
		$productSuggests = Product::where('is_suggest', 1)->take(8)->orderBy('created_at', 'desc')->get();
        return view('pages.nhasx', [
            'nsx3' => $nsx,
            'product3' => $product,
            'productSuggests' => $productSuggests
        ]);
    }

    function detailProduct($slug)
    {
        $product = Product::where('slug', $slug)->first();
		view()->share('productview', $product);
		$relatedProduct = Product::where('subcate_id', $product->subcate_id)->where('id', '!=', $product->id)->take(4)->orderBy('id')->get();
		$productSuggests = Product::where('is_suggest', 1)->take(8)->orderBy('created_at', 'desc')->get();
		return view('pages.product-detail', [
		    'product' => $product,
            'relatedProduct'=>$relatedProduct,
            'productSuggests' => $productSuggests
        ]);
    }
	function productContact(Request $request, $slug)
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
		return redirect('san-pham/'.$slug)->with('thongbao', 'Cảm ơn bạn đã quan tâm đến sản phẩm.Chúng tôi sẽ sớm liên hệ bạn.');
    }

    function getContact()
    {
        $posts = Post::where('status', 1)->get();
        return view('pages.contact_us', [
            "posts" => $posts
        ]);
    }

    function postContact(Request $request){

        $rules = [
            'name' => 'required',
            'email' => 'required',
            'title' => 'required',
            'mobile' => 'required',
            'description' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $contact = new Contact();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->title = $request->title;
            $contact->mobile = $request->mobile;
            $contact->description = $request->comment;
            $currentDate = \Carbon\Carbon::now();
            $contact->created_at = $currentDate;
            $contact->updated_at = $currentDate;
            $contact->save();
        }
        return redirect()->back()->with('info','Cảm ơn bạn đã gửi thông tin!. Chúng tôi sẽ sớm liên hệ với bạn !');
    }

}
