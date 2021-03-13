@php /* @var App\Models\Test\TestAnswer $answer */ @endphp

<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/12 text-center">{{ __('Index') }}</th>
                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('In English') }}</th>
                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('In Russian') }}</th>
                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/5 text-center">{{ __('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y">
                    @foreach($question->answers as $answer)
                        <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }}">
                            <td class="px-4 py-2 text-sm font-medium text-gray-900 text-center">{{ $answer->index }}</td>
                            <td class="px-4 py-2 text-sm font-medium text-gray-900">{{ $answer->answer_en }}</td>
                            <td class="px-4 py-2 text-sm font-medium text-gray-900">{{ $answer->answer_ru }}</td>
                            <td class="px-4 py-2 text-sm font-medium text-center">
                                <a href="{{ route('admin.tests.answers.edit', [$question, $answer]) }}">
                                    <div title="{{ __('Edit') }}"
                                         class="rounded-md border border-blue-600 p-2 inline-flex">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="blue">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                                        </svg>
                                    </div>
                                </a>
                                <form
                                    class="inline-flex"
                                    action="{{ route('admin.tests.answers.delete', [$question, $answer]) }}"
                                    method="post"
                                >
                                    @csrf
                                    @method('delete')
                                    <button
                                        type="submit"
                                        onclick="return confirm()"
                                    >
                                        <span title="{{ __('Delete') }}"
                                             class="rounded-md border border-red-600 p-2 inline-flex">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="red">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
