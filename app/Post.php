<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $table ='post';
    //
    public function subcate(){
    	return $this->belongsTo('App\Subcate','subcate_id','id');
    }
    public function comment(){
    	return $this->hasMany('App\Comment','post_id','id');
    }
}