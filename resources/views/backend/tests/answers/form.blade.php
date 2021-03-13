@php /* @var App\Models\Test\TestAnswer $answer */ @endphp

<div class="mt-3">
    <x-label for="question-en" value="{{ __('In English') }}"/>
    <x-input
        id="answer-en"
        type="text"
        class="w-full"
        name="answer_en"
        value="{{ old('answer_en', $answer->answer_en) }}"
    />
</div>
@error('answer_en')<p class="text-red-500 mt-1 text-xs">{{ $message }}</p>@enderror

<div class="mt-3">
    <x-label for="answer-ru" value="{{ __('In Russian') }}"/>
    <x-input
        id="answer-ru"
        type="text"
        class="w-full"
        name="answer_ru"
        value="{{ old('answer_ru', $answer->answer_ru) }}"
    />
</div>
@error('answer_ru')<p class="text-red-500 mt-1 text-xs">{{ $message }}</p>@enderror

<div class="mt-3">
    <x-label for="correct-answer" value="{{ __('Index') }}"/>
    <x-input
        id="index"
        type="text"
        class="w-full"
        name="index"
        value="{{ old('correct_answer', $answer->index) }}"
    />
</div>
@error('index')<p class="text-red-500 mt-1 text-xs">{{ $message }}</p>@enderror
