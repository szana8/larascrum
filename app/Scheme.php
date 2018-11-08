<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scheme extends Model
{
    /**
     * The relationships to always eager-load.
     *
     * @var array
     */
    protected $with = ['types'];

    /**
     * A schema belongs to many types.
     *
     * @return void
     */
    public function types()
    {
        return $this->belongsToMany(Type::class);
    }
}
