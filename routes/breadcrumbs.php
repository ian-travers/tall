<?php

Breadcrumbs::for('root', function ($trail) {
    $trail->push(__('Home'), route('root'));
});

// Backend stuff
Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->parent('root');
    $trail->push(__('Dashboard'), route('admin.dashboard'));
});

Breadcrumbs::for('admin.tests.questions', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Test questions'), route('admin.tests.questions'));
});

Breadcrumbs::for('admin.tests.questions.create', function ($trail) {
    $trail->parent('admin.tests.questions');
    $trail->push(__('Create'), route('admin.tests.questions.create'));
});

Breadcrumbs::for('admin.tests.questions.show', function ($trail, $question) {
    $trail->parent('admin.tests.questions');
    $trail->push(__('View'), route('admin.tests.questions.show', $question));
});

Breadcrumbs::for('admin.tests.questions.edit', function ($trail, $question) {
    $trail->parent('admin.tests.questions');
    $trail->push(__('Edit'), route('admin.tests.questions.edit', $question));
});

Breadcrumbs::for('admin.tests.answers.create', function ($trail, $question) {
    $trail->parent('admin.tests.questions.show', $question);
    $trail->push(__('Create answer'), route('admin.tests.questions.create'));
});

Breadcrumbs::for('admin.tests.answers.edit', function ($trail, $question, $answer) {
    $trail->parent('admin.tests.questions.show', $question);
    $trail->push(__('Edit answer'), route('admin.tests.answers.edit', [$question, $answer]));
});
