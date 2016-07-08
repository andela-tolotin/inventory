<?php

namespace Inventory\Http\Controllers;

use Illuminate\Http\Request;

use Inventory\Http\Requests;
use Inventory\Product;
use Inventory\Http\Requests\ProductRequest;

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
}
