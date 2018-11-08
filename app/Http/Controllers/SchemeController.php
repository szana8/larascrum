<?php

namespace App\Http\Controllers;


use App\Scheme;
use Illuminate\Http\Request;
use App\Http\Response\Facades\Response;
use App\Transformers\IssueTypeSchemaTransformer;
use App\Transformers\SchemeTransformer;

class SchemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schemes = Scheme::with('types')->get();

        return Response::responseCollectionWithSuccess($schemes, new SchemeTransformer);
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
     * @param  \App\Scheme  $scheme
     * @return \Illuminate\Http\Response
     */
    public function show(Scheme $scheme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Scheme  $scheme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scheme $scheme)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Scheme  $scheme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scheme $scheme)
    {
        //
    }
}
