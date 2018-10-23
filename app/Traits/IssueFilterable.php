<?php

namespace App\Traits;

use App\Issue;
use App\Filters\IssueFilters;

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
    public function getFilteredIssues(IssueFilters $filters)
    {
        $issues = Issue::latest()->filter($filters);

        return $issues->paginate(15);
    }
}
