<?php

namespace Tests\Feature\Project;

use App\User;
use App\Project;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectApiTest extends TestCase
{
	 use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();
        Notification::fake();
    }

    /** @test */
    function an_authenticated_user_can_list_projects()
    {
    	 $this->artisan('passport:install');

        $project = create(Project::class, [], 10);
        $user = create(User::class, ['active' => true]);

        $userResponse = $this->post(route('login'), [
            'email'    => $user->email,
            'password' => 'secret',
        ]);

        $response = $this->get(route('projects'), ['Authorization' => 'Bearer '.json_decode($userResponse->getContent())->access_token]);

        $response->assertSuccessful();
        $this->assertEquals(count(json_decode($response->getContent())), $project->count());
    }
}
