<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table ='products';
    //
    public function nsx(){
    	return $this->belongsTo('App\ProMaker','nsx_id','id');
    }
    public function subcate(){
    	return $this->belongsTo('App\ProSubcate','subcate_id','id');
    }
}