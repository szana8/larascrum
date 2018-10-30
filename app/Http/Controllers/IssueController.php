<?php

namespace App\Http\Controllers;

use App\Issue;
use Illuminate\Http\Request;
use App\Filters\IssueFilters;
use App\Traits\IssueFilterable;
use App\Transformers\IssueTransformer;
use App\Http\Response\Facades\Response;

class IssueController extends Controller
{
    use IssueFilterable;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IssueFilters $filters)
    {
        return Response::responseCollectionWithSuccess($this->getFilteredIssues($filters), new IssueTransformer, true);
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
        return Response::responseItemWithSuccess($issue->withDetails(), new IssueTransformer);
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
