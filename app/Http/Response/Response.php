<?php

namespace App\Http\Response;

use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class Response
{
    /**
     * Undocumented function
     *
     * @param [type] $collection
     * @param [type] $transformer
     * @param [type] $pagination
     * @return void
     */
    public function responseCollectionWithSuccess($collection, $transformer, bool $pagination = false)
    {
        $response = fractal()->collection($collection)->transformWith($transformer);

        if ($pagination === true)
            return $response->paginateWith(new IlluminatePaginatorAdapter($collection))->toArray();

        return $response->toArray();
    }

    /**
     * Undocumented function
     *
     * @param [type] $item
     * @param [type] $transformer
     * @return void
     */
    public function responseItemWithSuccess($item, $transformer)
    {
        return fractal()->item($item)->transformWith($transformer)->toArray();
    }

    /**
     * Response with an empty message if we just want to reutnr with
     * success but don't want to return any message.
     *
     * @return void
     */
    public function responseWithEmptySuccess()
    {
        return fractal()->item([])->transformWith(function ($object) { return $object; })->toArray();
    }
}
