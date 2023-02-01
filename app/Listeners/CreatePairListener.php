<?php

namespace App\Listeners;


use App\Events\SwipeCreatedEvent;
use App\Models\Pair;
use App\Models\Swipe;

class CreatePairListener
{
    /**
     * Handle the event.
     *
     * @param SwipeCreatedEvent $event
     * @return void
     */
    public function handle(SwipeCreatedEvent $event)
    {
        $swipe = $event->swipe;

        if (!$swipe->isLiked()) {
            return;
        }

        if ($this->isReversedLikeExists($swipe)) {
            $this->createPair($swipe);
        }
    }

    private function isReversedLikeExists(Swipe $swipe): bool
    {
        return Swipe::query()
            ->where('swiped_user_id', $swipe->user_id)
            ->where('user_id', $swipe->swiped_user_id)
            ->where('action', Swipe::LIKE_ACTION)
            ->exists();
    }

    private function createPair(Swipe $swipe)
    {
        $pair = new Pair();
        $pair->user_a = $swipe->user_id;
        $pair->user_b = $swipe->swiped_user_id;
        $pair->save();
    }
}
