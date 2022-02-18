<?php

namespace App\Exports;

use App\Product;
use App\ProductTag;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Products implements FromView
{
    protected $name;
    protected $tags;

    public function __construct(
        $name = null,
        $tags = null
    )
    {
        $this->name = $name;
        $this->tags = $tags;
    }

    public function view(): View
    {
        $data = array();
        $reports = [];
        $products = Product::paginate(10);

        foreach($products as $product) {
            $product['tags'] = ProductTag::where('product_id', $product->id)->join('tags', 'product_tags.tag_id', '=', 'tags.id')->select(['tags.name', 'tags.id'])->get();
        }
        if($products->count() > 0){
            $names = [];
            foreach($products as $product){
                if($product['tags']) {
                    foreach($product['tags'] as $tag){
                        $names[] = $tag->name;
                    }
                }
                $reports[] = [
                    'ID' => $product->id,
                    'NAME' => $product->name,
                    'TAGS' => json_encode($names),
                ];

            }

            array_reverse($reports);
            $data = array_reverse($reports);
        }

        return view('admin/products.export', compact('data'));
    }
}
