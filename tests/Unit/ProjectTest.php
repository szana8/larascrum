<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Notification;
use App\Project;

class ProjectTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Undocumented variable
     *
     * @var [type]
     */
    protected $project;

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
        $this->project = Project::find(1);
    }

    /** @test */
    function a_project_has_many_issues()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->project->issues);
    }
}
