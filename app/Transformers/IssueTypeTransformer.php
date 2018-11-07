<?php

namespace App\Transformers;

use App\IssueType;
use League\Fractal\TransformerAbstract;

class IssueTypeTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(IssueType $issueType)
    {
        return $issueType->toArray();
    }
}
