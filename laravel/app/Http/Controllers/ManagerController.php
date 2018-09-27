<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Slider;
use App\Video;
use App\Banner;

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
        $slider = Slider::find($id);
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
        $slider = Slider::find($id);
        $slider->delete();
        return redirect('admin/manager/slider')->with('thongbao','Xóa thành công');
    }
	public function getVideo(){
		$video = Video::all()->first();
		return view('admin.manager.video', ["video" => $video ]);
	}
	public function postVideo(Request $request){
		$video = Video::all()->first();
		$video->link = $request->link;
		$video->save();
		return redirect('admin/manager/video')->with('thongbao','Sửa thành công');
	}
	public function Banner(Request $request) {
		if(isset($request->update)){
			$banner = Banner::where("name", "home")->get()->first();
			if(isset($request->left_isenable)){
				$banner->left_isenable = $request->left_isenable;
			} else {
				$banner->left_isenable = 0;
			}
			if(isset($request->right_isenable)){
				$banner->right_isenable = $request->right_isenable;
			} else {
				$banner->right_isenable = 0;
			}
			if($request->hasFile('bannerleft')) {
				
                $file = $request->file('bannerleft');
                $name = $file->getClientOriginalName();
                $img = str_random(4)."_".$name;
                while (file_exists("upload/banner/".$img)) {
                    $img = str_random(4)."_".$name;
                }
                $file->move("upload/banner/",$img);
                $banner->bannerleft = $img;
            }
			if($request->hasFile('bannerright')) {
				
                $file = $request->file('bannerright');
                $name = $file->getClientOriginalName();
                $img = str_random(4)."_".$name;
                while (file_exists("upload/banner/".$img)) {
                    $img = str_random(4)."_".$name;
                }
                $file->move("upload/banner/",$img);
                $banner->bannerright = $img;
            }
			$banner->lefturl = $request->lefturl;
			$banner->righturl  = $request->righturl;
			$banner->save();
			$banner = Banner::where('name', 'home')->get()->first();
			$success = "success";
			return view('admin.manager.banner', ["banner" => $banner, "success"=>$success ]);
			
		} else {
			$banner = Banner::where('name', 'home')->get()->first();
			return view('admin.manager.banner', ["banner" => $banner ]);
		}
		
		
	}
	
}
