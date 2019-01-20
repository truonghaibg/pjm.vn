<?php

namespace App\Http\Controllers;

use App\SiteConfig;
use Illuminate\Http\Request;
use Validator;

class SiteConfigController extends Controller
{
    const TITLE = 'Cấu hình site';

    public function index()
    {
        $siteConfigs = SiteConfig::all();
        return view("admin.site_config.list", ['items' => $siteConfigs, 'title' => self::TITLE]);
    }

    public function create()
    {
        return view("admin.site_config.add", ['title' => self::TITLE]);
    }

    public function show($id)
    {
        $siteConfig = SiteConfig::find($id);
        if ($siteConfig == null) {
            return redirect('admin/site-config');
        }
        return view("backend.site_config.edit", ['item' => $siteConfig, 'title' => self::TITLE]);
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'status' => 'required|integer'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $siteConfig = new SiteConfig();
            $siteConfig->title = $request->title;
            $siteConfig->link = $request->link;
            $siteConfig->slug = getSlug($request->title);
            $siteConfig->description = $request->description;
            $siteConfig->content = $request->content_text;
            $siteConfig->status = $request->status;
            $siteConfig->meta_keywords = $request->meta_keywords;
            $siteConfig->meta_description = $request->meta_description;
            $siteConfig->created_at = \Carbon\Carbon::now();
            $siteConfig->updated_at = null;
            $siteConfig->created_by = Controller::SYSTEM_USER;
            $siteConfig->save();
        }
        return redirect('admin/site-config/edit/1');
    }

    public function edit($id)
    {
        $siteConfig = SiteConfig::find($id);
        if ($siteConfig == null) {
            return redirect('admin/site-config');
        }
        return view("admin.site_config.edit", ['item' => $siteConfig, 'title' => self::TITLE]);
    }

    public function getEdit()
    {
        $siteConfig = SiteConfig::all()->first();
        if ($siteConfig == null) {
            return redirect('admin/site-config');
        }
        return view("admin.site_config.edit", ['item' => $siteConfig, 'title' => self::TITLE]);
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
            $siteConfig->description = $request->description;
            $siteConfig->address = $request->address;
            $siteConfig->contact = $request->contact;
            $siteConfig->footer = $request->footer;
            $siteConfig->google_seo = $request->google_seo;
            $siteConfig->google_map = $request->google_map;
            $siteConfig->mobile = $request->mobile;
            $siteConfig->email = $request->email;
            $siteConfig->facebook = $request->facebook;
            $siteConfig->fb_page = $request->fb_page;
            $siteConfig->twitter = $request->twitter;
            $siteConfig->meta_keywords = $request->meta_keywords;
            $siteConfig->meta_description = $request->meta_description;

            $logo = handlerFileUpdate($request, "upload/site/", "logo", "logo", $siteConfig->logo);
			
            if ($logo != null) {
                $siteConfig->logo = $logo;
            }

            $favicon = handlerFileUpdate($request, "upload/site/", "favicon", "favicon", $siteConfig->favicon);
            if ($favicon != null) {
                $siteConfig->favicon = $favicon;
            }

            $default_image = handlerFileUpdate($request, "upload/site/", "default_image", "default_image", $siteConfig->default_image);
            if ($default_image != null) {
                $siteConfig->default_image = $default_image;
            }


            $siteConfig->updated_at = \Carbon\Carbon::now();
            $siteConfig->save();
            return redirect('admin/site-config/edit');
        }
    }

    public function destroy($id)
    {
        $siteConfig = SiteConfig::find($id);
        $siteConfig->delete();
        return redirect('admin/site-config');
    }
}
