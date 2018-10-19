<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;
use App\Issue;

class SubscriptionController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Issue $issue)
    {
        $sub = $issue->subscribe()->load('subscriptions.user');

        return response($sub->subscriptions, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Issue $issue)
    {
        $issue->unSubscribe();

        return response('unsubscribed', 201);
    }
}
