<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCar;
use App\Http\Requests\StoreShoppingCarRequest;
use App\Http\Requests\UpdateShoppingCarRequest;

class ShoppingCarController extends Controller
{
    public function index()
    {
        $shoppingCar=auth()->user()->shoppingCarActive()->shoppingCarItems;
        $currency=config('app.currency');
        return view('client.cart.index',compact('shoppingCar','currency'));

    }

    public function create()
    {
        //
    }

    public function store(StoreShoppingCarRequest $request)
    {
        //
    }

    public function show(ShoppingCar $shoppingCar)
    {
        //
    }

    public function edit(ShoppingCar $shoppingCar)
    {
        //
    }

    public function update(UpdateShoppingCarRequest $request, ShoppingCar $shoppingCar)
    {
        //
    }

    public function destroy(ShoppingCar $shoppingCar)
    {
        //
    }
}
