<div class="w-full flex items-center justify-between">
    <div class="flex items-center p-2">
        @livewire('user.avatar')
        <div class="px-4">
            <p class="text-xl text-white font-semibold">{{ $username }}</p>
            <p class="text-sm text-gray-400">{{ __('Your personal account') }}</p>
        </div>
    </div>
    <x-button>{{ __('Go to your public profile page') }}</x-button>
</div>

