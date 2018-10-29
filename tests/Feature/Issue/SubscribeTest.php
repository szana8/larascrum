<?php

namespace Tests\Feature\Issue;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Notification;

class SubscribeTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        Notification::fake();
    }

    /** @test */
    public function a_user_can_subscribe_to_issues()
    {
        $this->artisan('passport:install');

        $this->signIn();
        $issue = $this->createIssueWithFactory();

        $this->post('api/issues/' . $issue->id . '/subscribe');
        $this->assertCount(1, $issue->fresh()->subscriptions);
    }

    /** @test */
    public function a_user_can_unsubscribe_from_issues()
    {
        $this->signIn();
        $issue = $this->createIssueWithFactory();
        $issue->subscribe();

        $this->delete('api/issues/' . $issue->id . '/unsubscribe');
        $this->assertCount(0, $issue->subscriptions);
    }

    /** @test */
    public function an_unautheticated_user_can_not_subscribe_to_issues()
    {
        $this->artisan('passport:install');

        $issue = $this->createIssueWithFactory();

        $response = $this->post('api/issues/' . $issue->id . '/subscribe');
        $this->assertCount(0, $issue->fresh()->subscriptions);
    }
}
