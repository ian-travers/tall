<x-layouts.app title="{{ $title }}">
    <div class="px-4 md:px-8 mt-2">
        <x-user-settings.header username="{{ $username }}"></x-user-settings.header>
        <div class="flex flex-col sm:flex-row">
            <div class="w-full sm:w-56 lg:w-72px-4 py-1">
                <x-user-settings.nav></x-user-settings.nav>
            </div>
            <div class="flex-1 sm:pl-2 lg:pl-4 py-1">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-layouts.app>

