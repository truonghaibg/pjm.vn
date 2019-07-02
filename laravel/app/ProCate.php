<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProCate extends Model
{
    protected $table ='pro_cate';
    public function customer(){
        return $this->belongsTo('App\Customer','customer_id','id');
    }
    public function subcate(){
        return $this->hasMany('App\ProSubcate','cate_id','id');
    }
    public function post(){
        return $this->hasManyThrough('App\Post','App\Subcate','cate_id','subcate_id','id');
    }
    public function product(){
        return $this->hasManyThrough('App\Product','App\Subcate','cate_id','subcate_id','id');
    }
}
