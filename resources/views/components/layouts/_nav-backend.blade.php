<nav class="mt-5 flex-1 px-2 bg-white space-y-1">
    <!-- Current: "bg-gray-100 text-gray-900", Default: "text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->

    <x-layouts._nav-link route="admin.dashboard">
        <svg class="text-gray-500 mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
        </svg>
        {{ __('Dashboard') }}
    </x-layouts._nav-link>

    <x-layouts._nav-link route="admin.tests.questions">
        <svg  class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6" fill="none" viewBox="0 0 20 20" stroke="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
        </svg>
        {{ __('Test questions') }}
    </x-layouts._nav-link>
</nav>

