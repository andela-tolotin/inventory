<?php

namespace Inventory\Http\Controllers;

use Illuminate\Http\Request;

use Inventory\Http\Requests;
use Inventory\Product;
use Inventory\Http\Requests\ProductRequest;
use Inventory\Http\Requests\SearchRequest;

class ProductController extends Controller
{
    public function addProduct(ProductRequest $request)
    {
        $product = Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category'),
        ]);

        if (!is_null($product)) {
            return redirect('/add-product')->with('status', 'Product Added Successfully');
        }

        return rediect('/add-product')->with('status', 'Product Not Added Successfully');
    }

    public function loadSeachForm()
    {
        $products = [];
         return view('page.search', compact('products'));
    }

    public function search(SearchRequest $request)
    {
        $products = Product::orderBy('id', 'Desc')
        ->where('name', 'like', '%'.$request->search.'%')
        ->orWhere('price', 'like', '%'.$request->search.'%')
        ->paginate(5);

        if (!is_null($products)) {
            return view('page.search', compact('products'));
        }
        return view('page.search', compact('products'));
    }

}
