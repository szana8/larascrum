<?php

namespace App\Filters;

use App\User;
use App\Project;

class IssueFilters extends Filters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = ['by', 'project'];

    /**
     * Filter the query by the given username.
     *
     * @param $username
     * @return mixed
     */
    public function by($username)
    {
        $user = User::where('name', $username)->firstOrFail();

        return $this->builder->where('user_id', $user->id);
    }

    /**
     * Filter the query by the givven project
     *
     * @return mixed
     */
    public function project($projectSlug)
    {
        $project = Project::where('slug', $projectSlug)->firstOrFail();

        return $this->builder->where('project_id', $project->id);
    }
}
