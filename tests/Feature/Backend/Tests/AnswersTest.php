<?php

namespace Tests\Feature\Backend\Tests;

use App\Models\Test\TestQuestion;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AnswersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function guest_can_not_manage_test_answers()
    {
        $this->get('/a/tests/1')->assertRedirect('/login');
        $this->get('/a/tests/1/answers/create')->assertRedirect('/login');
        $this->get('/a/tests/1/answers/1/edit')->assertRedirect('/login');
    }

    /** @test */
    function unauthorized_users_cannot_manage_answers()
    {
        /** @var TestQuestion $question */
        $question = TestQuestion::factory()->create();
        $question->addAnswer('en', 'ru', '1');

        $this->signIn();

        $this->get("/a/tests/{$question->id}/answers/create")
            ->assertSessionHas('status', [
                'type' => 'error',
                'message' => 'Not enough rights.',
            ]);

        $this->get("/a/tests/{$question->id}/answers/1/edit")
            ->assertSessionHas('status', [
                'type' => 'error',
                'message' => 'Not enough rights.',
            ]);

        $this->delete("/a/tests/{$question->id}/answers/1")
            ->assertSessionHas('status', [
                'type' => 'error',
                'message' => 'Not enough rights.',
            ]);
    }

    /** @test */
    function authorized_user_can_create_an_answer()
    {
        $this->signIn(User::factory()->admin()->create());

        /** @var TestQuestion $question */
        $question = TestQuestion::factory()->create();

        $answer = [
            'answer_en' => 'en',
            'answer_ru' => 'ru',
            'index' => '1',
        ];

        $this->post("/a/tests/{$question->id}/answers", $answer)
            ->assertRedirect(route('admin.tests.questions.show', $question));

        $this->assertDatabaseHas('test_answers', $answer);
    }

    /** @test */
    function authorized_user_can_edit_an_answer()
    {
        $this->signIn(User::factory()->admin()->create());

        /** @var TestQuestion $question */
        $question = TestQuestion::factory()->create();

        $answer = [
            'answer_en' => 'en',
            'answer_ru' => 'ru',
            'index' => '1',
        ];

        $question->addAnswer($answer['answer_en'], $answer['answer_ru'], $answer['index']);

        $this->assertDatabaseHas('test_answers', $answer);
        $this->assertDatabaseCount('test_answers', 1);

        $updatedAnswer = [
            'answer_en' => 'en_upd',
            'answer_ru' => 'ru_upd',
            'index' => '2',
        ];

        $this->patch("/a/tests/{$question->id}/answers/{$question->answers->first()->id}", $updatedAnswer);

        $this->assertDatabaseMissing('test_answers', $answer);
        $this->assertDatabaseHas('test_answers', $updatedAnswer);
        $this->assertDatabaseCount('test_answers', 1);
    }

    /** @test */
    function authorized_user_can_delete_an_answer()
    {
        $this->signIn(User::factory()->admin()->create());

        /** @var TestQuestion $question */
        $question = TestQuestion::factory()->create();

        $answer = [
            'answer_en' => 'en',
            'answer_ru' => 'ru',
            'index' => '1',
        ];

        $question->addAnswer($answer['answer_en'], $answer['answer_ru'], $answer['index']);

        $this->assertDatabaseCount('test_answers', 1);

        $this->delete("/a/tests/{$question->id}/answers/{$question->answers->first()->id}");

        $this->assertDatabaseCount('test_answers', 0);
    }
}
