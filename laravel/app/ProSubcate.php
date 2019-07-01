<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use app\ProCate;

class ProSubcate extends Model
{
    protected $table ='pro_subcate';

    public function parent()
    {
        return $this->belongsTo(ProCate::class, 'cate_id');
    }
}
