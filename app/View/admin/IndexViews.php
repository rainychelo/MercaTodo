<?php

namespace App\View\admin;

class IndexViews
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }
}
