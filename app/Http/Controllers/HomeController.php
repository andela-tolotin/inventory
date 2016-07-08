<?php

namespace Inventory\Http\Controllers;

use Illuminate\Http\Request;
use Inventory\Http\Requests;
use Inventory\Category;

class HomeController extends Controller
{
    public function loadAddProductForm()
    {
        $categories = Category::all();
        return view('page.add_product', compact('categories'));
    }
}
