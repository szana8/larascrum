<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\User;
use App\IssueType;
use App\Priority;
use App\Project;
use App\Issue;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function signIn($user = null)
    {
        $user = $user ?: create('App\User', ['active' => true]);

        $this->actingAs($user, 'api');
        return $this;
    }

    protected function createIssueWithFactory($issue = true)
    {
        $user = create(User::class, ['active' => true]);

        factory(User::class)->create();
        factory(IssueType::class)->create();
        factory(Priority::class)->create();
        factory(Project::class)->create();
        if ($issue)
            return factory(Issue::class)->create();

        return;
    }
}
