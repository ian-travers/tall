<x-layouts.auth>
    <x-auth.card>
        <x-slot name="logo">
            <x-auth.logo/>
        </x-slot>

        <p class="text-sm text-gray-400 text-center tracking-widest">{{ __("Restore access to NFSU Cup") }}</p>
        <p class="my-2 text-gray-700 text-lg">
            {{ __('Forgot your password? No problem. Just let me know your email address and I will email you a password reset link that will allow you to choose a new one.') }}
        </p>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors/>

        <form class="mt-4" action="{{ route('password.email') }}" method="post">
            @csrf
            <x-label for="email">{{ __('Email') }}</x-label>
            <x-input
                class="block mt-1 w-full" id="email"
                type="text" name="email"
                :value="old('email')"
                autofocus required autocomplete="email"
            />
            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Email password reset link') }}
                </x-button>
            </div>
        </form>
    </x-auth.card>
</x-layouts.auth>
