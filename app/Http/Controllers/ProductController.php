<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('admin.product.product', compact('products'));
    }

    public function create()
    {
        $categories = Category::get();
        $images = Image::get();
        return view('admin.product.product', compact('categories', 'images'));
    }

    public function store(StoreProductRequest $request)
    {
        $newImageName = time() . '-' . $request->name . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);



        Product::create([
            'name'=>$request->input('name'),
            'value'=>$request->input('value'),
            'category'=>$request->input('category'),
            'image_path'=>$newImageName
        ]);
        return redirect()->route('products.index');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::get();
        $images = Image::get();
        return view('admin.products.show', compact('product', 'categories', 'images'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
