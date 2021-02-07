@props(['alignment' => 'left'])

@php
$alignmentClasses = [
    'left' => '',
    'right' => 'origin-top-right right-0',
]
@endphp

<div
    x-data="{ isOpen: false }"
    class="ml-3 relative"
>
    <div @click="isOpen = !isOpen">
        {{ $trigger }}
    </div>
    <div
        x-show="isOpen"
        x-cloak
        @keydown.escape.window="isOpen = false"
        @click.away="isOpen = false"
        x-transition:enter="transition ease-out duration-150 transform"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150 transform"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="{{ $alignmentClasses[$alignment] }} absolute mt-2 w-48 rounded-md border border-gray-700 py-1 bg-nfsu-brand ring-1 ring-white ring-opacity-20"
        role="menu"
        aria-orientation="vertical"
        aria-labelledby="user-menu"
    >
        {{ $slot }}
    </div>
</div>
