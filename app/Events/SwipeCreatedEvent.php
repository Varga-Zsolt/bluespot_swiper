<?php

namespace App\Events;

use App\Models\Swipe;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SwipeCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Swipe $swipe;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Swipe $swipe)
    {
        $this->swipe = $swipe;
    }
}
