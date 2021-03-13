<?php

namespace Database\Factories\Test;

use App\Models\Test\TestQuestion;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestQuestionFactory extends Factory
{
    protected $model = TestQuestion::class;

    public function definition(): array
    {
        return [
            'question_en' => 'Eng',
            'question_ru' => 'Rus',
            'correct_answer' => '1',
        ];
    }
}
