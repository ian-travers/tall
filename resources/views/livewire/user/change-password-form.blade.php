<div>
    @if ($alert = session('status'))
        <x-alert-message type="{{ $alert['type'] }}">{{ $alert['message'] }}</x-alert-message>
    @endif
    <div class="mt-4">
        <x-label for="password" value="{{ __('Password') }}"/>
        <x-input
            wire:model.lazy="password"
            class="block mt-1 w-full"
            type="password"
            name="password"
            autofocus required
        />
    </div>
    <div class="mt-4">
        <x-label for="password_confirmation" value="{{ __('Confirm Password') }}"/>
        <x-input
            wire:model.lazy="password_confirmation"
            class="block mt-1 w-full"
            type="password"
            name="password_confirmation"
            required
        />
    </div>
    @error('password')<p class="text-red-500 mt-1 text-xs">{{ $message }}</p>@enderror

    <div class="flex justify-end mt-4 space-x-2">
        <button
            class="modal-close border hover:border-gray-500 px-4 bg-gray-100 rounded-lg text-white hover:bg-gray-200 text-gray-900"
        >
            {{ __('Cancel') }}
        </button>
        <x-button type="button" wire:click="submitForm">
            {{ __('Persist new password') }}
        </x-button>
    </div>
</div>
