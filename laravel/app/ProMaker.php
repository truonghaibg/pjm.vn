<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use app\ProSubcate;

class ProMaker extends Model
{
    protected $table ='pro_maker';

    public function parent()
    {
        return $this->belongsTo(ProSubcate::class, 'subcate_id');
    }
}
