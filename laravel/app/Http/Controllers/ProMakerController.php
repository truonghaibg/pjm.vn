<?php

namespace App\Http\Controllers;

use App\ProMaker;
use App\ProSubcate;
use Illuminate\Http\Request;
use Validator;

class ProMakerController extends Controller
{
    const TITLE = 'Nhà sản xuất';
    const PREFIX = "pro-maker";
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
        $items = ProMaker::all();
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
        $item = ProSubcate::all();
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
            'subcate_id' => 'required|integer'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $item = new ProMaker();
            $item->title = $request->title;
            $slug = getSlug($request->title);
            $item->slug = $slug;
            $item->subcate_id = $request->subcate_id;
            $currentDate = \Carbon\Carbon::now();
            $item->created_at = $currentDate;
            $item->updated_at = $currentDate;
            $item->save();
            return redirect(self::HOME_LINK)->with("info", "Tạo thành công!");
        }
    }

    public function edit($id)
    {
        $item = ProMaker::find($id);
        if (is_null($item)) {
            return redirect(self::HOME_LINK)->with("info", "Không tồn tại!");
        }
        $proSubcates = ProSubcate::all();
        return view(self::EDIT_VIEW, [
            'items' => $proSubcates,
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
            'subcate_id' => 'required|integer'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $item = ProMaker::find($id);
            $item->title = $request->title;
            $slug = getSlug($request->title);
            $item->slug = $slug;
            $item->subcate_id = $request->subcate_id;
            $currentDate = \Carbon\Carbon::now();
            $item->updated_at = $currentDate;

            $item->save();
            return redirect(self::HOME_LINK)->with("info", "Cập nhật thành công!");
        }
    }

    public function destroy($id)
    {
        $item = ProMaker::find($id);
        $image = $item->image;
        if ($item->delete()) {
            deleteImageWithPath($image);
        }
        return redirect(self::HOME_LINK)->with("info", "Xóa thành công!");
    }
}
