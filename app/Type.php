<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function schemes()
    {
        return $this->belongsToMany(Scheme::class);
    }
}
