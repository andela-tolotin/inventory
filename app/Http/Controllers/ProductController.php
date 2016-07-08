<?php

namespace Inventory\Http\Controllers;

use Illuminate\Http\Request;

use Inventory\Http\Requests;
use Inventory\Product;
use Inventory\Category;
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
        $categories = Category::all();

        return view('page.search', compact('products','categories'));
    }

    public function search(SearchRequest $request)
    {
        $products = [];
        $categories = Category::all();

        $products = Product::orderBy('id', 'Desc')
            ->where('category_id', $request->category)
            ->where('name', 'like', '%'.$request->search.'%')
            ->paginate(10);

        if (!is_null($products)) {
            return view('page.search', compact('products', 'categories'));
        }

        return view('page.search', compact('products'));
    }

}
