<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Cate;
use App\Subcate;
use App\Nsx;
use App\Post;
use App\Product;

class AjaxController extends Controller
{
    //
	public function getSubcate($cate_id){
		$subcate = Subcate::where('cate_id',$cate_id)->get();
		foreach ($subcate as $sc) {
			echo "<option value='".$sc->id."'>".$sc->subcate_name."</option>";
		}
	}
	public function getNsx($subcate_id){
		$nsx = Nsx::where('subcate_id',$subcate_id)->get();
		foreach ($nsx as $sc) {
			echo "<option value='".$sc->id."'>".$sc->nsx_name."</option>";
		}
	}
    
    //
}
