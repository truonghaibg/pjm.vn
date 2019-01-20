<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;
use Validator;

class BannerController extends Controller
{
    const TITLE = 'Banner';

    public function index()
    {
        $banners = Banner::all();
        return view("admin.banner.list", ['items' => $banners, 'title' => self::TITLE]);
    }

    public function create()
    {
        return view("admin.banner.add", ['title' => self::TITLE]);
    }

    public function show($id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect('admin/banner');
        }
        return view("backend.banner.edit", ['item' => $banner, 'title' => self::TITLE]);
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'link' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $banner = new Banner();
            $banner->title = $request->title;
            $slug = getSlug($request->title);
            $banner->description = $request->description;
            $banner->link = $request->link;
            $banner->status = $request->status;
            $banner->location = $request->location;
            $banner->meta_keywords = $request->meta_keywords;
            $banner->meta_description = $request->meta_description;
            $banner->created_at = \Carbon\Carbon::now();
            $banner->updated_at = null;
            $image = handlerFileCreate($request, "upload/banner/", "image", $slug);
            if ($image != null) {
                $banner->image = $image;
            }

            $banner->save();
        }
        return redirect('admin/banner');
    }

    public function edit($id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect('admin/banner');
        }
        return view("admin.banner.edit", ['item' => $banner, 'title' => self::TITLE]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required',
            'link' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $banner = Banner::find($id);
            $banner->title = $request->title;
            $slug = getSlug($request->title);
            $banner->description = $request->description;
            $banner->link = $request->link;
            $banner->status = $request->status;
            $banner->location = $request->location;
            $banner->meta_keywords = $request->meta_keywords;
            $banner->meta_description = $request->meta_description;
            $banner->updated_at = \Carbon\Carbon::now();

            $image = handlerFileUpdate($request, 'upload/banner/', 'image', $slug, $banner->image);
            if ($image != null) {
                $banner->image = $image;
            }
            $banner->save();
            return redirect('admin/banner');
        }
    }

    public function destroy($id)
    {
        $banner = Banner::find($id);
        $image = $banner->image;
        if ($banner->delete()) {
            deleteImage("upload/banner/", $image);
        }
        return redirect('admin/banner');
    }
}
