<?php

namespace App\Http\Controllers;

use App\ProContact;
use Illuminate\Http\Request;

class ProContactController extends Controller
{
    const TITLE = 'Yêu cầu báo giá';
    const PREFIX = "pro-contact";
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
        $items = ProContact::all();
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
            'product_id' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $item = new ProContact();
            $item->product_id = $request->product_id;
            $item->email = $request->email;
            $item->phone = $request->phone;
            $item->content = $request->content_text;
            $item->status = $request->status;
            $item->number = $request->number;
            $currentDate = \Carbon\Carbon::now();
            $item->created_at = $currentDate;
            $item->updated_at = $currentDate;
            $item->save();
            return redirect(self::HOME_LINK)->with("info", "Tạo thành công!");
        }
    }

    public function edit($id)
    {
        $item = ProContact::find($id);
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
            'product_id' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $item = ProContact::find($id);
            $item->product_id = $request->product_id;
            $item->email = $request->email;
            $item->phone = $request->phone;
            $item->content = $request->content_text;
            $item->status = $request->status;
            $item->number = $request->number;
            $currentDate = \Carbon\Carbon::now();
            $item->updated_at = $currentDate;

            $item->save();
            return redirect(self::HOME_LINK)->with("info", "Cập nhật thành công!");
        }
    }

    public function destroy($id)
    {
        $item = ProContact::find($id);
        $item->delete();
        return redirect(self::HOME_LINK)->with("info", "Xóa thành công!");
    }
}
