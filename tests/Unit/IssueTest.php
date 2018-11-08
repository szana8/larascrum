<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Notification;

class IssueTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Undocumented variable
     *
     * @var [type]
     */
    protected $issue;

    /**
     * Undocumented function
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        Notification::fake();
        $this->artisan('passport:install');
        $this->issue = $this->createIssueWithFactory();
    }

    /** @test */
    function an_issue_has_a_reporter()
    {
        $this->assertInstanceOf('App\User', $this->issue->reporter);
    }

    /** @test */
    function an_issue_has_an_assignee()
    {
        $this->assertInstanceOf('App\User', $this->issue->assignee);
    }

    /** @test */
    function an_issue_has_a_valid_type()
    {
        $this->assertInstanceOf('App\Type', $this->issue->type);
    }

    /** @test */
    function an_issue_has_a_valid_priority()
    {
        $this->assertInstanceOf('App\Priority', $this->issue->priority);
    }

    /** @test */
    function an_issue_belongs_to_a_project()
    {
        $this->assertInstanceOf('App\Project', $this->issue->project);
    }

    /** @test */
    function an_issue_has_replies()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->issue->replies);
    }

    /** @test */
    function an_issue_has_subscriptions()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->issue->subscriptions);
    }

    /** @test */
    function an_issue_can_add_a_reply()
    {
        $this->issue->addReply([
            'text' => 'FooBar',
            'user_id' => 1
        ]);

        $this->assertCount(1, $this->issue->replies);
    }

    /** @test */
    function an_issue_can_be_subscribed_to()
    {
        $issue = create('App\Issue');

        $issue->subscribe($userId = 1);

        $this->assertEquals(1, $issue->subscriptions()->where('user_id', $userId)->count());
    }

    /** @test */
    function an_issue_can_be_unsubscribed_from()
    {
        $issue = create('App\Issue');

        $issue->subscribe($userId = 1);

        $issue->unSubscribe($userId);

        $this->assertEquals(0, $issue->subscriptions()->where('user_id', $userId)->count());
    }

    /** @test */
    function it_knows_if_the_authenticated_user_is_subscribed_to_it()
    {
        $issue = create('App\Issue');

        $this->signIn();

        $issue->subscribe();

        $this->assertTrue($issue->isSubscribedTo);
    }
}
