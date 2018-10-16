<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * A comment has an owner.
     *
     * @return App\User     User
     */
    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
