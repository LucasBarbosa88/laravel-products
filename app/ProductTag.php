<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    protected $fillable = [
        'product_id', 'tag_id',
    ];

    public function tag(){
        return $this->hasMany('App\Tag', 'tag_id', 'id');
    }

    public function product(){
        return $this->hasMany('App\Product', 'product_id', 'id');
    }
}
