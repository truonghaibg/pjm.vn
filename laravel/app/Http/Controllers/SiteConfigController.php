<?php

namespace App\Http\Controllers;

use App\SiteConfig;
use Illuminate\Http\Request;
use Validator;

class SiteConfigController extends Controller
{
    const TITLE = 'Cấu hình site';
    const PREFIX = "site-config";
    const IMAGE_PATH = "upload/".self::PREFIX."/";

    const HOME_LINK = "admin/".self::PREFIX;
    const UPDATE_LINK = "admin/".self::PREFIX."/update";

    const EDIT_VIEW = "admin.".self::PREFIX.".edit";

    public function index()
    {
        $item = SiteConfig::all()->first();
        if ($item == null) {
            return redirect(self::HOME_LINK)->with("info", "Không tồn tại!");
        }
        return view(self::EDIT_VIEW, [
            "item" => $item,
            "title" => self::TITLE,
            'update_route' => self::UPDATE_LINK
        ]);
    }

    public function getEdit()
    {
        $item = SiteConfig::all()->first();
        if ($item == null) {
            return redirect('admin/site-config');
        }
        return view(self::EDIT_VIEW, [
            "item" => $item,
            "title" => self::TITLE,
            'update_route' => self::UPDATE_LINK
        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $siteConfig = SiteConfig::find($id);
            $siteConfig->title = $request->title;
            $siteConfig->slogan = $request->slogan;
            $siteConfig->link = $request->link;
            $siteConfig->desc_short = $request->desc_short;
            $siteConfig->desc_long = $request->desc_long;
            $siteConfig->address = $request->address;
            $siteConfig->footer = $request->footer;
            $siteConfig->google_seo = $request->google_seo;
            $siteConfig->google_map = $request->google_map;
            $siteConfig->mobile = $request->mobile;
            $siteConfig->email = $request->email;
            $siteConfig->facebook = $request->facebook;
            $siteConfig->facebook_box = $request->facebook_box;
            $siteConfig->twitter = $request->twitter;
            $siteConfig->meta_keywords = $request->meta_keywords;
            $siteConfig->meta_description = $request->meta_description;

            $logo = handlerFileUpdate($request, self::IMAGE_PATH, "logo", "logo", $siteConfig->logo);

            if ($logo != null) {
                $siteConfig->logo = $logo;
            }

            $favicon = handlerFileUpdate($request, self::IMAGE_PATH, "favicon", "favicon", $siteConfig->favicon);
            if ($favicon != null) {
                $siteConfig->favicon = $favicon;
            }

            $default_image = handlerFileUpdate($request, self::IMAGE_PATH, "image_default", "image_default", $siteConfig->image_default);
            if ($default_image != null) {
                $siteConfig->image_default = $default_image;
            }

            $siteConfig->updated_at = \Carbon\Carbon::now();
            $siteConfig->save();
            return redirect(self::HOME_LINK)->with("info", "Cập nhật thành công!");
        }
    }
}
