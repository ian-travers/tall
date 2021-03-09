<x-layouts.app>
    @if ($alert = session('status'))
        <x-alert-message type="{{ $alert['type'] }}">{{ $alert['message'] }}</x-alert-message>
    @endif

    <div
        class="m-3 grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-x-0 gap-y-1 sm:gap-x-1 lg:gap-x-2 text-white">
        <div class="border border-indigo-300">1</div>
        <div class="border border-indigo-300 h-32">2</div>
        <div class="border border-indigo-300 h-32">3</div>
        <div class="border border-indigo-300 h-16">4</div>
        <div class="border border-indigo-300 h-16">5</div>
        <div class="border border-indigo-300 h-48">6</div>
    </div>

    <div class="m-3 text-white flex flex-col sm:flex-row">
        <div class="p-2 w-full sm:w-64 md:w-96 border border-indigo-300 p-2">1</div>
        <div class="p-2 flex-1 border border-indigo-300 p-2">2</div>
    </div>
</x-layouts.app>
