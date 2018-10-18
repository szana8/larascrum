<?php

namespace App\Traits;

use App\Filters\IssueFilters;
use App\Issue;
use App\Project;

trait IssueFilterable
{
    /**
     * Fetch all relevant issues.
     *
     * @param Category     $category
     * @param IssueFilters $filters
     *
     * @return mixed
     */
    public function getFilteredIssues(Project $project, IssueFilters $filters)
    {
        $issues = Issue::latest()->filter($filters);

        if ($project->exists) {
            $issues->where('project_id', $project->id);
        }

        return $issues->paginate(15);
    }
}
