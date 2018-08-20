<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
	protected $table ='transaction';
  public function order(){
  	return $this->hasMany('App\Order','transaction_id','id');
  }
}
