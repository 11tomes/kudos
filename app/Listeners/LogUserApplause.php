<?php

namespace App\Listeners;

use App\Events\ApplauseGiven;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogUserApplause implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ApplauseGiven  $event
     * @return void
     */
    public function handle(ApplauseGiven $event)
    {
        $giver = $event->giver;
        $giver_gratitude = $giver->gratitude;
        $receiver = $event->receiver;
        $receiver_gratitude = $receiver->gratitude;
        $count = $event->count;

        $giver->gratitudeLogs()->attach($receiver->id, ['value' => $count]);

        $giver_gratitude->count -= $count;
        $giver_gratitude->save();

        $receiver_gratitude->count += $count;
        $receiver_gratitude->save();
    }
}
