<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Subcate;
use App\Nsx;
use App\Product;
use App\Image;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function getList(){
        $product = Product::orderBy('id','DESC')->get();
        return view('admin.product.list',['product'=>$product]);
    }
    public function getAdd(){
    	$nsx = Nsx::all();
    	$subcate = Subcate::all();
    	return view('admin.product.add',['nsx'=>$nsx],['subcate'=>$subcate]);
    }
    public function postAdd(Request $request){
        $this->validate($request,
            [
                'subcate_id'=>'required',
                'product_name'=>'required|min:3|unique:product,product_name',
            ],
            [
                'subcate_id.required'=>'Chuyên mục không được để trống',
                'product_name.required'=>'Tên sản phẩm không được để trống',
                'product_name.min'=>'Tên sản phẩm phải có ít nhất 3 kí tự',
                'product_name.unique'=>'Tên sản phẩm đã tồn tại'
            ]);

        $product = new Product;
        $product->product_name = $request->product_name;
        $product->product_namekd = changeTitle($request->product_name);
        $product->subcate_id = $request->subcate_id;
        if (isset($request->nsx_id)) {
            $product->nsx_id = $request->nsx_id;
        } else{
            $product->nsx_id ="0";
        }
        
        $product->product_price = $request->product_price;
        $product->product_info = $request->product_info;
        $product->product_status = $request->product_status;
        $product->product_model = $request->product_model;
        $product->product_tag = $request->product_tag;
        $product->product_salevalue = $request->product_salevalue;
		$product->product_img = "";
		
        $product->save();
		if ($request->hasFile('product_img')) {
			$listFileUpload = $request->file('product_img');
			$i= 1;
			while($i < 6){
				
				if(isset($listFileUpload[$i])){
					$file = $listFileUpload[$i];
					$name = $file->getClientOriginalName();
					$product_img = str_random(4)."_".$name;
					while (file_exists("upload/product/".$product_img)) {
						$product_img = str_random(4)."_".$name;
					}
					$file->move("upload/product",$product_img);
					$newImage = new Image;
					$newImage->product_id = $product->id;
					$newImage->sort = $i;
					$newImage->name = $product_img;
					$newImage->save();
				}
				if($i == 1){
					$productEditImage = Product::find($product->id);
					$productEditImage->product_img = $product_img; 
					$productEditImage->save();
				}
				$i++;
			}
		}
        return redirect('admin/product/list')->with('thongbao','Thêm sản phẩm thành công');
    }
    
    public function getEdit($id){
        $nsx = Nsx::all();
        $subcate = Subcate::all();
        $product = Product::find($id);
		$images = $product->images()->orderBy("sort")->get();
        return view('admin.product.edit',['product'=>$product,'subcate'=>$subcate,'nsx'=>$nsx, 'images'=>$images]);
    }

    public function postEdit(Request $request,$id){
        $product = Product::find($id);
        $this->validate($request,
            [
                'product_name'=>'required|min:3',
            ],
            [
                'product_name.required'=>'Tên sản phẩm không được để trống',
                'product_name.min'=>'Tên sản phẩm phải có ít nhất 3 kí tự'
            ]);
        $product->product_name = $request->product_name;
        $product->product_namekd = changeTitle($request->product_name);
        $product->subcate_id = $request->subcate_id;
        if (isset($request->nsx_id)) {
            $product->nsx_id = $request->nsx_id;
        } else{
            $product->nsx_id ="0";
        }
        $product->product_price = $request->product_price;
        $product->product_info = $request->product_info;
        $product->product_status = $request->product_status;
        $product->product_model = $request->product_model;
        $product->product_tag = $request->product_tag;
        $product->product_salevalue = $request->product_salevalue;
		if ($request->hasFile('product_img')) {
			$listFileUpload = $request->file('product_img');
			$i= 1;
			while($i < 6){
				if(isset($listFileUpload[$i])){
					$file = $listFileUpload[$i];
					$oldImage = Product::find($id)->images()->orderBy("sort")->get();
					foreach($oldImage as $removeOldImage){
						if($removeOldImage->sort == $i){
							Image::find($removeOldImage->id)->delete();
						}
					}
					
					$name = $file->getClientOriginalName();
					$product_img = str_random(4)."_".$name;
					while (file_exists("upload/product/".$product_img)) {
						$product_img = str_random(4)."_".$name;
					}
					$file->move("upload/product",$product_img);
					$newImage = new Image;
					$newImage->product_id = $id;
					$newImage->sort = $i;
					$newImage->name = $product_img;
					$newImage->save();
				}
				$i++;
			}
			$checkProductImage = Product::find($id);
			$imageNew =  $checkProductImage->images()->orderBy("sort")->first();
			$product->product_img = $imageNew->name;
		}
        $product->save();
        return redirect('admin/product/list')->with('thongbao','Sửa thành công');
    }

    public function getDel($id){
        $product = Product::find($id);
        $product->delete();
        return redirect('admin/product/list')->with('thongbao','Xóa thành công');
    }
    //
}
