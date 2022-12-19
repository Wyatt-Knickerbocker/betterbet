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
                        <button class="ml-3">
                            {{ __('Leave without changes') }}
                        </button>
                    </a>
                </div>
                <form method="POST" action="{{ route('product-finish') }}">
                    @csrf
                    <input type='hidden' name='ian' value= "{{ __( $prod->ian ) }}"/>
                    @foreach($specnum as $spec) 
                            @if($spec->productcategory_id == $prod->productcategory_id)
                            <input type='hidden' name='specnum[]' value= "{{ __($spec->specification_id ) }}"/>
                            <div class="col-span-2 p-6 text-gray-100">
                                <x-input-label for="specval" :value="(__($specname[$spec->specification_id - 1]))" />
                                <x-text-input id="specval" class="text-gray-800 block mt-1 w-full" type="text" name="specval[]" required/>
                            </div>
                            @endif
                            @endforeach
                    <div class="col-span-2 justify-items-stretch p-6 text-gray-100">
                        <x-primary-button class="ml-24">
                            {{ __('Continue') }}
                        </x-primary-button>
                    </div>
                </form>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>