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

                <form action="{{route('product.create')}}">
                    <button class="bg-yellow-500 text-white px-3 py-1 rounded-sm mx-1">
                        <i class="fas fa-trash"></i>Create new product
                    </button>
                </form>

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-2">

                    <table class="table-fixed w-full ">
                        <thead>
                        <tr class="bg-indigo-500 text-white">
                            <th class="w-20 py-4 ...">ID</th>
                            <th class="w-1/8 py-4 ...">Name</th>
                            <th class="w-1/16 py-4 ...">value</th>
                            <th class="w-1/16 py-4 ...">Status</th>
                            <th class="w-1/16 py-4 ...">Image</th>
                            <th class="w-1/4 py-4 ...">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $row)

                            <tr>
                                <td class="py-3 px-6">{{$row->id}}</td>
                                <td class="p-3 text-center">{{$row->name}}</td>
                                <td class="p-3 text-center">{{$row->value}}</td>
                                <td class="p-3 text-center">{{$row->status}}</td>
                                <td class="p-3 text-center">
                                    <img src="{{asset('images/'.$row->image_path)}}" alt="">
                                </td>
                                <td class="p-3 flex justify-center">

                                    <form action="{{route('product.destroy',$row->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="bg-red-500 text-white px-3 py-1 rounded-sm mx-1">
                                            <i class="fas fa-trash"></i>Delete
                                        </button>
                                    </form>
                                    <form action="{{route('product.update',$row->id)}}" method="POST">
                                        @csrf
                                        @method('put')
                                        <button class="bg-green-500 text-white px-3 py-1 rounded-sm">
                                            <i class="fas fa-eye-slash"></i>Change status
                                        </button>
                                    </form>
                                    <form action="{{route('product.edit',$row->id)}}" method="POST">
                                        @csrf
                                        @method('get')
                                        <button class="bg-yellow-600 text-white px-3 py-1 rounded-sm mx-1">
                                            <i class="fas fa-trash"></i>Edit
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
