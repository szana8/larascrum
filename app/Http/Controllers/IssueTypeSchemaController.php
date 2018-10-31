<?php

namespace App\Http\Controllers;

use App\IssueTypeSchema;
use Illuminate\Http\Request;
use App\Http\Response\Facades\Response;
use App\Transformers\IssueTypeSchemaTransformer;

class IssueTypeSchemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schemas = IssueTypeSchema::with('types')->get();

        return Response::responseCollectionWithSuccess($schemas, new IssueTypeSchemaTransformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IssueTypeSchema  $issueTypeSchema
     * @return \Illuminate\Http\Response
     */
    public function show(IssueTypeSchema $issueTypeSchema)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IssueTypeSchema  $issueTypeSchema
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IssueTypeSchema $issueTypeSchema)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IssueTypeSchema  $issueTypeSchema
     * @return \Illuminate\Http\Response
     */
    public function destroy(IssueTypeSchema $issueTypeSchema)
    {
        //
    }
}
