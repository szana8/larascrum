<?php

namespace App\Http\Controllers;

use App\Filters\IssueFilters;
use App\Issue;
use App\Project;
use App\Traits\IssueFilterable;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    use IssueFilterable;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project, IssueFilters $filters)
    {
        $issues = $this->getFilteredIssues($project, $filters);

        return response($issues, 201);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Issue $issue
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Issue $issue)
    {
        return response($issue->load(['replies', 'priority']), 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Issue $issue
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Issue $issue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Issue               $issue
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Issue $issue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Issue $issue
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Issue $issue)
    {
        //
    }
}
