<x-auth.card>
    <x-slot name="logo">
        <x-auth.logo/>
    </x-slot>

    <p class="text-sm text-gray-400 text-center tracking-widest">{{ __("Entering to NFSU Cup") }}</p>
    <p class="text-3xl text-center my-1">{{ __('Account login') }}</p>

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

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

        <div wire:click="toggleRemember" class="mt-4 flex items-center justify-between">
              <span class="flex-grow flex flex-col" id="availability-label">
                <span class="text-sm font-medium text-gray-900">{{ __('Remember Me') }}</span>
              </span>
            <button type="button"
                    class="{{ $remember ? 'bg-nfsu-brand' : 'bg-gray-200' }} relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-nfsu-brand"
                    aria-pressed="false"
            >
                <span
                    class="{{ $remember ? 'translate-x-5' : 'translate-x-0' }} pointer-events-none relative inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"
                >
                    <span
                        class="{{ $remember ? 'opacity-0 ease-out duration-100' : 'opacity-100 ease-in duration-200' }} absolute inset-0 h-full w-full flex items-center justify-center transition-opacity"

                        aria-hidden="true"
                    >
                        <svg class="bg-white h-3 w-3 text-gray-400" fill="none" viewBox="0 0 12 12">
                            <path
                                d="M4 8l2-2m0 0l2-2M6 6L4 4m2 2l2 2"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </span>
                    <span
                        class="{{ $remember ? 'opacity-100 ease-in duration-200' : 'opacity-0 ease-out duration-100' }} absolute inset-0 h-full w-full flex items-center justify-center transition-opacity"
                        aria-hidden="true"
                    >
                        <svg class="bg-white h-3 w-3 text-nfsu-brand" fill="currentColor" viewBox="0 0 12 12">
                            <path
                                d="M3.707 5.293a1 1 0 00-1.414 1.414l1.414-1.414zM5 8l-.707.707a1 1 0 001.414 0L5 8zm4.707-3.293a1 1 0 00-1.414-1.414l1.414 1.414zm-7.414 2l2 2 1.414-1.414-2-2-1.414 1.414zm3.414 2l4-4-1.414-1.414-4 4 1.414 1.414z"/>
                         </svg>
                    </span>
                </span>
            </button>
        </div>

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
                href="{{ route('password.request') }}"
            >
                {{ __('Forgot your password?') }}
            </a>

            <x-button class="ml-4">
                {{ __('Login') }}
            </x-button>
        </div>
    </form>
</x-auth.card>
