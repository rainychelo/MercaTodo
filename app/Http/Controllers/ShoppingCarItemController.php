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

    public function index()
    {

    }

    public function create()
    {

    }

    public function store(StoreItemShoppingCarRequest $request, ShoppingCar $shoppingCar, Product $product): RedirectResponse
    {
        $shoppingCarItem = auth()->user()->shoppingCarActive()->shoppingCarItems;
        $itemSelected =
        $amountTotal = 0;
        foreach ($shoppingCarItem as $item) {
            if ($item->product_id == $product->id) {
                $itemSelected = $item;
                $amountTotal = ($item->amount) + ($request->input('amount'));
            }
        }
        if ($amountTotal <= $product->stock and $amountTotal != 0) {
            $data = (['amount' => $amountTotal]);
            $itemSelected->update($data);
            return redirect()->route('shoppingCar.index');
        } elseif ($amountTotal > $product->stock) {
            return redirect()->route('shoppingCar.index');
        }
        if ($request->input('amount') <= $product->stock) {

            $shoppingCar->shoppingCarItems()->create([
                'product_id' => $product->getKey(),
                'amount' => $request->input('amount')
            ]);

            return redirect()->route('product.index');

        } else {

            return redirect()->route('product.show', compact('product'));
        }

    }

    public function show(ShoppingCarItem $itemShoppingCar)
    {
        //
    }

    public function edit(ShoppingCarItem $itemShoppingCar)
    {
        //
    }

    public function update(UpdateItemShoppingCarRequest $request,Product $product)
    {
        $shoppingCarItem = auth()->user()->shoppingCarActive()->shoppingCarItems;
        $itemSelected =
        $amount=$request->input('amount');
        foreach ($shoppingCarItem as $item)
        {
            if ($item->product_id == $product->id) {
                $itemSelected = $item;
            }
        }


        if ($amount > $product->stock){
            return redirect()->route('shoppingCar.index');
        }else{
            $data=(['amount'=>$amount]);
            $itemSelected->update($data);
            return redirect()->route('shoppingCar.index');
        }
    }

    public function destroy($id)
    {
        $itemShoppingCar = ShoppingCarItem::find($id);
        $itemShoppingCar->delete();
        return redirect()->route('shoppingCar.index');
    }
}
