<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Project;

class ProjectTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Project $project)
    {
        return $project->toArray();
    }
}
