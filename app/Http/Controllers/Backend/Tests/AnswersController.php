<?php

namespace App\Http\Controllers\Backend\Tests;

use App\Http\Controllers\Controller;
use App\Models\Test\TestAnswer;
use App\Models\Test\TestQuestion;

class AnswersController extends Controller
{
    public function create(TestQuestion $question)
    {
        $answer = new TestAnswer();
        $title = __('New answer');

        return view('backend.tests.answers.create', compact('question', 'answer', 'title'));
    }

    public function store(TestQuestion $question)
    {
        $answer = $this->validateRequest();
        $question->addAnswer($answer['answer_en'], $answer['answer_ru'], $answer['index']);

        return redirect()->route('admin.tests.questions.show', $question)->with('status', __('Saved.'));
    }

    public function edit(TestQuestion $question, TestAnswer $answer)
    {
        $title = __('Edit answer');

        return view('backend.tests.answers.edit', compact('question', 'answer', 'title'));
    }

    public function update(TestQuestion $question, TestAnswer $answer)
    {
        $updAnswer = $this->validateRequest();
        $question->editAnswer($answer->id, $updAnswer['answer_en'], $updAnswer['answer_ru'], $updAnswer['index']);

        return redirect()->route('admin.tests.questions.show', $question)->with('status', __('Updated.'));
    }

    public function remove(TestQuestion $question, TestAnswer $answer)
    {
        $question->removeAnswer($answer->id);

        return redirect()->route('admin.tests.questions.show', $question)->with('status', __('Deleted.'));
    }

    /**
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateRequest(): array
    {
        return $this->validate(request(), [
            'answer_en' => 'required|string|max:255',
            'answer_ru' => 'required|string|max:255',
            'index' => 'required|string|max:1|regex:/^[1-9]{1}$/s',
        ]);
    }
}
