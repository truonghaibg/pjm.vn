<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Partners;


class PartnersController extends Controller
{
    //

    public function getList(){
        $partners = Partners::all();
        return view('admin.partners.list',['partners'=>$partners]);
    }


    public function getAdd(){
    	return view('admin.partners.add');
    }
    public function postAdd(Request $request){
        $this->validate($request,
            [
                'name'=>'required|min:3',
            ],
            [
                'name.required'=>'Tên đối tác không được để trống',
                'name.min'=>'Tên đối tác phải có ít nhất 3 kí tự'
            ]);

        $partners = new Partners;
        $partners->name = $request->name;
        $partners->description = $request->description;
        $partners->link = $request->link;
        $partners->address = $request->address;
        $partners->mobile_phone = $request->mobile_phone;

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $name = $file->getClientOriginalName();
            $img = str_random(4)."_".$name;
            while (file_exists("upload/partners/".$img)) {
                $img = str_random(4)."_".$name;
            }
            $file->move("upload/partners",$img);
            $partners->logo = $img;
        } else{
            $partners->logo = "";
        }
        $partners->save();


        return redirect('admin/partners/list')->with('thongbao','Thêm đối tác thành công');
    }

    public function getEdit($id){
        $partners = Partners::find($id);
        return view('admin.partners.edit',['partners'=>$partners]);
    }

    public function postEdit(Request $request,$id){
        $partners = Partners::find($id);
        $this->validate($request,
            [
                'name'=>'required|min:3',
            ],
            [
                'name.required'=>'Tên đối tác không được để trống',
                'name.min'=>'Tên đối tác phải có ít nhất 3 kí tự'
            ]);

        $partners->name = $request->name;
        $partners->description = $request->description;
        $partners->link = $request->link;
        $partners->address = $request->address;
        $partners->mobile_phone = $request->mobile_phone;

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $name = $file->getClientOriginalName();
            $img = str_random(4)."_".$name;
            while (file_exists("upload/partners/".$img)) {
                $img = str_random(4)."_".$name;
            }
            $file->move("upload/partners",$img);
            $partners->logo = $img;
        }







        $partners->save();
        return redirect('admin/partners/list')->with('thongbao','Sửa thành công');
    }

    public function getDel($id){
        $partners = Partners::find($id);
        $partners->delete();
        return redirect('admin/partners/list')->with('thongbao','Xóa thành công');
    }
    //
}
