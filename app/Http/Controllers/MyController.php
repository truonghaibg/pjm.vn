<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class MyController extends Controller
{
    public function Xinchao(){
        echo "Xin chao cac ban";
    }
    public function MyView(){
    	return view('myview');
    }
    public function truyenview($t){
    	return view('myview',['bien'=>$t]);
    }
    //
}

