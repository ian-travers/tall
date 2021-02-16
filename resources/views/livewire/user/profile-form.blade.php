<div class="px-4 md:px-8">
    <x-form submit="submitForm" class="mt-4">
        <x-slot name="title">{{ __('Profile information') }}</x-slot>
        <x-slot name="description">{{ __("Update your account's profile information and email address.") }}</x-slot>

        <x-slot name="form">
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
        </x-slot>

        <x-slot name="actions">
            <x-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-action-message>
            <x-button wire:loading.attr="disabled" wire:target="avatar">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-form>
</div>

