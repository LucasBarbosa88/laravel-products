<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'id', 'name',
    ];

    public static function createTag($name)
    {
        $tag = new Tag;
        $tag->name  		= $name;

        if($tag->save()){
            return $tag;
        }

        return false;
    }

    public static function updateTag($id, $name)
    {
        $tag = Tag::find($id);
        if($tag){
            $tag->name = $name;
            if($tag->save()){
                return $tag;
            }
        }
        return false;
    }
}
