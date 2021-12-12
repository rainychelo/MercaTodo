<?php

namespace App\Http\Controllers;

use App\Models\PurchaseDetails;
use App\Http\Requests\StorePurchaseDetailsRequest;
use App\Http\Requests\UpdatePurchaseDetailsRequest;

class PurchaseDetailsController extends Controller
{
    public function index()
    {
        $categories=Category::get();
        return view('admin.category.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(StoreRequest $request)
    {
        Category::create($request->all());
        return redirect()->route('categories.index');
    }

    public function show(Category $category)
    {
        return view('admin.categories.show',compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.show',compact('category'));
    }

    public function update(UpdateRequest $request, Category $category)
    {
        $category->update($request->all());
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
