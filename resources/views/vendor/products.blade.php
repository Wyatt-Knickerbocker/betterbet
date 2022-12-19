<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-5 bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="justify-start col-span-3 p-6 text-gray-100">
                    {{ __("Your listed products:") }}
                </div>
                <div class="justify-end justify-self-end col-span-2 p-6 text-gray-100">
                    <a href="{{ url('/add-product') }}">
                        <x-primary-button class="ml-3">
                            {{ __('Add another product') }}
                        </x-primary-button>
                    </a>
                </div>
                @forelse($prod as $product)
                <div>
                    <button type="button" class="focus:outline-none openModal rounded-md hover:shadow-lg" onclick="openModal('{{ $product->ian }}')">
                        <img src="{{ URL::to($product->image_path) }}" width="250" style="border-radius: 10%">
                    </button>
                </div>

                @include('partial.productmodal')

                <div class="self-center col-span-2 p-6 text-gray-100">
                    {{ $product->brand . ', ' . DB::table('productcategory')->where('id',$product->productcategory_id)->pluck('name')[0] }}
                </div>
                <div class="self-center p-6 text-gray-100">
                    {{ __("$ ") . DB::table('productoffered')->where('product_ian',$product->ian)->where('seller_id',Auth::User()->id)->pluck('cost')[0]}}
                </div>

                <div class="self-center p-6 text-gray-100">
                    <form method="POST" action="{{ route('product-remove') }}">
                    @csrf
                        <input type='hidden' name='ian' value= "{{ $product->ian }}"/>
                        <x-primary-button class="ml-3">
                            {{ __('Remove Product') }}
                        </x-primary-button>
                    </form>
                </div>
                @empty
                <div class="self-center col-span-2 p-6 text-gray-100">
                    {{  __("No products listed.") }}
                </div>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>