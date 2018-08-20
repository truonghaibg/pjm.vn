<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
	protected $news ='news';
    public function category()
    {
        return $this->belongsTo('App\NewsCategory');
    }

}
