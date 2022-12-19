<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Add Product') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">

            <form method="post" action="{{ route('product-confirm') }}" class="mt-6 space-y-6">
                @csrf
            <div class="grid grid-rows-3 grid-cols-1 gap-4 bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="box-border p-4 ">
                        <x-input-label for="cost" :value="__('Cost')" />
                        <x-text-input id="cost" name="cost" type="text" class="mt-1 block w-full" :value="old('cost', '')" required autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>
            
                    <div class="box-border p-4" >
                        <x-input-label for="ship_cost" :value="__('Shipping cost (estimated)')" />
                        <x-text-input id="ship_cost" name="ship_cost" type="text" class="mt-1 block w-full" :value="old('ship_cost', '')" required autofocus/>
                        <x-input-error class="mt-2" :messages="$errors->get('ship_cost')" />
                    </div>
                    
                    <div class="box-border p-4" >
                        <x-input-label for="ship_time" :value="__('Shipping time (in business days, est.)')" />
                        <x-text-input id="ship_time" name="ship_time" type="text" class="mt-1 block w-full" :value="old('ship_time', '')" required autofocus/>
                        <x-input-error class="mt-2" :messages="$errors->get('ship_time')" />
                    </div>

                    <input type='hidden' name='ian' value= "{{ $prod }}"/>
                    <div class="box-border p-4 justify-self-end" >
                        <x-primary-button class="mr-32">
                            {{ __('Add product') }}
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>