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
            foreach($products as $product){
                $reports[] = [
                    'ID' => $product->id,
                    'NAME' => $product->name,
                    'TAGS' => $product['tags'],
                ];

            }

            array_reverse($reports);
            $data = array_reverse($reports);
        }

        return view('admin/products.export', compact('data'));
    }
}
