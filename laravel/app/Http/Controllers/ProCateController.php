<?php

namespace App\Http\Controllers;

use App\ProCate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class ProCateController extends Controller
{
    const TITLE = 'Danh mục sản phẩm';
    const PREFIX = "pro-cate";
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
        $items = ProCate::all();
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
            'status' => 'required|integer',
            'order' => 'required|integer'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $item = new ProCate();
            $item->title = $request->title;
            if (empty($request->slug)) {
                $slug = getSlug($request->title);
                $item->slug = $slug;
            } else {
                $slug = $request->slug;
                $item->slug = $slug;
            }
            $item->description = $request->description;
            $item->status = $request->status;
            $item->order = $request->order;
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
        $item = ProCate::find($id);
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
            'status' => 'required|integer',
            'order' => 'required|integer'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $item = ProCate::find($id);
            $item->title = $request->title;
            $slug = getSlug($request->title);
            $item->slug = $slug;
            $item->description = $request->description;
            $item->status = $request->status;
            $item->order = $request->order;
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
        $item = ProCate::find($id);
        $image = $item->image;
        if ($item->delete()) {
            deleteImageWithPath($image);
        }
        return redirect(self::HOME_LINK)->with("info", "Xóa thành công!");
    }
}
