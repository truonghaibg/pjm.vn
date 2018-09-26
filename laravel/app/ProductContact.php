<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductContact extends Model
{
	//protected $news ='product_contact';
	protected $table = 'product_contact';
	public function product(){
    	return $this->belongsTo('App\Product','product_id','id');
    }

}
