<?php

namespace App\Http\Controllers;

use App\Image;
use App\Product;
use App\News;
use App\NewsCategory;
use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class MigrateController extends Controller
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

    public function migrateProduct() {
        $pathImg = 'upload/product/';
        $products = Product::get();
        foreach ($products as $item) {
            $id = $item->id;
            $images = Image::where('product_id', $id)->orderBy('sort', 'DESC')->get();
            for($i = 0 ; $i< count($images); $i ++) {
                if ($i == 0) {
                    $item->image = $pathImg . $images[$i]->name;
                } else if ($i == 1) {
                    $item->image01 = $pathImg . $images[$i]->name;
                } else if ($i == 2) {
                    $item->image02 = $pathImg . $images[$i]->name;
                } else if ($i == 3) {
                    $item->image03 = $pathImg . $images[$i]->name;
                } else if ($i == 4) {
                    $item->image04 = $pathImg . $images[$i]->name;
                }
            }
            $item->save();

        }
//        DB::table()->save
//        Product::saved($products);
    }
    public function pathImage1() {
        $newss = News::all();
        foreach ($newss as $item) {
            if (!is_null($item->image)) {
                $item->image = $this->setPathImage($item->image);
            }
            $item->save();
        }
    }

    public function pathImage() {
        $products = Product::all();
        foreach ($products as $item) {
            if (!is_null($item->image)) {
                $item->image = $this->setPathImage($item->image);
            }

            if (!is_null($item->image01)) {
                $item->image01 = $this->setPathImage($item->image01);
            }

            if (!is_null($item->image02)) {
                $item->image02 = $this->setPathImage($item->image02);
            }

            if (!is_null($item->image03)) {
                $item->image03 = $this->setPathImage($item->image03);
            }

            if (!is_null($item->image04)) {
                $item->image04 = $this->setPathImage($item->image04);
            }
            $item->save();
        }
    }

    public function setPathImage($image) {
        if (!is_null($image)) {
            $file = 'upload/news/'.$image;
            return $file;
        }
    }

}
