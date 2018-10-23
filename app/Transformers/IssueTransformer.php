<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Issue;

class IssueTransformer extends TransformerAbstract
{
    public function transform(Issue $issue)
    {
        return $issue->toArray();
    }
}
