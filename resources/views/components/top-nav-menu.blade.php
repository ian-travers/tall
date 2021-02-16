<div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
    <div class="border-b border-gray-700">
        <div class="flex items-center justify-between h-16 px-4 sm:px-0">
            <div class="flex items-center">
                <div class="flex items-center w-60">
                    <img class="w-20 mr-1 md:w-24 md:mr-2" src="{{ asset('storage/logo.png') }}"
                         alt="Logo">
                    <span class="text-blue-200 hover:text-blue-100 text-lg md:text-2xl mb-0.5">NFSU Cup</span>
                </div>
                <div class="hidden md:block">
                    <div class="flex items-baseline space-x-2">
                        <x-nav-link route="tourneys">{{ __('Tourneys') }}</x-nav-link>
                        <x-nav-link route="stats">{{ __('Stats') }}</x-nav-link>
                        <x-dropdown>
                            <x-slot name="trigger">
                                <button
                                    class="hover:bg-gray-700 hover:text-blue-100 px-3 py-2 rounded-md font-medium {{ substr(Route::currentRouteName(), 0, 6) == 'server' ? 'bg-gray-900 text-white' : 'text-blue-200' }}"
                                >
                                    {{ __('Game Server') }}
                                </button>
                            </x-slot>
                            <x-dropdown-link href="#">{{ __('Monitor') }}</x-dropdown-link>
                            <div class="border-t border-gray-500"></div>
                            <x-dropdown-link href="#">{{ __('Best Performers') }}</x-dropdown-link>
                            <x-dropdown-link href="#">{{ __('Ratings') }}</x-dropdown-link>
                        </x-dropdown>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    @auth()
                        <button
                            class="bg-nfsu-brand p-1 text-gray-400 rounded-full hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                            <span class="sr-only">View notifications</span>
                            <svg class="h-6 w-6" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                            </svg>
                        </button>
                        <!-- Profile dropdown -->
                        <x-dropdown alignment="right">
                            <x-slot name="trigger">
                                <button
                                    class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                                    id="user-menu"
                                    aria-haspopup="true"
                                >
                                    <span class="sr-only">Open user menu</span>
                                    <img
                                        class="h-8 w-8 rounded-full"
                                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt=""
                                    >
                                </button>
                            </x-slot>
                            <x-dropdown-link href="{{ route('settings.profile') }}">{{ __('Settings') }}</x-dropdown-link>
                            <form method="post" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                >
                                    {{ __('Logout') }}
                                </x-dropdown-link>
                            </form>
                        </x-dropdown>
                    @endauth

                    @guest
                        <x-nav-link route="login">{{ __('Login') }}</x-nav-link>
                        <x-nav-link route="register">{{ __('Register') }}</x-nav-link>
                    @endguest
                </div>
            </div>
            <!-- Language switcher -->
            <x-language-switcher class="absolute right-16 md:right-28 xl:right-3"></x-language-switcher>
            <div
                class="-mr-2 md:hidden"
            >
                <!-- Mobile menu button -->
                <button
                    @click="isOpen = !isOpen"
                    class="bg-nfsu-brand inline-flex items-center justify-center p-2 rounded-md border border-gray-700 text-blue-200 hover:text-blue-100 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                    <span class="sr-only">Open main menu</span>
                    <svg x-show="!isOpen" class="block h-6 w-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="isOpen" class="block h-6 w-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
