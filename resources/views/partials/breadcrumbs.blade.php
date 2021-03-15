@unless ($breadcrumbs->isEmpty())
    <nav class="mx-auto">
        <ol class="p-4 flex flex-wrap bg-transparent text-gray-50">
            @foreach ($breadcrumbs as $breadcrumb)
                @if ($breadcrumb->url && !$loop->last)
                    <li>
                        <a
                            href="{{ $breadcrumb->url }}"
                            class="text-blue-200 hover:text-blue-100 hover:underline focus:underline focus:outline-none"
                        >
                            {{ $breadcrumb->title }}
                        </a>
                    </li>
                @else
                    <li class="font-semibold">
                        {{ $breadcrumb->title }}
                    </li>
                @endif
                @unless($loop->last)
                    <li class="text-gray-200 px-2">
                        /
                    </li>
                @endif
            @endforeach
        </ol>
    </nav>
@endunless
