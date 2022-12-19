<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('New Product') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="content-center grid grid-cols-2 bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="justify-start p-6 text-gray-100">
                    {{ __("Create a new product") }}
                </div>
                <div class="justify-end justify-self-end p-6 text-gray-100">
                    <a href="{{ route('products') }}">
                        <x-primary-button class="ml-3">
                            {{ __('Leave without changes') }}
                        </x-primary-button>
                    </a>
                </div>
                <form method="POST" enctype="multipart/form-data" action="{{ route('product-specify') }}">
                    @csrf
                    <div class="col-span-2 p-6 text-gray-100">
                        <x-input-label for="ian" :value="__('IAN#')" />
                        <x-text-input id="ian" class="text-gray-800 block mt-1 w-full" type="text" name="ian" required/>
                    </div>
                    <div class="col-span-2 p-6 text-gray-100">
                        <x-input-label for="name" :value="__('Product name')" />
                        <x-text-input id="name" class="text-gray-800 block mt-1 w-full" type="text" name="name" required/>
                    </div>
                    <div class="col-span-2 p-6 text-gray-100">
                        <x-input-label for="img" :value="__('Product image')" />
                        <x-text-input id="img" class="text-gray-800 block mt-1 w-full" type="file" name="img" accept=".jpg,.xlsx" required/>
                    </div>
                    <div class="col-span-2 p-6 text-gray-100">
                        <label for="cat">Product category:</label>
                        <select name="cat" id="cat"  class="text-gray-900" required>
                        <option value="1">Television</option>
                        <option value="2">Modem</option>
                    </div>
                    </select>
                    <div class="col-span-2 justify-items-stretch p-6 text-gray-100">
                        <x-primary-button class="ml-24">
                            {{ __('Continue') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>