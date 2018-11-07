<?php

namespace App\Http\Controllers;

use App\IssueType;
use Illuminate\Http\Request;
use App\Http\Response\Facades\Response;
use App\Transformers\IssueTypeTransformer;

class IssueTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response::responseCollectionWithSuccess(IssueType::all(), new IssueTypeTransformer);
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
     * @param \App\IssueType $issueType
     *
     * @return \Illuminate\Http\Response
     */
    public function show(IssueType $issueType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\IssueType           $issueType
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IssueType $issueType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\IssueType $issueType
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(IssueType $issueType)
    {
        //
    }
}
