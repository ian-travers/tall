<x-layouts.backend title="{{ $title }}">
    <div class="py-6">
        <div class="mx-auto px-4 sm:px-6 md:px-8">
            <h1 class="text-2xl font-semibold text-gray-900">{{ __('Edit answer') }}</h1>
        </div>
        <div class="mt-3 mx-auto px-4 sm:px-6 md:px-8">
            <p class="text-xl font-semibold text-gray-900">{{ $question->question_en }}</p>
        </div>
        <div class="mt-4 mx-auto px-4 sm:px-6 md:px-8">
            <form
                id="question-form"
                action="{{ route('admin.tests.answers.update', [$question, $answer]) }}"
                method="post"
            >
                @csrf
                @method('patch')
                @include('backend.tests.answers.form')
                <div class="mt-4 flex items-center">
                    <button
                        type="submit"
                        class="px-4 py-2 bg-green-600 text-white rounded-md"
                    >{{ __('Update') }}
                    </button>
                    <a
                        href="{{ route('admin.tests.questions.show', $question) }}"
                        class="ml-2 px-4 py-2 bg-gray-500 text-white rounded-md"
                    >
                        {{ __('Cancel') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.backend>

