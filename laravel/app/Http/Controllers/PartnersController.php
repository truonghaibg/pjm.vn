<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Partners;
use Illuminate\Support\Facades\Auth;
use Validator;


class PartnersController extends Controller
{
    const TITLE = 'Đối tác';
    const PREFIX = "partner";
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
        $items = Partners::all();
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
            'link' => 'required|max:100',
            'image' => 'required|max:100',
            'status' => 'integer'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $item = new Partners();
            $item->title = $request->title;
            $slug = getSlug($request->title);
            $item->link = $request->link;
            $item->description = $request->description;
            $item->address = $request->address;
            $item->mobile = $request->mobile;
            $item->status = $request->status;
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
        $item = Partners::find($id);
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
            'link' => 'required|max:100',
            'image' => 'max:100',
            'status' => 'integer'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $partner = Partners::find($id);
            $partner->title = $request->title;
            $slug = getSlug($request->title);
            $partner->link = $request->link;
            $partner->description = $request->description;
            $partner->address = $request->address;
            $partner->mobile = $request->mobile;
            $partner->status = $request->status;
            $currentDate = \Carbon\Carbon::now();
            $partner->updated_at = $currentDate;
            $partner->updated_by = Auth::user()->email;
            $image = handlerFileUpdate($request, self::IMAGE_PATH, "image", $slug, $partner->image);
            if ($image != null) {
                $partner->image = $image;
            }
            $partner->save();
            return redirect(self::HOME_LINK)->with("info", "Cập nhật thành công!");
        }
    }

    public function destroy($id)
    {
        $item = Partners::find($id);
        $image = $item->image;
        if ($item->delete()) {
            deleteImageWithPath($image);
        }
        return redirect(self::HOME_LINK)->with("info", "Xóa thành công!");
    }
}
