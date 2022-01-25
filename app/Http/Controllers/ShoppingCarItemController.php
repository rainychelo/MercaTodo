<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ShoppingCar;
use App\Models\ShoppingCarItem;
use App\Http\Requests\StoreItemShoppingCarRequest;
use App\Http\Requests\UpdateItemShoppingCarRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use phpDocumentor\Reflection\Types\Integer;

class ShoppingCarItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    public function store(StoreItemShoppingCarRequest $request,ShoppingCar $shoppingCar,Product $product): RedirectResponse
    {
        $shoppingCar->shoppingCarItems()->create([
            'product_id'=>$product->getKey(),
            'amount'=>$request->input('amount')
        ]);

        return redirect()->route('product.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShoppingCarItem  $itemShoppingCar
     * @return Response
     */
    public function show(ShoppingCarItem $itemShoppingCar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShoppingCarItem  $itemShoppingCar
     * @return Response
     */
    public function edit(ShoppingCarItem $itemShoppingCar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemShoppingCarRequest  $request
     * @param  \App\Models\ShoppingCarItem  $itemShoppingCar
     * @return Response
     */
    public function update(UpdateItemShoppingCarRequest $request, ShoppingCarItem $itemShoppingCar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShoppingCarItem  $itemShoppingCar
     * @return Response
     */
    public function destroy(ShoppingCarItem $itemShoppingCar)
    {
        //
    }
}
