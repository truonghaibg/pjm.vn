<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
	protected $news ='news_categories';
    //

    public function news() {
        return $this->hasMany('App\News', 'category_id');
    }

}
