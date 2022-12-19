<section>
    <header>
        <h2 class="text-lg font-medium text-gray-300">
            {{ __('Contract Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-300">
            {{ __("Update your contract and the penalty for provider's breach of contract.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="cust_terms" :value="__('Vendor Agreement')" />
            <x-text-input id="cust_terms" name="cust_terms" type="text" class="mt-1 block w-full" :value="old('cust_terms', $user->cust_terms)" required autofocus autocomplete="Your service contract requirements." />
            <x-input-error class="mt-2" :messages="$errors->get('cust_terms')" />
        </div>

        <div>
            <x-input-label for="contract_penalty" :value="__('Contract Penalty')" />
            <x-text-input id="contract_penalty" name="contract_penalty" type="contract_penalty" class="mt-1 block w-full" :value="old('contract_penalty', $user->contract_penalty)" required autocomplete="contract penalty" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-300"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
