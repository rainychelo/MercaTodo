<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="text-3xl text-center font-bold">{{$product->name}}</h1>
                <div class="place-content-stretch">
                    <div class="px-6">
                        <img src="{{asset('images/'.$product->image_path)}}" width="200px" height="150px" alt="">
                    </div>
                    <div>
                        <STRONG class="text-3xl text-center font-bold">Value</STRONG>
                    </div>
                    <div >
                        <strong>{{$product->value}} {{$currency}}</strong>
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
