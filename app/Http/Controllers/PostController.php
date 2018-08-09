<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Cate;
use App\Subcate;
use App\Post;

class PostController extends Controller
{
    //

    public function getList(){
        $post = Post::orderBy('id','DESC')->get();
        return view('admin.post.list',['post'=>$post]);
    }
    public function getAdd(){
    	$cate = Cate::all();
    	$subcate = Subcate::all();
    	return view('admin.post.add',['cate'=>$cate],['subcate'=>$subcate]);
    }
    public function postAdd(Request $request){
        $this->validate($request,
            [
                'subcate_id'=>'required',
                'post_title'=>'required|min:3|unique:post,post_title',
                'post_sum'=>'required|min:1|max:3000',
                'post_content'=>'required|min:10'
            ],
            [
                'subcate_id.required'=>'Chuyên mục không được để trống',
                'post_title.required'=>'Tiêu đề không được để trống',
                'post_title.min'=>'Tiêu đề phải có ít nhất 3 kí tự',
                'post_title.unique'=>'Tiêu đề đã tồn tại',
                'post_sum.required'=>'Tóm tắt không được để trống',
                'post_sum.min'=>'Tóm tắt phải có ít nhất 1 kí tự',
                'post_sum.max'=>'Tóm tắt không được vượt quá 3000 kí tự',
                'post_content.required'=>'Nội dung không được để trống',
                'post_content.min'=>'Nội dung phải có ít nhất 10 kí tự'
                /*'post_content.max'=>'Nội dung không được vượt quá 10,000 kí tự'*/
            ]);
        $post = new Post;
        $post->post_title = $request->post_title;
        $post->post_titlekd = changeTitle($request->post_title);
        $post->subcate_id = $request->subcate_id;
        $post->user_id = 1;
        $post->post_sum = $request->post_sum;
        $post->post_view = 0;
        $post->post_content = $request->post_content;
        $post->post_high = $request->post_high;
        if ($request->hasFile('post_img')) {
            $file = $request->file('post_img');
            $name = $file->getClientOriginalName();
            $post_img = str_random(4)."_".$name;
            while (file_exists("upload/post/".$post_img)) {
                $post_img = str_random(4)."_".$name;
            }
            $file->move("upload/post",$post_img);
            $post->post_img = $post_img;
        } else{
            $post->post_img = "";
        }
        /*if ($request->hasFile('post_pic')) {
            $post->post_pic = $request->file(post_pic);
        }   else{
            $post->post_pic = "";
        }*/
        $post->save();
        return redirect('admin/post/list')->with('thongbao','Thêm tin tức thành công');
    }
    
    public function getEdit($id){
        $cate = Cate::all();
        $subcate = Subcate::all();
        $post = Post::find($id);
        return view('admin.post.edit',['post'=>$post,'subcate'=>$subcate,'cate'=>$cate]);
    }

    public function postEdit(Request $request,$id){
        $post = Post::find($id);
        $this->validate($request,
            [
                'subcate_id'=>'required',
                'post_title'=>'required|min:3|unique:post,post_title,'.$id.'',
                'post_sum'=>'required|min:1|max:3000',
                'post_content'=>'required|min:10'
            ],
            [
                'subcate_id.required'=>'Chuyên mục không được để trống',
                'post_title.required'=>'Tiêu đề không được để trống',
                'post_title.min'=>'Tiêu đề phải có ít nhất 3 kí tự',
                'post_title.unique'=>'Tiêu đề đã tồn tại',
                'post_sum.required'=>'Tóm tắt không được để trống',
                'post_sum.min'=>'Tóm tắt phải có ít nhất 1 kí tự',
                'post_sum.max'=>'Tóm tắt không được vượt quá 3000 kí tự',
                'post_content.required'=>'Nội dung không được để trống',
                'post_content.min'=>'Nội dung phải có ít nhất 10 kí tự'
                /*'post_content.max'=>'Nội dung không được vượt quá 10,000 kí tự'*/
            ]);
        $post->post_title = $request->post_title;
        $post->post_titlekd = changeTitle($request->post_title);
        $post->subcate_id = $request->subcate_id;
        $post->user_id = 1;
        $post->post_sum = $request->post_sum;
        /*$post->post_view = 0;*/
        $post->post_content = $request->post_content;
        $post->post_high = $request->post_high;
        if ($request->hasFile('post_img')) {
            $file = $request->file('post_img');
            $name = $file->getClientOriginalName();
            $post_img = str_random(4)."_".$name;
            while (file_exists("upload/post/".$post_img)) {
                $post_img = str_random(4)."_".$name;
            }
            $file->move("upload/post",$post_img);
            //unlink("upload/post/".$post->post_img);
            $post->post_img = $post_img;
        }
        $post->save();
        return redirect('admin/post/list')->with('thongbao','Sửa thành công');
    }

    public function getDel($id){
        $post = Post::find($id);
        $post->delete();
        return redirect('admin/post/list')->with('thongbao','Xóa thành công');
    }
    //
}
