<?php

namespace App\Transformers;

use App\Scheme;
use League\Fractal\TransformerAbstract;

class SchemeTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Scheme $scheme)
    {
        return $scheme->toArray();
    }
}
