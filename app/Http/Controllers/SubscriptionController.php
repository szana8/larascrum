<?php

namespace App\Http\Controllers;

use App\Issue;
use App\Subscription;
use Illuminate\Http\Request;
use App\Http\Response\Facades\Response;
use App\Transformers\SubscriptionTransformer;

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

        return Response::responseItemWithSuccess($sub->subscriptions, new SubscriptionTransformer);
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

        return Response::responseWithEmptySuccess();
    }
}
