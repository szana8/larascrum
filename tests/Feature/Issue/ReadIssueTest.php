<?php

namespace Tests\Feature\Issue;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class ReadIssueTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();
        Notification::fake();
    }

    /** @test */
    public function an_authenticated_user_can_read_issues()
    {
        $this->artisan('passport:install');

        $this->signIn();
        $issue = $this->createIssueWithFactory();
        $response = $this->getJson(route('issues'));

        $response->assertStatus(201);
        $this->assertEquals(count(json_decode($response->getContent())), $issue->count());
    }

    /** @test */
    public function a_unauthenticated_user_can_not_read_issues()
    {
        $issue = $this->createIssueWithFactory();
        $response = $this->getJson(route('issues'));

        $response->assertStatus(401);
    }
}
