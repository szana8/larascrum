<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Project extends Model
{

	 /**
     * The relationships to always eager-load.
     *
     * @var [type]
     */
    protected $with = [];

    /**
     * Don't auto-apply mass assignment protection.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['allIssuesInThisProjectCount', 'myIssuesInThisProjectCount'];

	public function issues()
	{
		return $this->hasMany(Issue::class);
	}

    public function getAllIssuesInThisProjectCountAttribute()
    {
    	return $this->issues->count();
    }

    public function getMyIssuesInThisProjectCountAttribute()
    {
		return $this->issues->where('assignee_id', Auth::id())->count();
    }
}
