<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id', 'name',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public static function createProduct($name, $tags)
    {
        $product = new Product;
        $product->name  		= $name;

        if($product->save()){
            foreach($tags as $productTags) {
                $tag = new ProductTag;
                $tag->tag_id = $productTags;
                $tag->product_id = $product->id;
                $tag->save();
            }
            return $product;
        }

        return false;
    }

    public static function updateProduct($id, $name, $tags)
    {
        $product = Product::find($id);
        if($product){
            $product->name = $name;
            if($product->save()){
                foreach($tags as $productTags) {
                    $productTag = ProductTag::find($productTags->id);
                    $productTag->tag_id = $productTags;
                    $productTag->product_id = $product->id;
                    $productTag->save();
                }
                return $product;
            }
        }
        return false;
    }
}
