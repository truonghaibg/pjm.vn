<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProSubcate extends Model
{
    protected $table ='pro_subcate';

    public function parent()
    {
        return $this->belongsTo(ProCate::class, 'cate_id');
    }
    public function cate(){
        return $this->belongsTo('App\ProCate','cate_id','id');
    }
    public function nsx(){
        return $this->hasMany('App\ProMaker','subcate_id','id');
    }
    public function product(){
        return $this->hasMany('App\Product','subcate_id','id');
    }
}
