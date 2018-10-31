<?php

namespace Tests\Feature\Project;

use App\Project;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class ProjectApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();
        Notification::fake();
    }

    /** @test */
    public function an_authenticated_user_can_list_projects()
    {
        $this->artisan('passport:install');

        factory(User::class, 10)->create();
        $project = create(Project::class, [], 10);
        $user = create(User::class, ['active' => true]);

        $userResponse = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'secret',
        ]);

        $response = $this->get('api/projects', ['Authorization' => 'Bearer ' . json_decode($userResponse->getContent())->access_token]);

        $response->assertSuccessful();
        $this->assertEquals(count(json_decode($response->getContent())->data), $project->count());
    }
}
