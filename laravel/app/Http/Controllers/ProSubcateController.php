<?php

namespace App\Http\Controllers;

use App\ProCate;
use App\ProSubcate;
use Illuminate\Http\Request;
use Validator;

class ProSubcateController extends Controller
{
    const TITLE = 'Chuyên mục';
    const PREFIX = "pro-subcate";
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
        $items = ProSubcate::all();
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
        $item = ProCate::all();
        return view(self::CREATE_VIEW, [
            'items' => $item,
            'title' => self::TITLE,
            "back_route" => self::HOME_LINK,
            "store_route" => self::STORE_LINK
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'cate_id' => 'required|integer'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $item = new ProSubcate();
            $item->title = $request->title;
            $slug = getSlug($request->title);
            $item->slug = $slug;
            $item->desc = $request->desc;
            $item->cate_id = $request->cate_id;
            $item->meta_keywords = $request->meta_keywords;
            $item->meta_description = $request->meta_description;
            $currentDate = \Carbon\Carbon::now();
            $item->created_at = $currentDate;
            $item->updated_at = $currentDate;
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
        $item = ProSubcate::find($id);
        if (is_null($item)) {
            return redirect(self::HOME_LINK)->with("info", "Không tồn tại!");
        }
        $proCates = ProCate::all();
        return view(self::EDIT_VIEW, [
            'items' => $proCates,
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
            'cate_id' => 'required|integer'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $item = ProSubcate::find($id);
            $item->title = $request->title;
            $slug = getSlug($request->title);
            if (is_null($request->slug)) {
                $item->slug = $slug;
            } else {
                $item->slug = $request->slug;
            }
            $item->desc = $request->desc;
            $item->cate_id = $request->cate_id;
            $item->meta_keywords = $request->meta_keywords;
            $item->meta_description = $request->meta_description;
            $currentDate = \Carbon\Carbon::now();
            $item->updated_at = $currentDate;
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
        $item = ProSubcate::find($id);
        $item->delete();
        return redirect(self::HOME_LINK)->with("info", "Xóa thành công!");
    }
}
