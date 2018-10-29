<?php

namespace Tests\Feature\Issue;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class IssueApiTest extends TestCase
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

        $response = $this->get('api/issues');

        $response->assertStatus(200);
        $this->assertEquals(count(json_decode($response->getContent())->data), $issue->count());
    }

    /** @test */
    public function a_unauthenticated_user_can_not_read_issues()
    {
        $issue = $this->createIssueWithFactory();
        $response = $this->getJson('api/issues');

        $response->assertStatus(401);
    }

    /** @test */
    function a_user_can_filter_issues_according_to_a_project()
    {
        $this->signIn();
        $issue = $this->createIssueWithFactory(false);

        $project = create('App\Project');
        $issueInCategory = create('App\Issue', ['project_id' => $project->id]);
        $issueNotInCategory = create('App\Issue');

        $response = $this->get('api/issues?project=' . $project->slug);

        $response->assertStatus(200);
        $this->assertEquals((json_decode($response->getContent())->data)[0]->title, $issueInCategory->title);
        $this->assertNotEquals((json_decode($response->getContent())->data)[0]->title, $issueNotInCategory->title);
    }

    /** @test */
    function a_user_can_filter_issues_according_to_a_priority()
    {
        $this->signIn();
        $issue = $this->createIssueWithFactory(false);

        $priority = create('App\Priority');
        $issueInPriority = create('App\Issue', ['priority_id' => $priority->id]);
        $issueNotInPriority = create('App\Issue');

        $response = $this->get('api/issues?priority=' . $priority->id);

        $response->assertStatus(200);
        $this->assertEquals((json_decode($response->getContent())->data)[0]->title, $issueInPriority->title);
        $this->assertNotEquals((json_decode($response->getContent())->data)[0]->title, $issueNotInPriority->title);
    }
}
