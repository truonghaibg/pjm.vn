<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Slider;

class ManagerController extends Controller
{   
	public function slider(){
        $slider =  Slider::all();
		return view('admin.manager.slider', ['slider'=>$slider]);
    }
	
	public function getSliderAdd(){
        return view('admin.manager.addslider');
    }
	public function postSliderAdd(Request $request){
		$this->validate($request,
            [
                'image'=>'required',
            ],
            [
                'image.required'=>'Ảnh không được để trống'
            ]);

        $slider = new Slider;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $img = str_random(4)."_".$name;
            while (file_exists("upload/slider/".$img)) {
                $img = str_random(4)."_".$name;
            }
            $file->move("upload/slider/",$img);
			$slider->sort =1;
            $slider->image = $img;
        } 
        $slider->link = $request->link;
		print_r( $slider);
        $slider->save();
        return redirect('admin/manager/slider')->with('thongbao','Thêm Slider thành công');
    }
	public function getSliderEdit($id){
		$slider = Slider::find($id);
        return view('admin.manager.editslider', ["slider" => $slider ]);
    }
	public function postSliderEdit(Request $request,$id){
        $slider = slider::find($id);
        $this->validate($request,
              [
                'image'=>'required',
            ],
            [
                'image.required'=>'Ảnh không được để trống'
            ]);
            $slider->link = $request->link; 
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $img = str_random(4)."_".$name;
                while (file_exists("upload/slider/".$img)) {
                    $img = str_random(4)."_".$name;
                }
                $file->move("upload/slider/",$img);
                $slider->image = $img;
            }
        $slider->save();
        return redirect('admin/manager/slider')->with('thongbao','Sửa thành công');
    }
	public function sliderDelete($id){
        $slider = slider::find($id);
        $slider->delete();
        return redirect('admin/manager/slider')->with('thongbao','Xóa thành công');
    }
	
}
