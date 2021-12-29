<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\Category\StoreCategorytRequest;
use App\Http\Requests\Category\UpdateCategorytRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.category');
    }

    public function store(StoreCategorytRequest $request)
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

    public function update(UpdateCategorytRequest $request, Category $category)
    {
        $category->update($request->all());
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $category=Category::find($id);
        $category->delete();
        return redirect()->route('admin.category.index');
    }
}
