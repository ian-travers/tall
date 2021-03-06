@props(['route', 'active'])

@php
    /** @var string|bool $active */
    $classes = $active ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900';
@endphp
<!-- Current: "bg-gray-100 text-gray-900", Default: "text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
<a
    href="{{ route($route) }}"
    {{ $attributes->merge(['class' => 'group flex items-center px-2 py-2 text-sm font-medium rounded-md ' . $classes ]) }}
    role="menuitem"
>
    {{ $slot }}
</a>

