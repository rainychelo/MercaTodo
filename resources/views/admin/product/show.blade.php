<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin') }}
        </h2>
    </x-slot>

    <div class="py-12 flex">
        <div class=" mx-auto ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="text-3xl text-center font-bold">{{$product->name}}</h1>
                <div class="place-content-stretch">
                    <div class="flex-auto">
                        <img src="{{asset('images/'.$product->image_path)}}" width="200px" height="200px" alt="">
                    </div>
                    <div>
                        <STRONG class="text-3xl text-center font-bold px-2">Value</STRONG>
                    </div>
                    <div class="px-2">
                        <strong>{{$product->value}} {{$currency}}</strong>
                    </div>
                    <div class="px-2">
                        <strong>{{$product->stock}} Units available</strong>
                    </div>
                    <div>
                        <form method="POST" action="{{ route('shoppingCars.items.store',['product'=>$product,'shoppingCar'=>$shoppingCar]) }}">
                            @csrf
                            <tr>
                                <td>
                                    <input id="search" name="amount" type="number" min="1"
                                           class="border-2 border-black-300 rounded mx-2"
                                           placeholder="Amount"></td>
                                </td>
                                <td>
                                    <x-button class="ml-4 mx-2 bg-red-500">
                                        {{ __('Add to cart') }}
                                    </x-button>
                                </td>
                            </tr>

                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>

</x-app-layout>
