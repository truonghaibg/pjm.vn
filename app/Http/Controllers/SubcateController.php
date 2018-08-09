<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Subcate;
use App\Cate;

class SubcateController extends Controller
{
    //

    public function getList(){
        $subcate = Subcate::all();
        return view('admin.subcate.list',['subcate'=>$subcate]);
    }

    public function getAdd(){
    	$cate = Cate::all();
        return view('admin.subcate.add',['cate'=>$cate]);
    }

    public function postAdd(Request $request){
        $this->validate($request,
            [
                'subcate_name' => 'required|unique:subcate,subcate_name|min:3|max:50'
            ]
            ,
            [
                'subcate_name.required' =>'Tên chuyên mục không được để trống',
                'subcate_name.unique' => 'Tên chuyên mục đã tồn tại',
                'subcate_name.min' =>'Tên chuyên mục phải từ 3-50 kí tự',
                'subcate_name.max' =>'Tên chuyên mục phải từ 3-50 kí tự',
            ]);

        $subcate=new Subcate;
        $subcate->subcate_name = $request->subcate_name;
        $subcate->subcate_namekd = changeTitle($request->subcate_name);
        $subcate->subcate_sum = $request->subcate_sum;
        $subcate->cate_id = $request->cate_id;
        if ($request->hasFile('subcate_img')) {
            $file = $request->file('subcate_img');
            $name = $file->getClientOriginalName();
            $subcate_img = str_random(4)."_".$name;
            while (file_exists("upload/subcate/".$subcate_img)) {
                $subcate_img = str_random(4)."_".$name;
            }
            $file->move("upload/subcate",$subcate_img);
            $subcate->subcate_img = $subcate_img;
        } else{
            $subcate->subcate_img = "";
        }
        $subcate->save();
        return redirect('admin/subcate/list')->with('thongbao','Them thanh cong');
    }
    //Thieu Customer
    public function getEdit($id){
    	$cate = Cate::all();
        $subcate = Subcate::find($id);
        return view('admin.subcate.edit',['subcate'=>$subcate],['cate'=>$cate]);
    }

    public function postEdit(Request $request,$id){
        $subcate= Subcate::find($id);
        $this->validate($request,
            [
                'subcate_name' =>'required|unique:subcate,subcate_name,'.$id.'|min:3|max:50'
            ],
            [
                'subcate_name.required' =>'Tên danh mục không được để trống',
                'subcate_name.unique' => 'Tên danh mục đã tồn tại',
                'subcate_name.min' =>'Tên danh mục phải từ 3-50 kí tự',
                'subcate_name.max' =>'Tên danh mục phải từ 3-50 kí tự',
            ]);
        $subcate->subcate_name=$request->subcate_name;
        $subcate->subcate_namekd = changeTitle($request->subcate_name);
        $subcate->subcate_sum = $request->subcate_sum;
        $subcate->cate_id = $request->cate_id;
        if ($request->hasFile('subcate_img')) {
            $file = $request->file('subcate_img');
            $name = $file->getClientOriginalName();
            $subcate_img = str_random(4)."_".$name;
            while (file_exists("upload/subcate/".$subcate_img)) {
                $subcate_img = str_random(4)."_".$name;
            }
            $file->move("upload/subcate",$subcate_img);
            //unlink("upload/subcate/".$subcate->subcate_img);
            $subcate->subcate_img = $subcate_img;
        }
        $subcate->save();
        return redirect('admin/subcate/list')->with('thongbao','Sửa thành công');
    }

    public function getDel($id){
        $subcate= Subcate::find($id);
        $subcate->delete();
        return redirect('admin/subcate/list')->with('thongbao','Xóa thành công');
    }

    
    //
}
