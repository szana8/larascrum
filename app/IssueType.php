<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IssueType extends Model
{
    public function schemas()
    {
        return $this->belongsToMany(IssueTypeSchema::class);
    }
}
