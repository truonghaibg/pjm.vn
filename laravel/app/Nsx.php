<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nsx extends Model
{
	protected $table ='nsx';
    //
    public function subcate(){
    	return $this->belongsTo('App\Subcate','subcate_id','id');
    }

}
