<div class="px-4 md:px-8">
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif
    <x-form submit="submitForm" class="mt-4">
        <x-slot name="title">{{ __('Profile information') }}</x-slot>
        <x-slot name="description">{{ __("Update your account's profile information and email address.") }}</x-slot>

        <x-slot name="form">
            <div class="grid grid-cols-3 gap-x-4">
                <div class="col-span-2">
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
                </div>
                <div>
                    <x-label for="avatar" value="{{ __('Avatar') }}"/>
                    <div class="flex justify-center">
                        @if($avatar)
                            <img src="{{ $avatar->temporaryUrl() }}" class="w-full" alt="avatar">
                        @elseif($hasAvatar)
                            <img src="{{ $avatarPath }}" class="w-full" alt="avatar">
                        @endif
                    </div>
                    @if(!$hasAvatar)
                        <div class="mt-3 text-center">{{ __('You still have no an avatar') }}</div>
                    @endif
                    <div class="mt-4 text-center">
                        <x-input
                            wire:model="avatar"
                            id="file"
                            class="block mt-1 w-full inputfile"
                            type="file" name="avatar"
                        />
                        <label
                            for="file"
                            class="px-4 py-2 bg-nfsu-brand border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
                        >
                            {{ __('Upload new avatar') }}
                        </label>
                    </div>
                    @if($hasAvatar)
                        <div class="mt-4 text-center">
                            <button
                                onclick="confirm('Are you sure you want to remove the avatar?') || event.stopImmediatePropagation()"
                                wire:click="removeAvatar"
                                type="button"
                                class="px-4 py-2 items-center bg-yellow-300 border border-transparent rounded-md font-semibold text-xs text-nfsu-brand uppercase tracking-widest hover:bg-yellow-400 active:bg-yellow-500 focus:outline-none focus:border-yellow-500 focus:shadow-outline-yellow disabled:opacity-25 transition ease-in-out duration-150"
                            >
                                {{__('Without avatar') }}
                            </button>
                        </div>
                    @endif
                </div>
            </div>
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
