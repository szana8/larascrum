<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use szana8\Laraflow\Traits\Flowable;

class Issue extends Model
{
    use Flowable;

    /**
     * The relationships to always eager-load.
     *
     * @var [type]
     */
    protected $with = ['reporter', 'assignee', 'type', 'project', 'replies'];

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
    protected $appends = ['isSubscribedTo', 'possibleTransactions', 'actualStepName'];

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
     * @return App\Project Project
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * An issue could have many comments.
     *
     * @return App\Comment Comments
     */
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    /**
     * An issue belongs to a priority.
     *
     * @return App\Priority Priority
     */
    public function priority()
    {
        return $this->belongsTo(Priority::class, 'priority_id');
    }

    /**
     * Add a reply to the issue.
     *
     * @param $reply
     * @return Model
     */
    public function addReply($reply)
    {
        $reply = $this->replies()->create($reply);
        //event(new IssueReceivedNewReply($reply));

        return $reply;
    }

    /**
     * A user can subscribe to an issue.
     *
     * @param null $userId
     * @return Issue
     */
    public function subscribe($userId = null)
    {
        $this->subscriptions()->create([
            'user_id' => $userId ?: auth()->id()
        ]);

        return $this;
    }

    /**
     * A user can unsubscribe from an issue.
     *
     * @param null $userId
     */
    public function unSubscribe($userId = null)
    {
        $this->subscriptions()
            ->where('user_id', $userId ?: auth()->id())
            ->delete();
    }

    /**
     * An issue has many subscribers.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    /**
     * Is the authenticated user subscribed to the issue.
     *
     * @return bool
     */
    public function getIsSubscribedToAttribute()
    {
        return $this->subscriptions()
            ->where('user_id', auth()->id())
            ->exists();
    }

    /**
     * Apply all relevant issue filters.
     *
     * @param $query
     * @param $filters
     *
     * @return mixed
     */
    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }

    /**
     * Return the workflow configuration array
     */
    public function getLaraflowStates()
    {
        return config('tmp.configuration');
    }

    public function getPossibleTransactionsAttribute()
    {
        return $this->laraflowInstance()->getPossibleTransitions();
    }

    public function getActualStepNameAttribute()
    {
        return $this->getActualStepName();
    }

    public function updateWorkflowStatus($new_status)
    {
        $this->transiton(1);
        return $this->save();
    }
}
