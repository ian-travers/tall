<x-auth.card>
    <x-slot name="logo">
        <x-auth.logo/>
    </x-slot>

    <p class="text-sm text-gray-400 text-center tracking-widest">{{ __('Join NFSU Cup') }}</p>
    <p class="text-3xl text-center my-1">{{ __('Create your account') }}</p>

    @if($submitMessage)
        <div class="flex justify-between bg-green-50 rounded-md p-4 my-2">
            <div class="text-green-600">{{ $submitMessage }}</div>
            <button
                wire:click="$set('submitMessage', false)"
                type="button"
            >
                <svg viewBox="0 0 20 20" class="w-5 h-5 text-green-600">
                    <path fill="currentColor" fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"/>
                </svg>
            </button>
        </div>
    @endif

    <form wire:submit.prevent="submitForm" class="mt-3">
        <div class="relative">
            <x-label for="name" value="{{ __('Username') }}"/>
            <x-input
                wire:model.lazy="username"
                class="block mt-1 w-full"
                type="text" name="username"
                :value="old('username')"
                autofocus
                autocomplete="username"
            />
            <x-checking-input-spinner input="username"/>
        </div>
        @error('username')<p class="text-red-500 mt-1 text-xs">{{ $message }}</p>@enderror

        <div class="relative mt-4">
            <x-label for="email" value="{{ __('Email') }}"/>
            <x-input
                wire:model.lazy="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"

            />
            <x-checking-input-spinner input="email"/>
        </div>
        @error('email')<p class="text-red-500 mt-1 text-xs">{{ $message }}</p>@enderror

        <div class="mt-4">
            <x-label for="password" value="{{ __('Password') }}"/>
            <x-input
                wire:model.lazy="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                autocomplete="new-password"
            />
        </div>
        @error('password')<p class="text-red-500 mt-1 text-xs">{{ $message }}</p>@enderror

        <div class="flex items-center justify-end mt-4">
            <a
                class="underline text-sm text-gray-600 hover:text-gray-900"
                href="{{ route('login') }}"
            >
                {{ __('Already registered?') }}
            </a>

            <x-button class="ml-4">
                {{ __('Register') }}
            </x-button>
        </div>

        <x-honey-recaptcha/>
    </form>
</x-auth.card>
