<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    //

    public function getList(){
        $news = News::orderBy('id','DESC')->get();
        return view('admin.news.list',['news'=>$news]);
    }
    public function getAdd(){
    	$news = News::all();
    	return view('admin.news.add',['news'=>$news]);
    }
    public function postAdd(Request $request){
        $this->validate($request,
            [
                'title'=>'required|min:3',
            ],
            [
                'title.required'=>'Tên news không được để trống',
                'title.min'=>'Tên news phải có ít nhất 3 kí tự'
            ]);

        $news = new News;
        $news->title = $request->title;
        $news->titlekd = changeTitle($request->title);
        $news->content = $request->content;
        $news->sum = $request->sum;

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $name = $file->getClientOriginalName();
            $img = str_random(4)."_".$name;
            while (file_exists("upload/news/".$img)) {
                $img = str_random(4)."_".$name;
            }
            $file->move("upload/news",$img);
            $news->img = $img;
        } else{
            $news->img = "";
        }
        /*if ($request->hasFile('product_pic')) {
            $product->product_pic = $request->file(product_pic);
        }   else{
            $product->product_pic = "";
        }*/
        $news->save();
        return redirect('admin/news/list')->with('thongbao','Thêm news thành công');
    }

    public function getEdit($id){
        $news = News::find($id);
        return view('admin.news.edit',['news'=>$news]);
    }

    public function postEdit(Request $request,$id){
        $news = News::find($id);
        $this->validate($request,
            [
                'title'=>'required|min:3',
            ],
            [
                'title.required'=>'Tên news không được để trống',
                'title.min'=>'Tên news phải có ít nhất 3 kí tự'
            ]);
            $news->title = $request->title;
            $news->titlekd = changeTitle($request->title);
            $news->content = $request->content;
            $news->sum = $request->sum;

            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $name = $file->getClientOriginalName();
                $img = str_random(4)."_".$name;
                while (file_exists("upload/news/".$img)) {
                    $img = str_random(4)."_".$name;
                }
                $file->move("upload/news",$img);
                //unlink("upload/product/".$product->product_img);
                $news->img = $img;
            }
        $news->save();
        return redirect('admin/news/list')->with('thongbao','Sửa thành công');
    }

    public function getDel($id){
        $news = News::find($id);
        $news->delete();
        return redirect('admin/news/list')->with('thongbao','Xóa thành công');
    }
    //
}
