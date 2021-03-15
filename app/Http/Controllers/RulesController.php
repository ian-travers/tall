<?php

namespace App\Http\Controllers;

use App\Models\Test\TestQuestion;

class RulesController extends Controller
{
    public function show()
    {
        $questions = TestQuestion::all();
        $title = __('Rules');

        return view('rules.show', compact('questions', 'title'));
    }

    public function check()
    {
        $this->validate(request(), [
            'quiz-form' => 'required',
        ]);

        $errorsCount = TestQuestion::count() - count(request('quiz-form'));

        foreach (request('quiz-form') as $q => $a) {
            $question = TestQuestion::findOrFail($q);

            if (!$question->isCorrectAnswer($a)) {
                $errorsCount++;
            }
        }

        if ($errorsCount) {
            return back()->with('status', [
                'type' => 'warning',
                'message' => __('You  have :count error(s).', ['count' => $errorsCount]),
            ]);
        }

        return back()->with('status', [
            'type' => 'success',
            'message' => __('Great. All answers are correct.'),
        ]);
    }
}
