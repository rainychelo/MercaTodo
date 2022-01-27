<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="text-3xl text-center font-bold">Shopping cart</h1>

                <form method="POST" action="{{route('sale.store')}}">
                    @csrf
                    <button class="bg-yellow-500 text-white px-3 py-1 rounded-sm mx-2">
                        <i class="fas fa-trash"></i>Buy
                    </button>
                </form>

                <div class="py-2">
                    <form method="GET" action="{{ route('product.index')}}">
                        @csrf
                        <tr>
                            <td><input id="search" name="search" type="text"
                                       class="border-2 border-black-300 rounded mx-2"
                                       placeholder="Search by name"></td>
                            <td>
                                <x-button class="bg-blue-400 text-white px-3 py-1 rounded-sm mx-1">
                                    {{ __('Search') }}
                                </x-button>
                            </td>
                        </tr>
                    </form>
                </div>

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-2">

                    <table class="table-fixed w-full ">
                        <thead>
                        <tr class="bg-indigo-500 text-white">
                            <th class="w-40 py-4 ...">Name</th>
                            <th class="w-1/16 py-4 ...">Value</th>
                            <th class="w-1/16 py-4 ...">Amount</th>
                            <th class="w-1/16 py-4 ...">Image</th>
                            <th class="w-1/4 py-4 ...">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($shoppingCar as $product)

                            <tr>
                                <td class="py-3 px-6">{{$product->product->name}}</td>
                                <td class="p-3 text-center">{{$product->product->value}} {{$currency}}</td>
                                <td class="p-3 text-center">{{$product->amount}}</td>
                                <td class="p-3 text-center">
                                    <img src="{{asset('images/'.$product->product->image_path)}}" alt="">
                                </td>
                                <td class="p-3 flex justify-center">

                                    <form action="{{route('product.show', $product->product->id)}}" method="POST">
                                        @csrf
                                        @method('get')
                                        <button class="bg-green-500 text-white px-3 py-1 rounded-sm">
                                            <i class="fas fa-eye-slash"></i>Show details
                                        </button>
                                    </form>

                                    @can('admin.index')
                                        <form action="{{route('product.edit',$product->product->id)}}" method="POST">
                                            @csrf
                                            @method('get')
                                            <button class="bg-yellow-600 text-white px-3 py-1 rounded-sm mx-1">
                                                <i class="fas fa-trash"></i>Edit
                                            </button>
                                        </form>

                                        <form action="{{route('shoppingCarItem.destroy',$product)}}" method="POST">
                                            @csrf
                                            <button class="bg-red-500 text-white px-3 py-1 rounded-sm mx-1">
                                                <i class="fas fa-trash"></i>Delete
                                            </button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
