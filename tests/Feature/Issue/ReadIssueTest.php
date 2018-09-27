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

    	$issue =  factory(Issue::class)->create();

        $user = create(User::class, ['active' => true]);

        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'secret'
        ]);

        $issues = $this->call(route('issues'),['Authorization' => 'Bearer ' . json_decode($response->getContent())->access_token]);
        dd($issues);
    }
}
