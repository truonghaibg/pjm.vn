<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\News;
use App\NewsCategory;

class NewsController extends Controller
{
    public function getList(){
        $news = News::where('news_category_id', "!=" , 0)->orderBy('id','DESC')->get();
		$i = 0;
		foreach($news as $item){
			$newscate = NewsCategory::find($item->news_category_id)->get()->first();
			$news[$i]->cate_name = $newscate->name;
			$i++;
		}
		
        return view('admin.news.list',['news'=>$news]);
    }

    public function getAdd(){
    	$news = News::all();
		$newsCategory = NewsCategory::all();
    	return view('admin.news.add',['news'=>$news, "newsCategory" => $newsCategory]);
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
        $news->news_category_id = $request->category;
        $news->title = $request->title;
        $news->titlekd = changeTitle($request->title);
        $news->content = $request->content_news;
        $news->sum = $request->sum;
        $news->meta_keywords = $request->meta_keywords;
        $news->meta_description = $request->meta_description;
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $name = $file->getClientOriginalName();
            $img = str_random(4)."_".$name;
            while (file_exists("upload/news/".$img)) {
                $img = str_random(4)."_".$name;
            }
            $file->move("upload/news/",$img);
            $news->img = $img;
        } else{
            $news->img = "";
        }
        $news->save();

        return redirect('admin/news/list')->with('thongbao','Thêm news thành công');
    }

    public function getEdit($id){
        $news = News::find($id);
		$newsCategory = NewsCategory::all();
        return view('admin.news.edit',['news'=>$news, "newsCategory"=>$newsCategory]);
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
            $news->content = $request->content_news;
            $news->sum = $request->sum;
            $news->meta_keywords = $request->meta_keywords;
            $news->meta_description = $request->meta_description;
			$news->news_category_id = $request->category;
            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $name = $file->getClientOriginalName();
                $img = str_random(4)."_".$name;
                while (file_exists("upload/news/".$img)) {
                    $img = str_random(4)."_".$name;
                }
                $file->move("upload/news/",$img);
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

}
