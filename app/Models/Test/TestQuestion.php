<?php

namespace App\Models\Test;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Test\TestQuestion
 *
 * @property int $id
 * @property string $question_en
 * @property string $question_ru
 * @property int $correct_answer
 * @method static Builder|TestQuestion newModelQuery()
 * @method static Builder|TestQuestion newQuery()
 * @method static Builder|TestQuestion query()
 * @method static Builder|TestQuestion whereCorrectAnswer($value)
 * @method static Builder|TestQuestion whereId($value)
 * @method static Builder|TestQuestion whereQuestionEn($value)
 * @method static Builder|TestQuestion whereQuestionRu($value)
 * @mixin \Eloquent
 */
class TestQuestion extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = ['id'];

    public function answers()
    {
        return $this->hasMany(TestAnswer::class, 'question_id');
    }

    public function addAnswer(string $answerEn, string $answerRu, string $index): void
    {
        $this->answers()->create([
            'answer_en' => $answerEn,
            'answer_ru' => $answerRu,
            'index' => $index,
        ]);
    }

    public function editAnswer($id, $answerEn, $answerRu, $index): void
    {
        $answer = $this->answers()->findOrFail($id);

        $answer->edit($answerEn, $answerRu, $index);
    }

    /**
     * @param int $id
     * @throws \Exception
     */
    public function removeAnswer(int $id): void
    {
        $answer = $this->answers()->findOrFail($id);

        $answer->delete();
    }
}
