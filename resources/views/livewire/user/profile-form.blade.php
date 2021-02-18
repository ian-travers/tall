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

            <div class="relative mt-4">
                <x-label for="email" value="{{ __('Email') }}"/>
                <x-input
                    wire:model.lazy="email"
                    class="block mt-1 w-full"
                    type="email" name="email"
                    :value="old('email')"
                    required autocomplete="email"
                />
                <x-checking-input-spinner input="email"/>
            </div>
            @error('email')<p class="text-red-500 mt-1 text-xs">{{ $message }}</p>@enderror

            <div class="mt-4">
                <x-label for="country" value="{{ __('Country') }}"/>
                <select
                    wire:model="country"
                    id="country"
                    name="country"
                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 rounded-md f16"
                >
                    <option disabled>{{ __('Select country ...') }}</option>
                    @foreach($countries as $code => $name)
                        <option value="{{ $code }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            @error('country')<p class="text-red-500 mt-1 text-xs">{{ $message }}</p>@enderror
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
