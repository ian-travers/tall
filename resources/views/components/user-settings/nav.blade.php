<div class="border border-indigo-300 px-4 py-2 bg-white rounded-md">
    <div class="text-xl">
        {{ __('Account settings') }}
    </div>
    <nav class="mt-5 space-y-1">
        <x-user-settings.nav-item route="settings.profile">{{ __('Profile') }}</x-user-settings.nav-item>
        <x-user-settings.nav-item route="settings.account">{{ __('Account') }}</x-user-settings.nav-item>
    </nav>
</div>
