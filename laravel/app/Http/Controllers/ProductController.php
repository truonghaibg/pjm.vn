<?php

namespace App\Http\Controllers;
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

    public function index()
    {
        $items = Product::orderBy('id', 'DESC')-get();
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
        $nsx = Nsx::all();
        $subcate = Subcate::all();
        $items = ProductCategory::where('parent_id', null)->get();
        return view(self::CREATE_VIEW, [
            'items' => $items,
            'title' => self::TITLE,
            "back_route" => self::HOME_LINK,
            "store_route" => self::STORE_LINK,
            'nsx'=>$nsx,
            'subcate'=>$subcate
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'subcate_id' => 'required',
                'title' => 'required|min:3|unique:product,title',
            ],
            [
                'subcate_id.required' => 'Chuyên mục không được để trống',
                'title.required' => 'Tên sản phẩm không được để trống',
                'title.min' => 'Tên sản phẩm phải có ít nhất 3 kí tự',
                'title.unique' => 'Tên sản phẩm đã tồn tại'
            ]);

        $product = new Product;
        $product->title = $request->title;
        $product->slug = getSlug($request->title);
        $product->subcate_id = $request->subcate_id;
        if (isset($request->nsx_id)) {
            $product->nsx_id = $request->nsx_id;
        } else {
            $product->nsx_id = "0";
        }
        if(isset($request->is_suggest) && $request->is_suggest ==1){
            $product->is_suggest =1;
        }
        $product->price = $request->price;
        $product->product_info = $request->product_info;
        $product->status = $request->status;
        $product->product_model = $request->product_model;
        $product->product_tag = $request->product_tag;
        $product->product_salevalue = $request->product_salevalue;
        $product->image = "";
        $product->meta_keywords = $request->meta_keywords;
        $product->meta_description = $request->meta_description;

        $rules = [
            'title' => 'required',
            'status' => 'required|integer',
            'code' => 'required',
            'product_category_id' => 'required|integer'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $item = new Product();
            $item->title = $request->title;
            $item->code = $request->code;
            $slug = getSlug($request->title);
            if (is_null($request->slug)) {
                $item->slug = $slug;
            } else {
                $item->slug = $request->slug;
            }
            $item->description = $request->description;
            $item->price = $request->price;
            $item->category_id = $request->product_category_id;
            $item->content = $request->content_text;
            $item->status = $request->status;
            $item->meta_keywords = $request->meta_keywords;
            $item->meta_description = $request->meta_description;
            $currentDate = \Carbon\Carbon::now();
            $item->created_at = $currentDate;
            $item->updated_at = $currentDate;
            $item->created_by = Auth::user()->email;
            $item->updated_by = Auth::user()->email;
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
        $nsx = Nsx::orderBy('subcate_id')->get();
        $subcate = Subcate::orderBy('cate_id')->get();
        $product = Product::find($id);
        $images = $product->images()->orderBy("sort")->get();
        return view('admin.product.edit',['product'=>$product,'subcate'=>$subcate,'nsx'=>$nsx, 'images'=>$images]);

        $item = Product::find($id);
        if (is_null($item)) {
            return redirect(self::HOME_LINK)->with("info", "Không tồn tại!");
        }
        $newsCategories = ProductCategory::where('parent_id', null)->get();
        return view(self::EDIT_VIEW, [
            'items' => $newsCategories,
            "item" => $item,
            "title" => self::TITLE,
            "back_route" => self::HOME_LINK,
            "update_route" => self::UPDATE_LINK
        ]);
    }

    public function update(Request $request, $id)
    {

        $product = Product::find($id);
        $this->validate($request,
            [
                'title'=>'required|min:3',
            ],
            [
                'title.required'=>'Tên sản phẩm không được để trống',
                'title.min'=>'Tên sản phẩm phải có ít nhất 3 kí tự'
            ]);
        $product->title = $request->title;
        $product->slug = getSlug($request->title);
        $product->subcate_id = $request->subcate_id;
        if(isset($request->is_suggest) && $request->is_suggest ==1){
            $product->is_suggest =1;
        } else {
            $product->is_suggest = 0;
        }
        if (isset($request->nsx_id)) {
            $product->nsx_id = $request->nsx_id;
        } else{
            $product->nsx_id ="0";
        }
        $product->price = $request->price;
        $product->product_info = $request->product_info;
        $product->status = $request->status;
        $product->product_model = $request->product_model;
        $product->product_tag = $request->product_tag;
        $product->product_salevalue = $request->product_salevalue;
        $product->meta_keywords = $request->meta_keywords;
        $product->meta_description = $request->meta_description;

        $rules = [
            'title' => 'required',
            'status' => 'required|integer',
            'category_id' => 'required|integer'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $item = Product::find($id);
            $item->title = $request->title;
            $slug = getSlug($request->title);
            if (is_null($request->slug)) {
                $item->slug = $slug;
            } else {
                $item->slug = $request->slug;
            }
            $item->description = $request->description;
            $item->category_id = $request->category_id;
            $item->content = $request->content_text;
            $item->status = $request->status;
            $item->meta_keywords = $request->meta_keywords;
            $item->meta_description = $request->meta_description;
            $currentDate = \Carbon\Carbon::now();
            $item->updated_at = $currentDate;
            $item->updated_by = Auth::user()->email;

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
