<x-app-layout>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="text-3xl text-center font-bold">PRODUCTS</h1>

                @can('admin.index')
                    <form action="{{route('product.create')}}">
                        <button class="bg-yellow-500 text-white px-3 py-1 rounded-sm mx-2">
                            <i class="fas fa-trash"></i>Create new product
                        </button>
                    </form>
                @endcan

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

                @can('admin.index')
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-2">

                        <table class="table-fixed w-full ">
                            <thead>
                            <tr class="bg-indigo-500 text-white">
                                <th class="w-20 py-4 ...">ID</th>
                                <th class="w-1/8 py-4 ...">Name</th>
                                <th class="w-1/16 py-4 ...">Stock</th>
                                <th class="w-1/16 py-4 ...">value</th>
                                <th class="w-1/16 py-4 ...">Deactive at</th>
                                <th class="w-1/16 py-4 ...">Image</th>
                                <th class="w-1/4 py-4 ...">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)

                                <tr>
                                    <td class="py-3 px-6">{{$product->id}}</td>
                                    <td class="p-3 text-center">{{$product->name}}</td>
                                    <td class="p-3 text-center">{{$product->stock}}</td>
                                    <td class="p-3 text-center">{{$product->value}} {{$currency}}</td>
                                    <td class="p-3 text-center">{{$product->deactive_at}}</td>
                                    <td class="p-3 text-center">
                                        <img src="{{asset('images/'.$product->image_path)}}" alt="">
                                    </td>
                                    <td class="p-3 flex justify-center">

                                        <form action="{{route('product.show', $product->id)}}" method="POST">
                                            @csrf
                                            @method('get')
                                            <button class="bg-green-500 text-white px-3 py-1 rounded-sm">
                                                <i class="fas fa-eye-slash"></i>Show details
                                            </button>
                                        </form>

                                        @can('admin.index')
                                            <form action="{{route('product.edit',$product->id)}}" method="POST">
                                                @csrf
                                                @method('get')
                                                <button class="bg-yellow-600 text-white px-3 py-1 rounded-sm mx-1">
                                                    <i class="fas fa-trash"></i>Edit
                                                </button>
                                            </form>

                                            <button class="bg-blue-500 text-white px-3 py-1 rounded-sm mx-1">
                                                <i class="fas fa-trash"></i>Change status
                                            </button>


                                            <form action="{{route('product.destroy',$product)}}" method="POST">
                                                @csrf
                                                @method('delete')
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
                        <div>
                            {!! $products->links() !!}
                        </div>
                    </div>
                @endcan

                @can('product.index')
                    <div class="bg-white min-h-screen py-32 px-10">
                        <div
                            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 md:gap-x-10 xl-grid-cols-4 gap-y-10 gap-x-6  ">
                            @foreach ($products as $product)
                                <div
                                    class="container mx-auto shadow-lg rounded-lg max-w-md hover:shadow-2xl transition duration-300  flex flex-row items-center bg-gray-100">
                                    <img class="px-2" src="{{asset('images/'.$product->image_path)}}" width="50%" alt=""
                                         class="rounded-t-lg bg-gray-100">
                                    <div class="p-6">
                                        <h1 class="md:text-1xl text-xl hover:text-indigo-600 transition duration-200  font-bold text-gray-900 ">{{$product->name}}</h1>
                                        <p class="text-gray-700 my-2 hover-text-900 ">{{$product->value}} {{$currency}}</p>
                                        <form action="{{route('product.show', $product->id)}}" method="POST">
                                            @csrf
                                            @method('get')
                                            <button
                                                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                                {{trans('Add to cart')}}
                                            </button>
                                        </form>
                                    </div>

                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div>
                        {!! $products->links() !!}
                    </div>
                @endcan
            </div>
        </div>
    </div>
</x-app-layout>
