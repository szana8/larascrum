<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
	/**
	 * The relationships to always eager-load.
	 * @var [type]
	 */
	protected $with = ['reporter', 'assignee'];

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
    protected $appends = ['issueColor'];

	/**
	 * Every issue has to be a reporter.
	 *
	 * @return App\User		Reporter user
	 */
    public function reporter()
    {
    	return $this->belongsTo(User::class, 'reporter_id');
    }

    /**
     * Every issue can be a assignee.
     *
	 * @return App\User		Assignee user
     */
    public function assignee()
    {
    	return $this->belongsTo(User::class, 'assignee_id');
    }

    public function getIssueColorAttribute()
    {
    	switch ($this->type_id) {
    		case 1: return 'red';
    		default: return 'blue';
    	};
    }
}
