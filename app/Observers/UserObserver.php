<?php

namespace App\Observers;

use App\Notifications\SignUpActivate;
use App\User;

class UserObserver
{
    /**
     * Handle to the User "created" event.
     *
     * @param \App\User $user
     *
     * @return void
     */
    public function created(User $user)
    {
        //$user->generateAvatar(); temporary disabled
        $user->notify(new SignUpActivate());
    }

    /**
     * Handle the User "updated" event.
     *
     * @param \App\User $user
     *
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param \App\User $user
     *
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }
}
