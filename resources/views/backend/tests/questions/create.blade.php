<x-layouts.backend title="{{ $title }}">
    <div class="py-6">
        <div class=" mx-auto px-4 sm:px-6 md:px-8">
            <h1 class="text-2xl font-semibold text-gray-900">{{ __('New question') }}</h1>
        </div>
        <div class="px-4 sm:px-6 md:px-8">
            <form
                id="question-form"
                action="{{ route('admin.tests.questions.store') }}"
                method="post"
            >
                @csrf
                @include('backend.tests.questions.form')
                <div class="mt-4 flex items-center">
                    <button
                        type="submit"
                        class="px-4 py-2 bg-green-600 text-white rounded-md"
                    >{{ __('Save') }}
                    </button>
                    <a
                        href="{{ route('admin.tests.questions') }}"
                        class="ml-2 px-4 py-2 bg-gray-500 text-white rounded-md"
                    >
                        {{ __('Cancel') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.backend>
