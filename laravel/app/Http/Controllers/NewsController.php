<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\News;
use App\Tags;
use App\TagsBelong;
use App\NewsCategory;

class NewsController extends Controller
{
    //
    public function getList(){
        $news = News::where('news_category_id', 0)->orderBy('id','DESC')->get();
        return view('admin.news.list',['news'=>$news]);
    }
    public function getListNews(){
        $news = News::where('news_category_id', "!=" , 0)->orderBy('id','DESC')->get();
		$i = 0;
		foreach($news as $item){
			$newscate = NewsCategory::find($item->news_category_id)->get()->first();
			$news[$i]->cate_name = $newscate->name;
			$i++;
		}
		
        return view('admin.news.list',['news'=>$news]);
    }
    public function getListNewsCate(){
        $newscate = NewsCategory::all();
        return view('admin.news.newscatelist',['newscate'=>$newscate]);
    }
    public function getAdd(){
    	$news = News::all();
        $tags = Tags::all();
		$newsCategory = NewsCategory::all();
    	return view('admin.news.add',['news'=>$news, "tags" => $tags, "newsCategory" => $newsCategory]);
    }
	public function getAddNewsCate(){
    	return view('admin.news.newscateadd');
    }
	public function postAddNewsCate(Request $request){
    	$this->validate($request,
            [
                'name'=>'required|min:3',
            ],
            [
                'name.required'=>'Tên danh mục không được để trống',
                'title.min'=>'Tên danh mục phải có ít nhất 3 kí tự'
            ]);

        $newsCategory = new NewsCategory;
        $newsCategory->name = $request->name;
        $newsCategory->save();
        return redirect('admin/news/news-cate-list')->with('thongbao','Thêm danh mục thành công');
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
        $news->content = $request->content;
        $news->sum = $request->sum;

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

        if($request->tags){
            $stringTags = $request->tags;
            $listTags = explode(',',$request->tags);
            foreach($listTags as $tag){
                $findTag = Tags::where('name', $tag)->get()->first();
                if(isset($findTag->id)){
                    $tagsBelong = new TagsBelong;
                    $tagsBelong->news_id = $news->id;
                    $tagsBelong->tags_id = $findTag->id;
                    $tagsBelong->save();
                } else {
                    $tags = new Tags;
                    $tags->name = $tag;
                    $tags->save();
                    $tagsBelong = new TagsBelong;
                    $tagsBelong->news_id = $news->id;
                    $tagsBelong->tags_id =  $tags->id;
                    $tagsBelong->save();
                }
            }
        }
        return redirect('admin/news/list')->with('thongbao','Thêm news thành công');
    }

    public function getEdit($id){
        $news = News::find($id);
        $tags = Tags::all();
		$newsCategory = NewsCategory::all();
        $findTagBelong = TagsBelong::where('news_id', $id)->get();
        $tagArray = [];
        foreach($findTagBelong as $tagBelong){
            $tag = Tags::where("id" ,$tagBelong->tags_id)->get()->first();
            $tagArray[] = $tag->name;
        }
        return view('admin.news.edit',['news'=>$news, "tagArray" => $tagArray, "tags" => $tags, "newsCategory"=>$newsCategory]);
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
			$news->news_category_id = $request->category;
            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $name = $file->getClientOriginalName();
                $img = str_random(4)."_".$name;
                while (file_exists("upload/news/".$img)) {
                    $img = str_random(4)."_".$name;
                }
                $file->move("upload/news/",$img);
                //unlink("upload/product/".$product->product_img);
                $news->img = $img;
            }


            $oldTags = TagsBelong::where("news_id", $id);
            $oldTags->delete();
            if($request->tags){
                $stringTags = $request->tags;
                $listTags = explode(',',$request->tags);
                foreach($listTags as $tag){
                    $findTag = Tags::where('name', $tag)->get()->first();
                    if(isset($findTag->id)){
                        $tagsBelong = new TagsBelong;
                        $tagsBelong->news_id = $id;
                        $tagsBelong->tags_id = $findTag->id;
                        $tagsBelong->save();
                    } else {
                        $tags = new Tags;
                        $tags->name = $tag;
                        $tags->save();
                        $tagsBelong = new TagsBelong;
                        $tagsBelong->news_id = $id;
                        $tagsBelong->tags_id =  $tags->id;
                        $tagsBelong->save();
                    }
                }
            }
        $news->save();
        return redirect('admin/news/list-tin-tuc')->with('thongbao','Sửa thành công');
    }
	public function getEditNewsCate($id){
        $newsCategory = NewsCategory::find($id);
        return view('admin.news.newscateedit',['newsCategory'=>$newsCategory]);
    }
	public function postEditNewsCate(Request $request,$id){
        $newsCategory = NewsCategory::find($id);
        $this->validate($request,
            [
                'name'=>'required|min:3',
            ],
            [
                'name.required'=>'Tên danh mục không được để trống',
                'name.min'=>'Tên danh mục phải có ít nhất 3 kí tự'
            ]);
            $newsCategory->name = $request->name;
            
        $newsCategory->save();
        return redirect('admin/news/news-cate-list')->with('thongbao','Sửa thành công');
    }
	
    public function getDel($id){
        $news = News::find($id);
        $news->delete();
        return redirect('admin/news/list-tin-tuc')->with('thongbao','Xóa thành công');
    }
	
	 public function getDelCate($id){
        $newsCategory = newsCategory::find($id);
        $newsCategory->delete();
        return redirect('admin/news/news-cate-list')->with('thongbao','Xóa thành công');
    }
}
