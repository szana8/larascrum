<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IssueTypeSchema extends Model
{
    public function types()
    {
        return $this->belongsToMany(IssueType::class);
    }
}
