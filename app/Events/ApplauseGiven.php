<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class ApplauseGiven
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public User $giver;
    public User $receiver;
    public int $count;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $giver, User $receiver, $count)
    {
        $this->giver = $giver;
        $this->receiver = $receiver;
        $this->count = $count;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    // public function broadcastOn()
    // {
    //     return new PrivateChannel('channel-name');
    // }
}
