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

    /**
     * Every project has many issues.
     *
     * @return App\Issue Collection of Issue objeczs
     */
    /* public function issues()
    {
        return $this->hasMany(Issue::class);
    } */

    /**
     * Count the issues which belongs to the project.
     *
     * @return number Number of Issues which belongs to the project
     */
    public function getAllIssuesInThisProjectCountAttribute()
    {
        return Issue::where('project_id', $this->id)->count();
    }

    /**
     * Count the issues in the current project which belongs to the authenticated
     * user.
     *
     * @return number Number of issues
     */
    public function getMyIssuesInThisProjectCountAttribute()
    {
        return Issue::where('project_id', $this->id)->where('assignee_id', Auth::id())->count();
    }

    /**
     * Get the route key name.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
