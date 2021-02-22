<div
    x-show="isOpen"
    x-cloak
    class=" border-b border-gray-700 bg-nfsu-brand md:hidden"
>
    <div class="px-2 py-3 space-y-1 sm:px-3">
        <x-mobile-nav-link route="#">{{ __('Tourneys') }}</x-mobile-nav-link>
        <x-mobile-nav-link route="#">{{ __('Stats') }}</x-mobile-nav-link>
        <div class="text-sm font-semibold text-gray-400 tracking-widest uppercase text-center">
            {{ __('Game Server') }}
        </div>
        <x-mobile-nav-link route="#">{{ __('Monitor') }}</x-mobile-nav-link>
        <x-mobile-nav-link route="#">{{ __('Best Performers') }}</x-mobile-nav-link>
        <x-mobile-nav-link route="#">{{ __('Ratings') }}</x-mobile-nav-link>

    </div>
    <div class="pt-4 pb-3 border-t border-gray-700">
        @auth
            <div class="flex items-center px-5">
                <div class="flex-shrink-0">
                    @if(auth()->user()->hasAvatar())
                        <img
                            class="h-10 w-10 rounded-full"
                            src="{{ Storage::url(auth()->user()->avatar) }}"
                            alt="avatar"
                        >
                    @else
                        <span
                            class="inline-block h-10 w-10 rounded-full overflow-hidden bg-gray-100">
                            <svg
                                class="h-full w-full text-gray-300"
                                fill="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </span>
                    @endif
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium leading-none text-white">{{ auth()->user()->username }}</div>
                    <div class="text-sm font-medium leading-none text-gray-400">{{ auth()->user()->email }}</div>
                </div>
                <button
                    class="ml-auto bg-nfsu-brand flex-shrink-0 p-1 text-gray-400 rounded-full hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                    <span class="sr-only">View notifications</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                </button>
            </div>
            <div class="mt-3 px-2 space-y-1">
                <x-mobile-nav-link route="settings.profile">{{ __('Settings') }}</x-mobile-nav-link>
                <form method="post" action="{{ route('logout') }}">
                @csrf
                    <x-mobile-nav-link
                        route="logout"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                    >
                        {{ __('Logout') }}
                    </x-mobile-nav-link>
                </form>
            </div>
        @endauth

        @guest
                <x-mobile-nav-link route="login">{{ __('Login') }}</x-mobile-nav-link>
                <x-mobile-nav-link route="register">{{ __('Register') }}</x-mobile-nav-link>
        @endguest
    </div>
</div>
