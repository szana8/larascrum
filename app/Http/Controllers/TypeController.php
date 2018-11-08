<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;
use App\Http\Response\Facades\Response;
use App\Transformers\TypeTransformer;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response::responseCollectionWithSuccess(Type::all(), new TypeTransformer);
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
     * @param \App\Type $type
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Type           $type
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Type $type
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        //
    }
}
