<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcate extends Model
{
	protected $table ='subcate';
    //
    public function cate(){
    	return $this->belongsTo('App\ProCate','cate_id','id');
    }
    public function post(){
    	return $this->hasMany('App\Post','subcate_id','id');
    }
    public function nsx(){
    	return $this->hasMany('App\ProMaker','subcate_id','id');
    }
    public function product(){
        return $this->hasMany('App\Product','subcate_id','id');
    }
}
