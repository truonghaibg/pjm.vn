<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProContactController extends Controller
{
    const TITLE = 'Tin tức';
    const PREFIX = "news";
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
        $items = News::all();
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
        $newsCategories = NewsCategory::all();
        return view(self::CREATE_VIEW, [
            'items' => $newsCategories,
            'title' => self::TITLE,
            "back_route" => self::HOME_LINK,
            "store_route" => self::STORE_LINK
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'status' => 'required|integer',
            'category_id' => 'required|integer'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $news = new News();
            $news->title = $request->title;
            $slug = getSlug($request->title);
            if (is_null($request->slug)) {
                $news->slug = $slug;
            } else {
                $news->slug = $request->slug;
            }
            $news->desc_short = $request->description;
            $news->category_id = $request->category_id;
            $news->desc_long = $request->content_text;
            $news->status = $request->status;
            $news->meta_keywords = $request->meta_keywords;
            $news->meta_description = $request->meta_description;
            $currentDate = \Carbon\Carbon::now();
            $news->created_at = $currentDate;
            $news->updated_at = $currentDate;
            $news->created_by = Auth::user()->email;
            $news->updated_by = Auth::user()->email;
            $image = handlerFileCreate($request, self::IMAGE_PATH, "image", $slug);
            if ($image != null) {
                $news->image = $image;
            }
            $news->save();
            return redirect(self::HOME_LINK)->with("info", "Tạo thành công!");
        }
    }

    public function edit($id)
    {
        $item = News::find($id);
        if (is_null($item)) {
            return redirect(self::HOME_LINK)->with("info", "Không tồn tại!");
        }
        $newsCategories = NewsCategory::all();
        return view(self::EDIT_VIEW, [
            'items' => $newsCategories,
            "item" => $item,
            "title" => self::TITLE,
            "back_route" => self::HOME_LINK,
            "update_route" => self::UPDATE_LINK
        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required',
            'status' => 'required|integer',
            'category_id' => 'required|integer'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $news = News::find($id);
            $news->title = $request->title;
            $slug = getSlug($request->title);
            if (is_null($request->slug)) {
                $news->slug = $slug;
            } else {
                $news->slug = $request->slug;
            }
            $news->desc_short = $request->description;
            $news->category_id = $request->category_id;
            $news->desc_long = $request->content_text;
            $news->status = $request->status;
            $news->meta_keywords = $request->meta_keywords;
            $news->meta_description = $request->meta_description;
            $currentDate = \Carbon\Carbon::now();
            $news->updated_at = $currentDate;
            $news->updated_by = Auth::user()->email;

            $image = handlerFileUpdate($request, self::IMAGE_PATH, "image", $slug, $news->logo);
            if ($image != null) {
                $news->image = $image;
            }
            $news->save();
            return redirect(self::HOME_LINK)->with("info", "Cập nhật thành công!");
        }
    }

    public function destroy($id)
    {
        $item = News::find($id);
        $image = $item->image;
        if ($item->delete()) {
            deleteImageWithPath($image);
        }
        return redirect(self::HOME_LINK)->with("info", "Xóa thành công!");
    }
}
