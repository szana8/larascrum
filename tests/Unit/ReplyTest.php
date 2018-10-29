<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReplyTest extends TestCase
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
        $this->createIssueWithFactory();
    }

    /** @test */
    function a_reply_has_an_owner()
    {
        $reply = create('App\Reply');

        $this->assertInstanceOf('App\User', $reply->owner);
    }
}
