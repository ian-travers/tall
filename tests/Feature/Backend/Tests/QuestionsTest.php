<?php

namespace Tests\Feature\Backend\Tests;

use App\Models\Test\TestQuestion;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuestionsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function guest_can_not_manage_test_questions()
    {
        $this->get('/a/tests')->assertRedirect('/login');
        $this->get('/a/tests/create')->assertRedirect('/login');
        $this->get('/a/tests/1/edit')->assertRedirect('/login');
    }

    /** @test */
    function unauthorized_users_cannot_see_add_test_question_page()
    {
        $this->signIn();

        $this->get('/a/tests/create')
            ->assertSessionHas('status', [
                'type' => 'error',
                'message' => 'Not enough rights.',
            ]);
    }

    /** @test */
    function unauthorized_users_cannot_add_test_question()
    {
        $this->signIn(User::factory()->create());

        $question = TestQuestion::factory()->make();

        $this->post('/a/tests', $question->toArray())
            ->assertSessionHas('status', [
                'type' => 'error',
                'message' => 'Not enough rights.',
            ]);

        $this->assertDatabaseMissing('test_questions', $question->toArray());
    }

    /** @test */
    function authorized_user_can_create_a_question()
    {
        $this->signIn(User::factory()->admin()->create());

        $question = TestQuestion::factory()->make();

        $this->post('/a/tests', $question->toArray());

        $this->assertDatabaseHas('test_questions', $question->toArray());
    }

    /** @test */
    function unauthorized_users_cannot_see_edit_test_question_page()
    {
        $this->signIn();

        $question = TestQuestion::factory()->create();

        $this->get("/a/tests/{$question->id}/edit", $question->toArray())
            ->assertSessionHas('status', [
                'type' => 'error',
                'message' => 'Not enough rights.',
            ]);
    }

    /** @test */
    function unauthorized_users_cannot_update_test_question()
    {
        $this->signIn();

        /** @var TestQuestion $question */
        $question = TestQuestion::factory()->create();

        $question->question_en = 'Updated';

        $this->patch("/a/tests/{$question->id}", $question->toArray())
            ->assertSessionHas('status', [
                'type' => 'error',
                'message' => 'Not enough rights.',
            ]);
    }

    /** @test */
    function authorized_user_can_update_a_question()
    {
        $this->signIn(User::factory()->admin()->create());

        /** @var TestQuestion $question */
        $question = TestQuestion::factory()->create();

        $question->question_en = 'Updated en';
        $question->question_ru = 'Updated ru';
        $question->correct_answer = '2';

        $this->patch("/a/tests/{$question->id}", $question->toArray());

        $question = $question->fresh();
        $this->assertEquals('Updated en', $question->question_en);
        $this->assertEquals('Updated ru', $question->question_ru);
        $this->assertEquals('2', $question->correct_answer);
    }

    /** @test */
    function unauthorized_users_cannot_delet_test_question()
    {
        $this->signIn();

        /** @var TestQuestion $question */
        $question = TestQuestion::factory()->create();

        $question->question_en = 'Updated';

        $this->delete("/a/tests/{$question->id}")
            ->assertSessionHas('status', [
                'type' => 'error',
                'message' => 'Not enough rights.',
            ]);
    }

    /** @test */
    function authorized_user_can_delete_a_question()
    {
        $this->signIn(User::factory()->admin()->create());

        /** @var TestQuestion $question */
        $question = TestQuestion::factory()->create();

        $this->assertDatabaseCount('test_questions', 1);

        $this->delete("/a/tests/{$question->id}");

        $this->assertDatabaseCount('test_questions', 0);
    }

    /** @test */
    function question_requires_en_text()
    {
        $this->signIn(User::factory()->admin()->create());

        $question = [
            'question_en' => null,
            'question_ru' => 'In Russian',
            'correct_answer' => '1',
        ];

        $this->post(route('admin.tests.questions.store', $question))
            ->assertSessionHasErrors('question_en');
        $this->assertDatabaseMissing('test_questions', $question);
    }

    /** @test */
    function question_requires_ru_text()
    {
        $this->signIn(User::factory()->admin()->create());

        $question = [
            'question_en' => 'In English',
            'question_ru' => null,
            'correct_answer' => '1',
        ];

        $this->post(route('admin.tests.questions.store', $question))
            ->assertSessionHasErrors('question_ru');
        $this->assertDatabaseMissing('test_questions', $question);
    }

    /** @test */
    function question_requires_correct_answer()
    {
        $this->signIn(User::factory()->admin()->create());

        $question = [
            'question_en' => 'In English',
            'question_ru' => 'In Russian',
            'correct_answer' => null,
        ];

        $this->post(route('admin.tests.questions.store', $question))
            ->assertSessionHasErrors('correct_answer');
        $this->assertDatabaseMissing('test_questions', $question);
    }
}
