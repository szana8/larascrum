<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The relationships to always eager-load
     *
     * @var [type]
     */
    protected $with = ['owner'];

    /**
     * A comment has an owner.
     *
     * @return App\User     User
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
