<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use App\Post;

class PostController extends Controller
{
    const TITLE = 'Bài viết cố định';
    const PREFIX = "post";
    const IMAGE_PATH = "upload/".self::PREFIX."/";

    const HOME_LINK = "admin/".self::PREFIX;
    const EDIT_LINK = "admin/".self::PREFIX."/edit";
    const UPDATE_LINK = "admin/".self::PREFIX."/update";
    const CREATE_LINK = "admin/".self::PREFIX."/create";
    const STORE_LINK = "admin/".self::PREFIX."/store";
    const DELETE_LINK = "admin/".self::PREFIX."/delete";

    const LIST_VIEW = "admin.".self::PREFIX.".list";
    const CREATE_VIEW = "admin.".self::PREFIX.".create";
    const EDIT_VIEW = "admin.".self::PREFIX.".edit";

    public function index()
    {
        $items = Post::all();
        return view(self::LIST_VIEW, [
            "items" => $items,
            "title" => self::TITLE,
            'create_route' => self::CREATE_LINK,
            'edit_route' => self::EDIT_LINK,
            'delete_route' => self::DELETE_LINK
        ]);
    }

    public function create()
    {
        return view(self::CREATE_VIEW, [
            'title' => self::TITLE,
            "back_route" => self::HOME_LINK,
            "store_route" => self::STORE_LINK
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|max:100',
            'status' => 'required|integer'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $post = new Post();
            $post->title = $request->title;
            $slug = getSlug($request->title);
            $post->slug = $slug;
            $post->description = $request->description;
            $post->content = $request->content_text;
            $post->meta_keywords = $request->meta_keywords;
            $post->meta_description = $request->meta_description;
            $post->status = $request->status;
            $post->created_at = \Carbon\Carbon::now();

            $image = handlerFileCreate($request, self::IMAGE_PATH, "image", $slug);
            if ($image != null) {
                $post->image = $image;
            }
            $post->save();
            return redirect(self::HOME_LINK)->with("info", "Tạo thành công!");
        }
    }

    public function edit($id)
    {
        $item = Post::find($id);
        if (is_null($item)) {
            return redirect(self::HOME_LINK)->with("info", "Không tồn tại!");
        }
        return view(self::EDIT_VIEW, [
            "item" => $item,
            "title" => self::TITLE,
            "back_route" => self::HOME_LINK,
            "update_route" => self::UPDATE_LINK
        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required|max:100',
            'status' => 'required|integer'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $post = Post::find($id);
            $post->title = $request->title;

            $post->description = $request->description;
            $post->content = $request->content_text;
            $post->meta_keywords = $request->meta_keywords;
            $post->meta_description = $request->meta_description;
            $post->status = $request->status;
            $post->updated_at = \Carbon\Carbon::now();
            $image = handlerFileUpdate($request, self::IMAGE_PATH, "image", $slug, $post->image);
            echo $image;
            if ($image != null) {
                $post->image = $image;
            }
            $post->save();
            return redirect(self::HOME_LINK)->with("info", "Cập nhật thành công!");
        }
    }

    public function destroy($id)
    {
        $item = Post::find($id);
        $image = $item->image;
        if ($item->delete()) {
            deleteImageWithPath($image);
        }
        return redirect(self::HOME_LINK)->with("info", "Xóa thành công!");
    }

}
