<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index() : View
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(StoreProductRequest $request)
    {
        $newImageName = time() . '-' . $request->name .'.'. $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        Product::create([
            'name'=>$request->input('name'),
            'value'=>$request->input('value'),
            'image_path'=>$newImageName
        ]);

        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.product.show',compact('product'));
    }

    public function edit($id)
    {
        $product=Product::find($id);
        return view('admin.product.edit',compact('product'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        if ($request->image != null){
            $newImageName = time() . '-' . $request->name .'.'. $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            $data[]=$request;

            $image='images/'. $product->image_path;
            if (File::exists($image)){
                File::delete($image);
            }

            $data['image_path']=$newImageName;
            $product->update($data);
        }
        $data=$request->only('name','value');
        $product->update($data);
        return redirect()->route('product.index');
    }

    public function updateStatus($id){
        $product=Product::find($id);
        if ($product->deactive_at != null){
            $product->deactive_at=Carbon::now();
        }else{
            $product->deactive_at=null;
        }
        $product->save();
        return redirect()->route('product.index');
    }

    public function destroy(Product $product)
    {
        $image='images/'. $product->image_path;


        if (File::exists($image)){
            File::delete($image);
        }
        $product->delete();
        return redirect()->route('product.index');
    }
}
