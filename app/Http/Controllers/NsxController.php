<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Nsx;
use App\Subcate;


class NsxController extends Controller
{
    //

    public function getList(){
        $nsx = Nsx::all();
        //echo "testcase";
        return view('admin.nsx.list',['nsx'=>$nsx]);
    }

    public function getAdd(){
    	$subcate = Subcate::all();
        return view('admin.nsx.add',['subcate'=>$subcate]);
    }

    public function postAdd(Request $request){
        $this->validate($request,
            [
                'nsx_name' => 'required|min:3|max:50'
            ]
            ,
            [
                'nsx_name.required' =>'Tên chuyên mục không được để trống',
                'nsx_name.min' =>'Tên chuyên mục phải từ 3-50 kí tự',
                'nsx_name.max' =>'Tên chuyên mục phải từ 3-50 kí tự',
            ]);

        $nsx = new Nsx;
        $nsx->nsx_name = $request->nsx_name;
        $nsx->nsx_namekd = changeTitle($request->nsx_name);

        $nsx->subcate_id = $request->subcate_id;

        $nsx->save();
        return redirect('admin/nsx/list')->with('thongbao','Them thanh cong');
    }

    public function getEdit($id){
    	$subcate = Subcate::all();
        $nsx = Nsx::find($id);
        return view('admin.nsx.edit',['nsx'=>$nsx],['subcate'=>$subcate]);
    }

    public function postEdit(Request $request,$id){
        $nsx= Nsx::find($id);
        $this->validate($request,
            [
                'nsx_name' =>'required|min:3|max:50'
            ],
            [
                'nsx_name.required' =>'Tên danh mục không được để trống',
                'nsx_name.min' =>'Tên danh mục phải từ 3-50 kí tự',
                'nsx_name.max' =>'Tên danh mục phải từ 3-50 kí tự',
            ]);
        $nsx->nsx_name=$request->nsx_name;
        $nsx->nsx_namekd = changeTitle($request->nsx_name);
        $nsx->subcate_id = $request->subcate_id;
        $nsx->save();
        return redirect('admin/nsx/list')->with('thongbao','Sửa thành công');
    }

    public function getDel($id){
        $nsx= Nsx::find($id);
        $nsx->delete();
        return redirect('admin/nsx/list')->with('thongbao','Xóa thành công');
    }

    
    //
}
