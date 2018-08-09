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
class PageController extends Controller
{
    //
    function __construct(){

    	$cate = Cate::all();
    	$subcate = Subcate::all();
      $nsx = Nsx::all();
      $product = Product::all();
      $news = News::all();
      $order = Order::all();

    	view()->share('cate',$cate);
    	view()->share('subcate',$subcate);
      view()->share('nsx',$nsx);
      view()->share('product',$product);
      view()->share('news',$news);
      view()->share('order',$order);

    	$nb = Post::where('post_high','1')->paginate(4);
    	view()->share('nb',$nb);
    	$news = News::all();
    	view()->share('news',$news);
    	$events = Events::all();
    	view()->share('events',$events);
        $cate1 = Cate::where('customer_id','1')->first();
    }

    function trangchu(){
    	$post = Post::where('subcate_id','7')->paginate(6);
    	return view('pages.trangchu',['post'=>$post]);
    }
    function export(){
      $export=Cate::all();

      Excel::create('test', function ($excel) use($export){
        $excel->sheet('sheet', function ($sheet) use($export){
            $sheet->fromArray($export);
        });
      })->export('xls');
    }
    function contact(){
    	return view('pages.contact');
    }
    function news(){
      $n = News::all();
    	return view('pages.news',['n'=>$n]);
    }
    function newsNoidung($titlekd){
      $new = News::where('titlekd',$titlekd)->first();
    	$n = News::all();
    	return view('pages.newsNoidung',['new'=>$new,'n'=>$n]);
    }
    function events(){
      return view('pages.events');
    }
    function eventsNoidung($id){
      $ea = Events::all();
      $events = Events::find($id);
      return view('pages.eventsNoidung',['events'=>$events,'ea'=>$ea]);
    }

    function themvaogio($id)
    {
      $product =Product::find($id);
      $phantram = ($product->product_salevalue)/100;
      $tiensale = ($product->product_price)*$phantram;
      $price=($product->product_price)-$tiensale;
      Cart::add(['id' => $product->id, 'name' => $product->product_name,'options'=> array('img'=>$product->product_img,
      'namekd' => $product->product_namekd, 'sale'=>$product->product_salevalue,'model'=>$product->product_model),
       'qty' => 1, 'price' => $price]);
      return redirect('item/'.$product->product_namekd);
    }
    function themmuangay($id)
    {
      $product =Product::find($id);
      $phantram = ($product->product_salevalue)/100;
      $tiensale = ($product->product_price)*$phantram;
      $price=($product->product_price)-$tiensale;
      Cart::add(['id' => $product->id, 'name' => $product->product_name,'options'=> array('img'=>$product->product_img,
      'namekd' => $product->product_namekd, 'sale'=>$product->product_salevalue,'model'=>$product->product_model),
       'qty' => 1, 'price' => $price]);
      return redirect('gio-hang');
    }
    function giohangstep2()
    {
      return view('pages.giohangstep2');
    }
    function delitem($rowId){
      Cart::remove($rowId);
      return redirect('gio-hang');
    }
    function update(Request $request){
      $qty= $request->qty;
      $rowId=json_decode($request->rowid,true);
      $result = count($rowId);
      $i=0;
      while ($i < $result) {
        Cart::update($rowId[$i], $qty[$i]);
        $i++;
      }
      return redirect('gio-hang');
    }
    function giohang(){
      return view('pages.giohang');
    }
    function success(){
      return view('pages.success');
    }
    function timkiem(Request $request){
      $tukhoa= $request->search;
      $products=Product::where('product_name','like',"%$tukhoa%")->orWhere('product_model','like',"%$tukhoa%")->paginate(20);
      return view('pages.timkiem',['products'=>$products,'tukhoa'=>$tukhoa]);
    }
    function chuyenmuc($cate_namekd){
    	$cate = Cate::where('cate_namekd',$cate_namekd)->first();//1 item
    	$subcate = Subcate::where('cate_id',$cate->id)->paginate(100);//array
      // dd($subcate);
    	return view('pages.chuyenmuc',['cate2'=>$cate,'subcate3'=>$subcate]);
    }
    function loaitin($cate_namekd,$subcate_namekd){
    	$cate = Cate::where('cate_namekd',$cate_namekd)->first();//1 item
    	$subcate = Subcate::where('subcate_namekd',$subcate_namekd)->first();//1 item
    	$product = Product::where('subcate_id',$subcate->id)->paginate(100);//array
    	return view('pages.loaitin',['cate1'=>$cate,'subcate2'=>$subcate,'product2'=>$product]);
    }
    function nhasx($cate_namekd,$subcate_namekd,$nsx_namekd){
      $nsx = Nsx::where('nsx_namekd',$nsx_namekd)->first();
      $product = Product::where('nsx_id',$nsx->id)->paginate(100);
    	return view('pages.nhasx',['nsx3'=>$nsx,'product3'=>$product]);
    }
    function sanpham($product_namekd){
      $product = Product::where('product_namekd',$product_namekd)->first();
      return view('pages.sanpham',['product4'=>$product]);
    }
    function tintuc($cate_namekd,$subcate_namekd,$post_titlekd){
    	$cate = Cate::where('cate_namekd',$cate_namekd)->first();
    	$subcate = Subcate::where('subcate_namekd',$subcate_namekd)->first();
    	$post = Post::where('post_titlekd',$post_titlekd)->first();
    	$p = Post::where('subcate_id',$subcate->id)->paginate(2);
    	return view('pages.tintuc',['cate1'=>$cate,'subcate'=>$subcate,'post'=>$post,'p'=>$p]);
    }
    function report(){

    }

