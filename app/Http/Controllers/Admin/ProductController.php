<?php

namespace App\Http\Controllers\Admin;

use App\Exports\Products;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductTag;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('needsRole:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Products';
        $products = Product::paginate(10);
        $tags = Tag::all();
        foreach($products as $product) {
            $product['tags'] = ProductTag::where('product_id', $product->id)->join('tags', 'product_tags.tag_id', '=', 'tags.id')->select(['tags.name', 'tags.id'])->get();
        }

        return view('admin/products.index', compact('title', 'product', 'tags', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:products',
            'tags' => 'required|'
        ];

        if($request->validate($rules)){
            $product = Product::createProduct($request->name, $request->tags);
            if($product){
                return redirect()->back()->with('success', 'Product created with success!');
            } else {
                return redirect()->back()->with('danger', 'Not possible create this Product! Try again.');
            }
        }
        
        return redirect()->back()->with('danger', 'Not possible create this Product! Try again.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = [ 
            'name' => 'required|unique:products',
            'tags' => 'required'
        ];

        if($request->validate($rules)){
            $product = Product::updateProduct($request->id, $request->name, $request->tags);

            if($product) {
                return redirect()->back()->with('success', 'Product updated with success!');
            } else {
                return redirect()->back()->with('danger', 'Not possible update this Product! Try again.');
            }
        }
        return redirect()->back()->with('danger', 'Not possible update this Product! Try again.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function delete($product_id)
    {
        $product = Product::find($product_id);
        if ($product) {
            $product->delete();
            return redirect()->back()->with('success', 'Product deleted with success!');
        }
        return redirect()->back()->with('danger', 'Product not found, try again!');
    }

    public function exportProductsTable(Request $request)
    {

        return \Excel::download(new Products,'products'.time().'.xlsx');
    }
}
