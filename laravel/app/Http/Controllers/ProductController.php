<?php

namespace App\Http\Controllers;
use App\ProMaker;
use App\ProSubcate;
use Illuminate\Http\Request;
use App\Subcate;
use App\Nsx;
use App\Product;
use App\Image;
use Illuminate\Support\Facades\Auth;
use Validator;

class ProductController extends Controller
{
    const TITLE = 'Sản phẩm';
    const PREFIX = "product";
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

    public function feature()
    {
        $items = Product::where('is_suggest', 1)->orderBy('id', 'DESC')->get();
        return view(self::LIST_VIEW, [
            "items" => $items,
            "title" => self::TITLE,
            'create_route' => self::CREATE_LINK,
            'edit_route' => self::EDIT_LINK,
            'delete_route' => self::DELETE_LINK
        ]);
    }

    public function latest()
    {
        $items = Product::where('is_new', 1)->orderBy('id', 'DESC')->get();
        return view(self::LIST_VIEW, [
            "items" => $items,
            "title" => self::TITLE,
            'create_route' => self::CREATE_LINK,
            'edit_route' => self::EDIT_LINK,
            'delete_route' => self::DELETE_LINK
        ]);
    }

    public function sale()
    {
        $items = Product::where('is_sale', 1)->orderBy('id', 'DESC')->get();
        return view(self::LIST_VIEW, [
            "items" => $items,
            "title" => self::TITLE,
            'create_route' => self::CREATE_LINK,
            'edit_route' => self::EDIT_LINK,
            'delete_route' => self::DELETE_LINK
        ]);
    }

    public function index()
    {
        $items = Product::orderBy('id', 'DESC')->get();
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
        $proMakers = ProMaker::all();
        $proSubcates = ProSubcate::all();
        return view(self::CREATE_VIEW, [
            'title' => self::TITLE,
            "back_route" => self::HOME_LINK,
            "store_route" => self::STORE_LINK,
            'proMakers'=>$proMakers,
            'proSubcates'=>$proSubcates
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'subcate_id' => 'required',
            'title' => 'required',
            'image' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $item = new Product();
            $item->title = $request->title;
            $slug = getSlug($request->title);
            $item->slug = $slug;
            $item->subcate_id = $request->subcate_id;
            $item->nsx_id = $request->maker_id;
            $item->price = $request->price;
            $item->is_suggest = $request->is_suggest;
            $item->is_sale = $request->is_sale;
            $item->is_new = $request->is_new;
            $item->product_model = $request->product_model;
            $item->product_tag = $request->product_tag;
            $item->product_salevalue = $request->product_salevalue;
            $item->desc_short = $request->desc_short;
            $item->desc_long = $request->desc_long;
            $item->status = $request->status;
            $item->meta_keywords = $request->meta_keywords;
            $item->meta_description = $request->meta_description;
            $currentDate = \Carbon\Carbon::now();
            $item->created_at = $currentDate;
            $item->updated_at = $currentDate;

            $image = handlerFileCreate($request, self::IMAGE_PATH, "image", $slug);
            if ($image != null) {
                $item->image = $image;
            }
            $image01 = handlerFileCreate($request, self::IMAGE_PATH, "image01", $slug);
            if ($image01 != null) {
                $item->image01 = $image01;
            }

            $image02 = handlerFileCreate($request, self::IMAGE_PATH, "image02", $slug);
            if ($image02 != null) {
                $item->image02 = $image02;
            }

            $image03 = handlerFileCreate($request, self::IMAGE_PATH, "image03", $slug);
            if ($image03 != null) {
                $item->image03 = $image03;
            }

            $image04 = handlerFileCreate($request, self::IMAGE_PATH, "image04", $slug);
            if ($image04 != null) {
                $item->image04 = $image04;
            }
            $item->save();
            return redirect(self::HOME_LINK)->with("info", "Tạo thành công!");
        }
    }

    public function edit($id)
    {

        $item = Product::find($id);
        if (is_null($item)) {
            return redirect(self::HOME_LINK)->with("info", "Không tồn tại!");
        }
        $proMakers = ProMaker::orderBy('subcate_id')->get();
        $proSubcates = ProSubcate::orderBy('cate_id')->get();
        return view(self::EDIT_VIEW, [
            "item" => $item,
            'proMakers' => $proMakers,
            "proSubcates" => $proSubcates,
            "title" => self::TITLE,
            "back_route" => self::HOME_LINK,
            "update_route" => self::UPDATE_LINK
        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'subcate_id' => 'required',
            'title' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $item = Product::find($id);
            $item->title = $request->title;
            $slug = getSlug($request->title);
            $item->slug = $slug;
            $item->subcate_id = $request->subcate_id;
            $item->nsx_id = $request->maker_id;
            $item->price = $request->price;
            $item->is_suggest = $request->is_suggest;
            $item->is_sale = $request->is_sale;
            $item->is_new = $request->is_new;
            $item->product_model = $request->product_model;
            $item->product_tag = $request->product_tag;
            $item->product_salevalue = $request->product_salevalue;
            $item->desc_short = $request->desc_short;
            $item->desc_long = $request->desc_long;
            $item->status = $request->status;
            $item->meta_keywords = $request->meta_keywords;
            $item->meta_description = $request->meta_description;
            $currentDate = \Carbon\Carbon::now();
            $item->updated_at = $currentDate;

            $image = handlerFileUpdate($request, self::IMAGE_PATH, "image", $slug, $item->image);
            if ($image != null) {
                $item->image = $image;
            }

            $image01 = handlerFileUpdate($request, self::IMAGE_PATH, "image01", $slug, $item->image01);
            if ($image01 != null) {
                $item->image01 = $image01;
            }

            $image02 = handlerFileUpdate($request, self::IMAGE_PATH, "image02", $slug, $item->image02);
            if ($image02 != null) {
                $item->image02 = $image02;
            }

            $image03 = handlerFileUpdate($request, self::IMAGE_PATH, "image03", $slug, $item->image03);
            if ($image03 != null) {
                $item->image03 = $image03;
            }

            $image04 = handlerFileUpdate($request, self::IMAGE_PATH, "image04", $slug, $item->image04);
            if ($image04 != null) {
                $item->image04 = $image04;
            }
            $item->save();
            return redirect(self::HOME_LINK)->with("info", "Cập nhật thành công!");
        }
    }

    public function destroy($id)
    {
        $item = Product::find($id);
        $image = $item->image;
        $image01 = $item->image01;
        $image02 = $item->image02;
        $image03 = $item->image03;
        $image04 = $item->image04;
        if ($item->delete()) {
            deleteImageWithPath($image);
            deleteImageWithPath($image01);
            deleteImageWithPath($image02);
            deleteImageWithPath($image03);
            deleteImageWithPath($image04);
        }
        return redirect(self::HOME_LINK)->with("info", "Xóa thành công!");
    }
}
