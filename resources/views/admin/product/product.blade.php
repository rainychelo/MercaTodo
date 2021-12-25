<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
            <label class="text-2xl">Products</label>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('product') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <div>
                <x-label for="value" :value="__('Value')" />

                <x-input id="value" class="block mt-1 w-full" type="number" name="value" :value="old('value')" required autofocus />
            </div>

            <div>
                <x-label for="category" :value="__('Category')" />

                <x-input id="category" class="block mt-1 w-full" type="text" name="category" :value="old('category')" required autofocus />
            </div>

            <div>
                <x-label for="image" :value="__('Image')" />
                <input type="file" name="image">
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Create') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
