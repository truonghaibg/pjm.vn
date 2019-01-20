<?php

namespace App\Http\Controllers;

use App\News;
use App\NewsCategory;
use Illuminate\Http\Request;
use Validator;

class NewsController extends Controller
{
    const TITLE = 'Tin tức';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return view('admin.news.list', ['items' => $news, 'title' => self::TITLE]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newsCategories = NewsCategory::all();
        return view('admin.news.add', ['items' => $newsCategories, 'title' => self::TITLE]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'status' => 'required|integer',
            'news_category_id' => 'required|integer'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $news = new News();
            $news->title = $request->title;
            $slug = getSlug($request->title);
            $news->slug = $slug;
            $news->description = $request->description;
            $news->news_category_id = $request->news_category_id;
            $news->content = $request->content_text;
            $news->status = $request->status;
            $news->meta_keywords = $request->meta_keywords;
            $news->meta_description = $request->meta_description;
            $news->created_at = \Carbon\Carbon::now();
            $news->updated_at = null;
            $news->created_by = Controller::SYSTEM_USER;
            $image = handlerFileCreate($request, "upload/news/", "image", $slug);
            if ($image != null) {
                $news->image = $image;
            }

            $file = handlerFileCreate($request, "upload/news/", "file", $slug);
            if ($file != null) {
                $news->logo = $file;
            }

            $news->save();
            return $this->index();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        $newsCategories = NewsCategory::all();
        return view('admin.news.edit', ['item' => $news, 'items' => $newsCategories, 'title' => self::TITLE]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required',
            'status' => 'required|integer',
            'news_category_id' => 'required|integer'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $news = News::find($id);
            $news->title = $request->title;
            $slug = getSlug($request->title);
            $news->slug = $slug;
            $news->news_category_id = $request->news_category_id;
            $news->description = $request->description;
            $news->content = $request->content_text;
            $news->status = $request->status;
            $news->meta_keywords = $request->meta_keywords;
            $news->meta_description = $request->meta_description;
            $news->updated_at = \Carbon\Carbon::now();
            $news->updated_by = Controller::SYSTEM_USER;

            $image = handlerFileUpdate($request, "upload/news/", "image", $slug, $news->logo);
            if ($image != null) {
                $news->image = $image;
            }

            $file = handlerFileUpdate($request, "upload/news/", "file", $slug, $news->file);
            if ($file != null) {
                $news->file = $file;
            }

            $news->save();
            return $this->index();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        $image = $news->image;
        $file = $news->file;
        if ($news->delete()) {
            deleteImage("upload/news/", $image);
            deleteImage("upload/news/", $file);
        }
        return redirect('admin/news');
    }
}
