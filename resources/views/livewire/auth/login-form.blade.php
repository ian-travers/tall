<x-auth.card>
    <x-slot name="logo">
        <x-auth.logo/>
    </x-slot>

    <p class="text-sm text-gray-400 text-center tracking-widest">{{ __("Entering to NFSU Cup") }}</p>
    <p class="text-3xl text-center my-1">{{ __('Account login') }}</p>

    <form wire:submit.prevent="submitForm" class="mt-3">
        <div class="relative">
            <x-label for="username" value="{{ __('Username') }}"/>
            <x-input
                wire:model.lazy="username"
                class="block mt-1 w-full"
                type="text" name="username" maxlength="15"
                :value="old('username')"
                autofocus required autocomplete="username"

            />
            <x-checking-input-spinner input="username"/>
        </div>
        @error('username')<p class="text-red-500 mt-1 text-xs">{{ $message }}</p>@enderror

        <div class="mt-4">
            <x-label for="password" value="{{ __('Password') }}"/>
            <x-input
                wire:model.lazy="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
            />
        </div>
        @error('password')<p class="text-red-500 mt-1 text-xs">{{ $message }}</p>@enderror

        @if($message)
            <div class="flex justify-between bg-red-50 rounded-md p-4 my-4">
                <div class="text-red-600 text-sm">{{ $message }}</div>
                <button
                    wire:click="$set('message', false)"
                    type="button"
                >
                    <svg viewBox="0 0 20 20" class="w-5 h-5 text-red-600">
                        <path fill="currentColor" fill-rule="evenodd"
                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                              clip-rule="evenodd"/>
                    </svg>
                </button>
            </div>
        @endif

        <div class="flex items-center justify-end mt-4">
            <a
                class="underline text-sm text-gray-600 hover:text-gray-900"
                href="#"
            >
                {{ __('Forgot your password?') }}
            </a>

            <x-button class="ml-4">
                {{ __('Login') }}
            </x-button>
        </div>
    </form>
</x-auth.card>
