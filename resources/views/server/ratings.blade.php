<x-layouts.app title="{{ $title }}">
    <div class="mt-3 md:mt-4 mx-auto px-4 md:px-8 text-blue-400 max-w-full">
        <div class="flex items-center justify-between">
            {{-- nav --}}
            <nav class="flex space-x-0 sm:space-x-4" aria-label="Tabs">
                {{-- Current: "bg-blue-100 text-gray-90", Default: "text-blue-300 hover:text-blue-200" --}}
                <a
                    href="{{ route('server.ratings', 'overall') }}"
                    class="{{ $type == 'Overall' ? 'bg-blue-100 text-gray-900' : 'text-blue-300 hover:text-blue-200' }} px-3 py-2 font-medium rounded-md"
                    {{ $type == 'Overall' ? 'aria-current="page"' : '' }}
                >
                    {{ __('Overall') }}
                </a>
                <a
                    href="{{ route('server.ratings', 'circuit') }}"
                    class="{{ $type == 'Circuit' ? 'bg-blue-100 text-gray-900' : 'text-blue-300 hover:text-blue-200' }} px-3 py-2 font-medium rounded-md"
                    {{ $type == 'Circuit' ? 'aria-current="page"' : '' }}
                >
                    {{ __('Circuit') }}
                </a>
                <a
                    href="{{ route('server.ratings', 'sprint') }}"
                    class="{{ $type == 'Sprint' ? 'bg-blue-100 text-gray-900' : 'text-blue-300 hover:text-blue-200' }} px-3 py-2 font-medium rounded-md"
                    {{ $type == 'Sprint' ? 'aria-current="page"' : '' }}
                >
                    {{ __('Sprint') }}
                </a>
                <a
                    href="{{ route('server.ratings', 'drag') }}"
                    class="{{ $type == 'Drag' ? 'bg-blue-100 text-gray-900' : 'text-blue-300 hover:text-blue-200' }} px-3 py-2 font-medium rounded-md"
                    {{ $type == 'Drag' ? 'aria-current="page"' : '' }}
                >
                    {{ __('Drag') }}
                </a>
                <a
                    href="{{ route('server.ratings', 'drift') }}"
                    class="{{ $type == 'Drift' ? 'bg-blue-100 text-gray-900' : 'text-blue-300 hover:text-blue-200' }} px-3 py-2 font-medium rounded-md"
                    {{ $type == 'Drift' ? 'aria-current="page"' : '' }}
                >
                    {{ __('Drift') }}
                </a>
            </nav>
            {{-- search --}}
            <div class="flex rounded-md">
                <label for="username" class="sr-only">Search</label>
                <input
                    type="text"
                    name="username"
                    id="username"
                    class="focus:ring-blue-200 focus:border-blue-200 block w-full rounded-none rounded-l-md pl-4 sm:text-sm border-blue-400 bg-transparent focus:bg-transparent"
                    placeholder="{{ __('Search...') }}">
                <button
                    class="-ml-px relative inline-flex px-4 py-2 border border-blue-400 hover:border-blue-200 text-sm font-medium rounded-r-md bg-transparent focus:outline-none focus:ring-1 focus:ring-blue-200 focus:border-blue-500">
                    <svg class="flex-shrink-0 h-5 w-5 text-blue-200" viewBox="0 0 20 20" fill="currentColor"
                         aria-hidden="true">
                        <path fill-rule="evenodd"
                              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                              clip-rule="evenodd"/>
                    </svg>
                </button>
            </div>
        </div>

        {{-- Rating table --}}
        <h2 class="text-4xl text-center tracking-widest">{{ __($type) }}</h2>
        <div class="mt-2 sm:mt-4">
            <table class="border border-blue-400 divide-y divide-blue-200 w-full">
                <thead>
                <tr class="text-center divide-x divide-blue-400">
                    <th class="py-2 px-4">{{ __('Rank') }}</th>
                    <th class="py-2 px-4">{{ __('Player') }}</th>
                    <th class="py-2 px-4">REP</th>
                    <th class="py-2 px-4">{{ __('Wins') }}</th>
                    <th class="py-2 px-4">{{ __('Loses') }}</th>
                    <th class="py-2 px-4">{{ __('Wins %') }}</th>
                    <th class="py-2 px-4">{{ __('Avg.Opps.Rank') }}</th>
                    <th class="py-2 px-4">{{ __('Avg.Opps.REP') }}</th>
                    <th class="py-2 px-4">{{ __('Disconnects') }}</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-blue-400">
                @foreach($ranking as $player)
                    <tr class="divide-x divide-blue-400">
                        <td class="py-1 px-3 text-center">{{ $loop->index + 1 }}</td>
                        <td class="py-1 px-3">{{ $player['name'] }}</td>
                        <td class="py-1 px-3 text-right">{{ number_format($player['REP'], 0, '', ' ') }}</td>
                        <td class="py-1 px-3 text-right">{{ number_format($player['wins'], 0, '', ' ') }}</td>
                        <td class="py-1 px-3 text-right">{{ number_format($player['loses'], 0, '', ' ') }}</td>
                        <td class="py-1 px-3 text-right">{{ $player['wins_percent'] }}</td>
                        <td class="py-1 px-3 text-right">{{ number_format($player['avg_opps_rating'], 0, '', ' ') }}</td>
                        <td class="py-1 px-3 text-right">{{ number_format($player['avg_opps_REP'], 0, '', ' ') }}</td>
                        <td class="py-1 px-3 text-right">{{ $player['disc_percent'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>
