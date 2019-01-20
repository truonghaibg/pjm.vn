<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
use Validator;

class VideoController extends Controller
{
    const TITLE = 'Video';

    public function index()
    {
        $videos = Video::all();
        return view("admin.video.list", ['items' => $videos, 'title' => self::TITLE]);
    }

    public function create()
    {
        return view("admin.video.add", ['title' => self::TITLE]);
    }

    public function show($id)
    {
        $video = Video::find($id);
        if ($video == null) {
            return $this->index();
        }
        return view("backend.video.edit", ['item' => $video, 'title' => self::TITLE]);
    }

    public function store(Request $request)
    {
        $rules = [
            'link'=>'required'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $video = new Video();
            $video->title = $request->title;
            $video->link = $request->link;
            $video->status = $request->status;
            $video->created_at = \Carbon\Carbon::now();
            $video->save();
            return redirect('admin/video');
        }
    }

    public function edit($id)
    {
        $video = Video::find($id);
        if ($video == null) {
            return $this->index();
        }
        return view("admin.video.edit", ['item' => $video, 'title' => self::TITLE]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'link'=>'required'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $video = Video::find($id);
            $video->title = $request->title;
            $video->link = $request->link;
            $video->status = $request->status;
            $video->updated_at = \Carbon\Carbon::now();

            $video->save();
            return redirect('admin/video');
        }
    }

    public function destroy($id)
    {
        $video = Video::find($id);
        $video->delete();
        return redirect('admin/video');
    }
}
