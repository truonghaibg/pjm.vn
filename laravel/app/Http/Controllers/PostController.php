<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Cate;
use App\Subcate;
use App\Post;

class PostController extends Controller
{
    public function getList(){
        $post = Post::orderBy('id','DESC')->get();
        return view('admin.post.list',['posts'=>$post]);
    }

    public function getAdd(){
    	return view('admin.post.add');
    }
    public function postAdd(Request $request){
        $this->validate($request,
            [
                'title'=>'required',
                'slug'=>'required|unique:posts',
                'content_posts'=>'required'
            ],
            [
                'title.required'=>'Tiêu đề không được để trống',
                'slug.required'=>'Slug không được để trống',
                'slug.unique'=>'Slug đã tồn tại',
                'content_posts.required'=>'Tóm tắt không được để trống',
            ]);
        $post = new Post;
        $post->title = $request->title;
        $post->slug = changeTitle($request->slug);
        $post->description = $request->description;
        $post->content = $request->content_posts;
        $post->status = $request->status;
        $post->meta_keywords = $request->meta_keywords;
        $post->meta_description = $request->meta_description;
        $post->save();
        return redirect('admin/post/list')->with('thongbao','Thêm tin tức thành công');
    }
    
    public function getEdit($id){
        $post = Post::find($id);
        return view('admin.post.edit',['item'=>$post]);
    }

    public function postEdit(Request $request,$id){
        $post = Post::find($id);
        $this->validate($request,
            [
                'title'=>'required',
                'slug'=>'required',
                'content_posts'=>'required'
            ],
            [
                'title.required'=>'Tiêu đề không được để trống',
                'slug.required'=>'Slug không được để trống',
                'content_posts.required'=>'Tóm tắt không được để trống',
            ]);
        $post->title = $request->title;
        $post->slug = changeTitle($request->slug);
        $post->description = $request->description;
        $post->content = $request->content_posts;
        $post->status = $request->status;
        $post->meta_keywords = $request->meta_keywords;
        $post->meta_description = $request->meta_description;

        $post->save();
        return redirect('admin/post/list')->with('thongbao','Sửa thành công');
    }

    public function getDel($id){
        $post = Post::find($id);
        $post->delete();
        return redirect('admin/post/list')->with('thongbao','Xóa thành công');
    }

}
