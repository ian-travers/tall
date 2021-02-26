@props(['route'])

@php
    /** @var string $route */
    $classes = Request::routeIs($route) ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900'
@endphp

<a
    href="{{ route($route) }}"
    {{ $attributes->merge(['class' => 'group flex items-center px-2 py-2 text-base font-medium rounded-md ' . $classes ]) }}
    role="menuitem"
>
    {{ $slot }}
</a>
