<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcate;
use App\Cate;

class SubcateController extends Controller
{
    //
    public function getList()
    {
        $subCate = Subcate::all();
        return view('admin.subcate.list', ['subcate' => $subCate]);
    }

    public function getAdd()
    {
        $cate = Cate::all();
        return view('admin.subcate.add', ['cate' => $cate]);
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,
            [
                'title' => 'required|unique:subcate,title|min:3|max:50'
            ]
            ,
            [
                'title.required' => 'Tên chuyên mục không được để trống',
                'title.unique' => 'Tên chuyên mục đã tồn tại',
                'title.min' => 'Tên chuyên mục phải từ 3-50 kí tự',
                'title.max' => 'Tên chuyên mục phải từ 3-50 kí tự',
            ]);

        $subcate = new Subcate;
        $subcate->title = $request->title;
        $subcate->slug = changeTitle($request->slug);
        $subcate->desc = $request->desc;
        $subcate->cate_id = $request->cate_id;
        $subcate->meta_keywords = $request->meta_keywords;
        $subcate->meta_description = $request->meta_description;

        $subcate->save();
        return redirect('admin/subcate/list')->with('thongbao', 'Them thanh cong');
    }

    //Thieu Customer
    public function getEdit($id)
    {
        $cate = Cate::all();
        $subCate = Subcate::find($id);
        return view('admin.subcate.edit', ['subcate' => $subCate], ['cate' => $cate]);
    }

    public function postEdit(Request $request, $id)
    {
        $subcate = Subcate::find($id);
        $this->validate($request,
            [
                'title' => 'required|unique:subcate,title,' . $id . '|min:3|max:50'
            ],
            [
                'title.required' => 'Tên danh mục không được để trống',
                'title.unique' => 'Tên danh mục đã tồn tại',
                'title.min' => 'Tên danh mục phải từ 3-50 kí tự',
                'title.max' => 'Tên danh mục phải từ 3-50 kí tự',
            ]);
        $subcate->title = $request->title;
        $subcate->slug = changeTitle($request->slug);
        $subcate->desc = $request->desc;
        $subcate->cate_id = $request->cate_id;
        $subcate->meta_keywords = $request->meta_keywords;
        $subcate->meta_description = $request->meta_description;

        $subcate->save();
        return redirect('admin/subcate/list')->with('thongbao', 'Sửa thành công');
    }

    public function getDel($id)
    {
        $subCate = Subcate::find($id);
        $subCate->delete();
        return redirect('admin/subcate/list')->with('thongbao', 'Xóa thành công');
    }
    //
}
