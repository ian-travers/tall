<?php

namespace Database\Factories\Test;

use App\Models\Test\TestAnswer;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestAnswerFactory extends Factory
{
    protected $model = TestAnswer::class;

    public function definition(): array
    {
        return [
            'answer_en' => 'Eng',
            'answer_ru' => 'Rus',
            'index' => 1,
        ];
    }
}
