<?php

namespace App\Filters;

use App\Project;
use Illuminate\Support\Facades\Auth;

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
        if ($username == 'my') {
            return $this->builder->where('assignee_id', Auth::id());
        }

        return $this->builder;
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
