<?php

namespace App\Observers;

use App\User;
use App\Notifications\SignupActivate;

class UserObserver
{
    /**
     * Handle to the User "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(User $user)
    {
        $user->generateAvatar();
        $user->notify(new SignupActivate());
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }
}
