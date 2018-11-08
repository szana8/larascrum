<?php

namespace App\Transformers;

use App\Issue;
use League\Fractal\TransformerAbstract;

class IssueTransformer extends TransformerAbstract
{
    public function transform(Issue $issue)
    {
        return $issue->toArray();
    }
}
