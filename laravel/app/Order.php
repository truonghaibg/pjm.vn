<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table ='order';
  public function transaction(){
  	return $this->belongsTo('App\Transaction','transaction_id','id');
  }
}
