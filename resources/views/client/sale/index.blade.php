<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="text-3xl text-center font-bold">Your orders</h1>

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-2">

                    <table class="table-fixed w-full ">
                        <thead>
                        <tr class="bg-indigo-500 text-white">
                            <th class="w-40 py-4 ...">Reference</th>
                            <th class="w-1/16 py-4 ...">Value</th>
                            <th class="w-1/16 py-4 ...">Description</th>
                            <th class="w-1/16 py-4 ...">Status</th>
                            <th class="w-1/4 py-4 ...">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sales as $product)

                            <tr>
                                <td class="py-3 px-6">{{$product->reference}}</td>
                                <td class="p-3 text-center">{{$product->value}} {{$currency}}</td>
                                <td class="p-3 text-center">{{$product->description}}</td>
                                <td class="p-3 text-center">{{$product->status}}</td>
                                <td class="p-3 flex justify-center">

                                    <form action="{{route('product.show', $product->id)}}" method="POST">
                                        @csrf
                                        @method('get')
                                        <button class="bg-green-500 text-white px-3 py-1 rounded-sm">
                                            <i class="fas fa-eye-slash"></i>Show details
                                        </button>
                                    </form>

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