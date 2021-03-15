<?php

namespace App\Http\Controllers\Backend\Tests;

use App\Http\Controllers\Controller;
use App\Models\Test\TestQuestion;

class QuestionsController extends Controller
{
    public function index()
    {
        $questions = TestQuestion::paginate(20);
        $title = __('Test questions');

        return view('backend.tests.questions.index', compact('questions', 'title'));
    }

    public function create()
    {
        $question = new TestQuestion;
        $title = __('New question');

        return view('backend.tests.questions.create', compact('question', 'title'));
    }

    public function store()
    {
        TestQuestion::create($this->validateRequest());

        return redirect()->route('admin.tests.questions')->with('status', [
            'type' => 'success',
            'message' => __('Saved.'),
        ]);
    }

    public function edit(TestQuestion $question)
    {
        $title = __('Edit question');

        return view('backend.tests.questions.edit', compact('question', 'title'));
    }

    public function update(TestQuestion $question)
    {
        $question->update($this->validateRequest());

        return redirect()->route('admin.tests.questions')->with('status', [
            'type' => 'success',
            'message' => __('Updated.'),
        ]);
    }

    public function show(TestQuestion $question)
    {
        $title = __('View question');

        return view('backend.tests.questions.show', compact('question', 'title'));
    }

    public function remove(TestQuestion $question)
    {
        $question->delete();

        return redirect()->route('admin.tests.questions')->with('status', [
            'type' => 'success',
            'message' => __('Deleted.'),
        ]);
    }

    /**
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateRequest(): array
    {
        return $this->validate(request(), [
            'question_en' => 'required|string|max:255',
            'question_ru' => 'required|string|max:255',
            'correct_answer' => 'required|string|max:1|regex:/^[1-9]{1}$/s',
        ]);
    }
}
