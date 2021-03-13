@php /** @var \Illuminate\Contracts\Pagination\LengthAwarePaginator $questions */ @endphp
<x-layouts.backend title="{{ $title }}">
    <div class="py-6">
        <div class="flex items-center justify-between mx-auto px-4 sm:px-6 md:px-8">
            <h1 class="text-2xl font-semibold text-gray-900">{{ __('Test questions') }}</h1>
            <a
                href="{{ route('admin.tests.questions.create') }}"
                class="px-4 py-2 rounded-md bg-green-600 text-white"
            >
                {{ __('Create') }}
            </a>
        </div>
        <div class=" mx-auto px-4 sm:px-6 md:px-8">
            @if($questions->total())
                <div class="mt-4">
                    @include('backend.tests.questions.table')
                </div>

                <div class="mt-4">
                    {{ $questions->appends(request()->except('page'))->links() }}
                </div>
            @else
                <div class="mt-4">
                    {{ __('No questions found') }}
                </div>
            @endif
        </div>
    </div>
</x-layouts.backend>