    function chuyenmucnew($cate_namekd,$sort){
      $cate = Cate::where('cate_namekd',$cate_namekd)->first();//1 item
      $subcate = Subcate::where('cate_id',$cate->id)->get();//array
      // dd($subcate);
        switch ($sort) {
          case 'sort=new':
            $pro=array();
            foreach ($subcate as $s) {
              $product = Product::where('subcate_id',$s->id)->orderBy('id','asc')->get();
              // dd($product);
              // dd(json_decode($product));
              // $object = (object) $product;
              json_decode($product);
              $pro = array_merge($pro, json_decode($product));
              // array_push($product, json_decode($product));
              
              // array_push($product,json_decode($product));
              
            }
            usort($pro, function($a, $b)
            {
                if($a->id==$b->id) return 0;
              return ($a->id) < ($b->id)?1:-1;
                return strcmp($a->id, $b->id);
            }); 
            // usort($pro, array($this, "cmp"));
            // dd($pro);
            $pro=(object)$pro;
            // array_push($product,json_decode($product));
            // json_decode($pro);
            // dd($pro);
            break;
          case 'sort=price-asc':
            $pro=array();
            foreach ($subcate as $s) {
              $product = Product::where('subcate_id',$s->id)->orderBy('product_price','asc')->get();
              // dd($product);
              // dd(json_decode($product));
              // $object = (object) $product;
              json_decode($product);
              $pro = array_merge($pro, json_decode($product));
              // array_push($product, json_decode($product));
              
              // array_push($product,json_decode($product));
              
            }
            usort($pro, function($a, $b)
            {
                if($a->product_price==$b->product_price) return 0;
              return ($a->product_price) > ($b->product_price)?1:-1;
                return strcmp($a->product_price, $b->product_price);
            }); 
            // usort($pro, array($this, "cmp"));
            // dd($pro);
            $pro=(object)$pro;
            // array_push($product,json_decode($product));
            // json_decode($pro);
            // dd($pro);
            break;
          case 'sort=price-desc':
            $pro=array();
            foreach ($subcate as $s) {
              $product = Product::where('subcate_id',$s->id)->orderBy('product_price','desc')->get();
              // dd($product);
              // dd(json_decode($product));
              // $object = (object) $product;
              json_decode($product);
              $pro = array_merge($pro, json_decode($product));
              // array_push($product, json_decode($product));
              
              // array_push($product,json_decode($product));
              
            }
            
            usort($pro, function($a, $b)
            {
              if($a->product_price==$b->product_price) return 0;
              return ($a->product_price) < ($b->product_price)?1:-1;
                return strcmp($a->product_price, $b->product_price);
            }); 
            // usort($pro, array($this, "cmp"));
            // dd($pro);
            $pro=(object)$pro;
            // array_push($product,json_decode($product));
            // json_decode($pro);
            // dd($pro);
            break;
          case 'sort=name':
            $pro=array();
            $pro2=array();
            foreach ($subcate as $s) {
              $product = Product::where('subcate_id',$s->id)->orderBy('product_name')->get();
              // dd($product);
              // dd(json_decode($product));
              // $object = (object) $product;
              json_decode($product);
              $pro = array_merge($pro, json_decode($product));
              // array_push($product, json_decode($product));
              
              // array_push($product,json_decode($product));
              
            } 
            
            usort($pro, function($a, $b)
            {
                return strcmp($a->product_name, $b->product_name);
            }); 
            // usort($pro, array($this, "cmp"));
            // dd($pro);
            $pro=(object)$pro;
            // array_push($product,json_decode($product));
            // json_decode($pro);
            // dd($pro);
            break;
        }
        
      // dd($product);

      return view('pages.chuyenmuc',['cate2'=>$cate,'subcate3'=>$subcate,'product_sapxep'=>$pro]);
    }

}
