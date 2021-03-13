<div class="mt-3">
    <x-label for="question-en" value="{{ __('In English') }}"/>
    <x-input
        id="question-en"
        type="text"
        class="w-full"
        name="question_en"
        value="{{ old('question_en', $question->question_en) }}"
    />
</div>
@error('question_en')<p class="text-red-500 mt-1 text-xs">{{ $message }}</p>@enderror

<div class="mt-3">
    <x-label for="question-ru" value="{{ __('In Russian') }}"/>
    <x-input
        id="question-ru"
        type="text"
        class="w-full"
        name="question_ru"
        value="{{ old('question_ru', $question->question_ru) }}"
    />
</div>
@error('question_ru')<p class="text-red-500 mt-1 text-xs">{{ $message }}</p>@enderror

<div class="mt-3">
    <x-label for="correct-answer" value="{{ __('Correct answer') }}"/>
    <x-input
        id="correct-answer"
        type="text"
        class="w-full"
        name="correct_answer"
        value="{{ old('correct_answer', $question->correct_answer) }}"
    />
</div>
@error('correct_answer')<p class="text-red-500 mt-1 text-xs">{{ $message }}</p>@enderror
