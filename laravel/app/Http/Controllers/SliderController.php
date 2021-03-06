<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Validator;
use App\Utils;

class SliderController extends Controller
{
    const TITLE = 'Slider';
    const PREFIX = "slider";
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
        $items = Slider::all();
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
            'order'=>'integer',
            'status' => 'integer'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $item = new Slider();
            $item->title = $request->title;
            $item->description = $request->description;
            $slug = getSlug($request->title);
            $item->link = $request->link;
            $item->order = $request->order;
            $item->status = $request->status;
            $item->meta_keywords = $request->meta_keywords;
            $item->meta_description = $request->meta_description;
            $image = handlerFileCreate($request, self::IMAGE_PATH, "image", $slug);
            if ($image != null) {
                $item->image = $image;
            }
            $item->save();
        }
        return redirect(self::HOME_LINK)->with("info", "Tạo thành công!");
    }

    public function edit($id)
    {
        $item = Slider::find($id);
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
            'order'=>'integer',
            'status' => 'integer'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $item = Slider::find($id);
            $item->title = $request->title;
            $item->description = $request->description;
            $slug = getSlug($request->title);
            $item->link = $request->link;
            $item->order = $request->order;
            $item->status = $request->status;
            $item->meta_keywords = $request->meta_keywords;
            $item->meta_description = $request->meta_description;
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
        $item = Slider::find($id);
        $image = $item->image;
        if ($item->delete()) {
            deleteImageWithPath($image);
        }
        return redirect(self::HOME_LINK)->with("info", "Xóa thành công!");
    }
}
