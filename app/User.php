<?php

namespace App;

use Avatar;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, SoftDeletes;

    /**
     * Set the attributes which has to be date type.
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name', 'email', 'password', 'active', 'activation_token', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     */
    protected $hidden = [
        'password', 'remember_token', 'activation_token',
    ];

    /**
     * Don't auto-apply mass assignment protection.
     */
    protected $guarded = [];

    /**
     * The accessors to append to the model's array form.
     */
    protected $appends = ['avatar_url'];

    /**
     * A user has an avatar image.
     */
    public function getAvatarUrlAttribute()
    {
        return Storage::url('avatars/'.$this->id.'/'.$this->avatar);
    }

    /**
     * Generate avatar image for the new users.
     */
    public function generateAvatar()
    {
        $avatar = Avatar::create($this->name)->getImageObject()->encode('png');
        Storage::put('public/avatars/'.$this->id.'/avatar.png', (string) $avatar);
    }
}
