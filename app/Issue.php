<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    /**
     * The relationships to always eager-load.
     *
     * @var [type]
     */
    protected $with = ['reporter', 'assignee', 'type', 'project'];

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
    protected $appends = [];

    /**
     * Every issue has to be a reporter.
     *
     * @return App\User Reporter user
     */
    public function reporter()
    {
        return $this->belongsTo(User::class, 'reporter_id');
    }

    /**
     * Every issue can be a assignee.
     *
     * @return App\User Assignee user
     */
    public function assignee()
    {
        return $this->belongsTo(User::class, 'assignee_id');
    }

    /**
     * Every issue belongs to a type.
     *
     * @return App\IssueType Issue type
     */
    public function type()
    {
        return $this->belongsTo(IssueType::class, 'type_id');
    }

    /**
     * Every issue belongs to a project.
     *
     * @return App\Project  Project
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * An issue could have many comments.
     *
     * @return App\Comment  Comments
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * An issue belongs to a priority.
     *
     * @return App\Priority     Priority
     */
    public function priority()
    {
        return $this->belongsTo(Priority::class, 'priority_id');
    }

    /**
     * Apply all relevant issue filters.
     *
     * @param $query
     * @param $filters
     * @return mixed
     */
    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }
}
