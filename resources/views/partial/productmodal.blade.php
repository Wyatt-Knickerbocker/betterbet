<!-- Modal Start -->
<div class="fixed z-10 inset-0 invisible overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="{{ $product->ian }}">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">          
        <div class="fixed inset-0 bg-gray-900 bg-opacity-80 transition-opacity" onclick="closeModal('{{ $product->ian }}')" aria-hidden="true"></div>            
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true"></span>
        <div class="inline-block align-bottom bg-gray-900 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-400" id="modal-title">
                            {{ __($product->brand . 'Specifications') }}
                        </h3>
                        <div class="grid grid-cols-2 bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            @foreach($specval as $indiv)
                            @if($indiv->product_ian == $product->ian)
                            <div class="p-1">
                                <p class="  text-sm text-gray-400">
                                    {{ __($specname[$indiv->specification_id - 1]) }}
                                </p>
                            </div>
                            <div class="p-1">
                                <p class=" text-sm text-gray-400">
                                    {{ __($indiv->value) }}
                                </p>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal End -->