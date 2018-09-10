<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Tags;
use App\TagsBelong;
use App\NewsCategory;

class NewsCategoryController extends Controller
{

    public function index()
    {
        $news_cate = NewsCategory::all();
        return view('admin.news-category.list',['items'=>$news_cate]);
    }

    public function create()
    {
        return view('admin.news-category.add');
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name'=>'required',
                'slug'=>'required|unique:news_categories'
            ],
            [
                'name.required'=>'Tên danh mục không được để trống',
                'slug.required'=>'Slug không được để trống',
                'slug.unique'=>'Slug không được trùng nhau'
            ]);

        $newsCategory = new NewsCategory;
        $newsCategory->name = $request->name;
        $newsCategory->slug = changeTitle($request->slug);
        $newsCategory->meta_keywords = $request->meta_keywords;
        $newsCategory->meta_description = $request->meta_description;
        $newsCategory->save();
        return redirect('admin/news-category/list')->with('thongbao','Thêm danh mục thành công');
    }

     public function show($id)
    {
        $newsCategory = NewsCategory::find($id);
        return view('admin.news-category.edit',['item'=>$newsCategory]);
    }

     public function update(Request $request, $id)
    {
        $newsCategory = NewsCategory::find($id);
        $this->validate($request,
            [
                'name'=>'required',
                'slug'=>'required'
            ],
            [
                'name.required'=>'Tên danh mục không được để trống',
                'slug.required'=>'Slug không được để trống'
            ]);
        $newsCategory->name = $request->name;
        $newsCategory->slug = changeTitle($request->slug);
        $newsCategory->meta_keywords = $request->meta_keywords;
        $newsCategory->meta_description = $request->meta_description;
        $newsCategory->save();
        return redirect('admin/news-category/list')->with('thongbao','Sửa thành công');
    }

    public function destroy($id)
    {
        $newsCategory = newsCategory::find($id);
        $newsCategory->delete();
        return redirect('admin/news-category/list')->with('thongbao','Xóa thành công');
    }
}
