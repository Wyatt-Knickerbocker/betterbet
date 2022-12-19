<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-5 bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="justify-start col-span-2 p-6 text-gray-100">
                    {{ __('Browse Products') }}
                </div>
                    <div class="col-span-3 justify-end justify-self-end p-6 text-gray-100"></div>
                @forelse($cart as $product)
                <div>
                    <button type="button" class="focus:outline-none openModal rounded-md hover:shadow-lg" onclick="openModal('{{ $product->ian }}')">
                        <img src="{{ URL::to($product->image_path) }}" width="200" style="border-radius: 10%">
                    </button>
                </div>

                @include('partial.productmodal')

                <div class="self-center p-6 text-gray-100">
                    {{ __("IAN# ") . $product->ian }}
                </div>
                <div class="self-center col-span-2 p-6 text-gray-100">
                    {{ $product->brand . ', ' . DB::table('productcategory')->where('id',$product->productcategory_id)->pluck('name')[0] }}
                </div>
                <div class="self-center p-6 text-gray-100">
                    <form method="POST" action="{{ route('remove-from-cart') }}">
                    @csrf
                        <input type='hidden' name='ian' value= "{{ $product->ian }}"/>
                        <x-primary-button class="ml-3">
                            {{ __('Remove from cart') }}
                        </x-primary-button>
                    </form>
                </div>
                @empty
                <div class="col-span-5 justify-center justify-self-center p-6 text-gray-100">
                        {{ __('Nothing in cart.') }}
                </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>