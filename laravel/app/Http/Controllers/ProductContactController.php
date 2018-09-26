<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Subcate;
use App\Nsx;
use App\Product;
use App\Image;
use App\Cate;
use App\ProductContact;
use Illuminate\Support\Facades\DB;

class ProductContactController extends Controller
{
   
	
	public function GetContactList(){
		$productContact = ProductContact::all();
		
		return view('admin.product.contactlist',['productContact'=>$productContact]);
	}
	public function GetContactDetails($id){
		$productContact = ProductContact::where("id", $id)->get()->first();
		return view('admin.product.contactview',['productContact'=>$productContact]);
	}
	public function PostContactDetails(Request $request, $id){
        $productContact = ProductContact::find($id);
		$productContact->status = $request->status;
		$productContact->save();
		return redirect('admin/product/product-contact-details/'.$id)->with('thongbao', 'Cập nhật thành công.');
	}
	
	public function RemoveContactDetails( $id){
		$product = ProductContact::find($id);
        $product->delete();
		return redirect('admin/product/product-contact-list')->with('thongbao', 'Đã xóa.');
	}
}
