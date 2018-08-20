<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
	protected $table ='cate';
    //
    public function customer(){
    	return $this->belongsTo('App\Customer','customer_id','id');
    }
    public function subcate(){
    	return $this->hasMany('App\Subcate','cate_id','id');
    }
    public function post(){
    	return $this->hasManyThrough('App\Post','App\Subcate','cate_id','subcate_id','id');
    }
    public function product(){
        return $this->hasManyThrough('App\Product','App\Subcate','cate_id','subcate_id','id');
    }
}
