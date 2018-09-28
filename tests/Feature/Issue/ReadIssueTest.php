<?php

namespace Tests\Feature\Issue;

use App\User;
use App\Issue;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadIssueTest extends TestCase
{
	use RefreshDatabase;

	/** @test */
    function an_authenticated_user_can_read_issues()
    {
    	$this->artisan('passport:install');

    	$issue = create(Issue::class, [] , 10);
        $user = create(User::class, ['active' => true]);

        $userResponse = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'secret'
        ]);

        $response = $this->get(route('issues'), ['Authorization' => 'Bearer ' . json_decode($userResponse->getContent())->access_token]);

        $response->assertSuccessful();
        $this->assertEquals(count(json_decode($response->getContent())), $issue->count());
    }
}
