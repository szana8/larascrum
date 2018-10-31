<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\IssueTypeSchema;

class IssueTypeSchemaTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(IssueTypeSchema $issueTypeSchema)
    {
        return $issueTypeSchema->toArray();
    }
}
