<x-layouts.app title="{{ $title }}">
    <div class="max-w-full mx-auto sm:px-6 lg:px-8">
        <div class="flex overflow-hidden bg-white">
            <div class="flex flex-col w-56">
                <div class="flex flex-col h-0 flex-1 border-r border-gray-200 bg-white">
                    <div class="flex-1 flex flex-col pt-5 pb-4">
                        <div class="px-4 text-base md:text-xl">
                            {{ __('System management') }}
                        </div>
                        <x-layouts._nav-backend/>
                    </div>
                </div>
            </div>
            <main class="flex-1" tabindex="0">
                {{ $slot }}
            </main>
        </div>
    </div>
</x-layouts.app>

