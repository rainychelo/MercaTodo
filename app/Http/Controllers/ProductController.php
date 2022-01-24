<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\SearchRequest;
use App\Models\Product;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(SearchRequest $request): View
    {
        $products = Product::where('name', 'LIKE', '%' . $request->input('search') . '%')->paginate(5);
        $currency= config('app.currency');

        //admin.product.index
        return view('admin.product.index', compact('products','currency'));
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(StoreProductRequest $request)
    {
        $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        Product::create([
            'name' => $request->input('name'),
            'value' => $request->input('value'),
            'image_path' => $newImageName,
            'stock'=>$request->input('stock')
        ]);

        return redirect()->route('product.index');
    }

    public function show($id)
    {
        $product = Product::find($id);
        $currency= config('app.currency');
        return view('admin.product.show', compact('product','currency'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.product.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        if ($request->image != null) {
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            $data[] = $request;

            $image = 'images/' . $product->image_path;
            if (File::exists($image)) {
                File::delete($image);
            }

            $data['image_path'] = $newImageName;
            $product->update($data);
        }

        $data = $request->only('name', 'value','stock');
        $product->update($data);
        return redirect()->route('product.index');
    }

    public function destroy(Product $product)
    {
        $image = 'images/' . $product->image_path;


        if (File::exists($image)) {
            File::delete($image);
        }
        $product->delete();
        return redirect()->route('product.index');
    }
}
