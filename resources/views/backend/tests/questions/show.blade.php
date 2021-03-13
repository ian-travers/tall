@php /** @var \App\Models\Test\TestQuestion $question */ @endphp

<x-layouts.backend title="{{ $title }}">
    <div class="py-6">
        <div class="flex items-center justify-between mx-auto px-4 sm:px-6 md:px-8">
            <h1 class="text-2xl font-semibold text-gray-900">{{ __('View question') }}</h1>
            <div class="flex space-x-2">
                <a
                    href="{{ route('admin.tests.questions.edit', $question) }}"
                    class="px-4 py-2 rounded-md bg-blue-600 text-white"
                >
                    {{ __('Edit') }}
                </a>
                <form
                    action="{{ route('admin.tests.questions.delete', $question) }}"
                    method="post"
                >
                    @method('delete')
                    @csrf
                    <button
                        type="submit"
                        onclick="return confirm()"
                        class="px-4 py-2 rounded-md bg-red-600 text-white"
                    >
                        {{ __('Delete') }}
                    </button>
                </form>
            </div>
        </div>
        <div class="mt-4 mx-auto px-4 sm:px-6 md:px-8">
            <div class="shadow overflow-hidden border border-gray-200 sm:rounded-lg">
                <table class="min-w-full">
                    <tbody class="divide-y-2">
                    <tr>
                        <td class="px-4 py-2 w-1/4 sm:w-1/5 lg:w-1/6 text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('In English') }}</td>
                        <td class="w-full">{{ $question->question_en }}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 w-1/4 sm:w-1/5 lg:w-1/6 text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('In Russian') }}</td>
                        <td class="w-full">{{ $question->question_ru }}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 w-1/4 sm:w-1/5 lg:w-1/6 text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Correct answer') }}</td>
                        <td class="w-full">{{ $question->correct_answer }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                <div class="flex items-center mx-auto px-4 sm:px-6 md:px-8 space-x-2">
                    <p class="text-xl font-medium">{{ __('Answers list') }}</p>
                    <a
                        href="{{ route('admin.tests.answers.create', $question) }}"
                        class="px-4 py-2 rounded-md bg-green-600 text-white"
                    >
                        {{ __('Create') }}
                    </a>
                </div>
                <div class="mt-3">
                    @if($question->answers)
                        @include('backend.tests.answers.table')
                    @else
                        <p>{{ __('No answers') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layouts.backend>
