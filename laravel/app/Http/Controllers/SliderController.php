<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Validator;

class SliderController extends Controller
{
    const TITLE = 'Slider';

    public function index()
    {
        $slider = Slider::all();
        return view("admin.slider.list", ['items' => $slider, 'title' => self::TITLE]);
    }

    public function create()
    {
        return view("admin.slider.add", ['title' => self::TITLE]);
    }

    public function show($id)
    {
        $slider = Slider::find($id);
        if ($slider == null) {
            return redirect('admin/slider');
        }
        return view("backend.slider.edit", ['item' => $slider, 'title' => self::TITLE]);
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
            $slider = new Slider();
            $slider->title = $request->title;
            $slider->description = $request->description;
            $slug = getSlug($request->title);
            $slider->link = $request->link;
            $slider->sort = $request->sort;
            $slider->status = $request->status;
            $slider->meta_keywords = $request->meta_keywords;
            $slider->meta_description = $request->meta_description;
            $slider->created_at = \Carbon\Carbon::now();
            $image = handlerFileCreate($request, "upload/slider/", "image", $slug);
            if ($image != null) {
                $slider->image = $image;
            }
            $slider->save();
            return redirect('admin/slider');
        }
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        if ($slider == null) {
            return redirect('admin/slider');
        }
        return view("admin.slider.edit", ['item' => $slider, 'title' => self::TITLE]);
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
            $slider = Slider::find($id);
            $slider->title = $request->title;
            $slider->description = $request->description;
            $slug = getSlug($request->title);
            $slider->link = $request->link;
            $slider->sort = $request->sort;
            $slider->status = $request->status;
            $slider->meta_keywords = $request->meta_keywords;
            $slider->meta_description = $request->meta_description;
            $slider->created_at = \Carbon\Carbon::now();
            $image = handlerFileUpdate($request, "upload/slider/", "image", $slug, $slider->image);
            if ($image != null) {
                $slider->image = $image;
            }

            $slider->save();
            return redirect('admin/slider');
        }
    }

    public function destroy($id)
    {
        $slider = Slider::find($id);
        $image = $slider->logo;
        if ($slider->delete()) {
            deleteImage("upload/slider/", $image);
        }
        return redirect('admin/slider');
    }
}
