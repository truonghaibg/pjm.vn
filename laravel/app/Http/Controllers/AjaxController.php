<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Cate;
use App\Subcate;
use App\Nsx;
use App\Post;
use App\Product;
use App\Image;


class AjaxController extends Controller
{
    //
	public function getSubcate($cate_id){
		$subcate = Subcate::where('cate_id',$cate_id)->get();
		foreach ($subcate as $sc) {
			echo "<option value='".$sc->id."'>".$sc->title."</option>";
		}
	}

	public function getNsx($subcate_id){
		$nsx = Nsx::where('subcate_id',$subcate_id)->get();
		foreach ($nsx as $sc) {
			echo "<option value='".$sc->id."'>".$sc->nsx_name."</option>";
		}
	}

	public function removeImage($id){
		$imagesRemove = Image::find($id);
		$imagesRemove->delete();
		echo "OK";
	}
	
	public function ajaxUploadImage(Request $request) {
		if ($_FILES['image']['name']) {
            if (!$_FILES['image']['error']) {
                $name = md5(rand(100, 200));
                $ext = explode('.', $_FILES['image']['name']);
                $filename = $name . '.' . $ext[1];
                $destination = 'upload/images/' . $filename; //change this directory
                $location = $_FILES["image"]["tmp_name"];
                move_uploaded_file($location, $destination);
                echo  "/".$filename;//change this URL
            }
            else
            {
              echo  $message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['file']['error'];
            }
        }
	}
    
}
