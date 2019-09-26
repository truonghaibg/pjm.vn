<?php

namespace App\Http\Controllers;

use App\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class NewsCategoryController extends Controller
{

    const TITLE = 'Danh mục tin tức';
    const PREFIX = "news-category";
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
        $items = NewsCategory::all();
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
            'items'=> $newsCategories,
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
            $item = new NewsCategory();
            $title = $request->title;
            $item->title = $title;
            $slug = getSlug($title);
            $item->slug = $slug;
            $item->description = $request->description;
            $parentId = $request->parent_id;
            if (is_int($parentId)) {
                $item->parent_id = $parentId;
            }
            $item->status = $request->status;
            $item->meta_keywords = $request->meta_keywords;
            $item->meta_description = $request->meta_description;
            $currentDate = \Carbon\Carbon::now();
            $item->created_at = $currentDate;
            $item->updated_at = $currentDate;
            $item->created_by = Auth::user()->email;
            $item->updated_by = Auth::user()->email;

            $image = handlerFileCreate($request, self::IMAGE_PATH, "image", $slug);
            if ($image != null) {
                $item->image = $image;
            }

            $item->save();
            return redirect(self::HOME_LINK)->with("info", "Tạo thành công!");
        }
    }

    public function edit($id)
    {
        $item = NewsCategory::find($id);
        if (is_null($item)) {
            return redirect(self::HOME_LINK)->with("info", "Không tồn tại!");
        }
        $newsCategories = NewsCategory::all()->except($id);
        return view(self::EDIT_VIEW, [
            "item" => $item,
            'items' => $newsCategories,
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
            $item = NewsCategory::find($id);
            $title = $request->title;
            $item->title = $title;
            $slug = getSlug($title);
            $item->description = $request->description;
            $parentId = $request->parent_id;
            if (is_int($parentId)) {
                $item->parent_id = $parentId;
            }
            $item->status = $request->status;
            $item->meta_keywords = $request->meta_keywords;
            $item->meta_description = $request->meta_description;
            $currentDate = \Carbon\Carbon::now();
            $item->updated_at = $currentDate;
            $item->updated_by = Auth::user()->email;

            $image = handlerFileUpdate($request, self::IMAGE_PATH, "image", $slug, $item->image);
            if ($image != null) {
                $item->image = $image;
            }

            $item->save();
            return redirect(self::HOME_LINK)->with("info", "Cập nhật thành công!");
        }
    }

    public function destroy($id)
    {
        $item = NewsCategory::find($id);
        $image = $item->image;
        if ($item->delete()) {
            deleteImageWithPath($image);
        }
        return redirect(self::HOME_LINK)->with("info", "Xóa thành công!");
    }
}
