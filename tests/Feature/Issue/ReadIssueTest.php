<?php

namespace Tests\Feature\Issue;

use App\Issue;
use App\User;
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

        factory(User::class, 10)->create();

        $issue = create(Issue::class, [], 10);
        $user = create(User::class, ['active' => true]);

        $userResponse = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'secret',
        ]);

        $response = $this->get('/issues', ['Authorization' => 'Bearer ' . json_decode($userResponse->getContent())->access_token]);

        $response->assertSuccessful();
        //$this->assertEquals(count(json_decode($response->getContent())), $issue->count());
    }

    /** @test */
    public function a_unauthenticated_user_can_not_read_issues()
    {
        factory(User::class, 10)->create();
        $issue = create(Issue::class, [], 10);

        $response = $this->get(route('issues'), ['Authorization' => 'Bearer ']);

        $response->assertStatus(302);
    }
}
