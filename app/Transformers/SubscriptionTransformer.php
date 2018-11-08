<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Subscription;

class SubscriptionTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform($subscription)
    {
        return $subscription->toArray();
    }
}
