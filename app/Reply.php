<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    /**
     * The relationships to always eager-load.
     *
     * @var [type]
     */
    protected $with = ['owner'];

    /**
     * Don't auto-apply mass assignment protection.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * A comment has an owner.
     *
     * @return App\User User
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
