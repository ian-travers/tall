<div class="w-full flex items-center justify-between">
    <div class="flex items-center p-2">
        @livewire('user.avatar', ['size' => '16'])
        <div class="px-4">
            <p class="text-2xl sm:text-3xl lg:text-5xl text-white font-semibold">{{ $username }}</p>
            <p class="text-xs sm:text-sm lg:text-md text-gray-400">{{ __('Your personal account') }}</p>
        </div>
    </div>
    <x-button>{{ __('Go to your public profile page') }}</x-button>
</div>

