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
use App\Order;

class ReportController extends Controller
{
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
  }
    public function getList(){
        $product = Product::all();
        $totalpro = count($product);
        $order = Order::all();
        $totalorder = count($order);
        $productpayed=Order::where('status','6')->orWhere('status','5')->orWhere('status','4')->orWhere('status','3')->get();
        $productwaitpay=Order::where('status','0')->orWhere('status','1')->orWhere('status','2')->get();
        $withpaypal=Order::where('payment_method','4')->whereIn('status',[3,4,5,6])->get();
        $chuyenkhoan=Order::where('payment_method','3')->whereIn('status',[3,4,5,6])->get();
        $cod=Order::where('payment_method','2')->whereIn('status',[3,4,5,6])->get();
        $tructiep=Order::where('payment_method','1')->whereIn('status',[3,4,5,6])->get();
        return view('admin.report.list')->with(['totalpro'=>$totalpro,'totalorder'=>$totalorder,'productpayed'=>$productpayed,'productwaitpay'=>$productwaitpay,'withpaypal'=>$withpaypal,'chuyenkhoan'=>$chuyenkhoan,'cod'=>$cod,'tructiep'=>$tructiep]);
    }


    //
}
