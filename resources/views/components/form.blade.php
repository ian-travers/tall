@props(['submit'])

<form wire:submit.prevent="{{ $submit }}">
    <div class="overflow-hidden rounded sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            {{ $slot }}
        </div>
    </div>
</form>
