<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StatusUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

//    use Dispatchable, SerializesModels;

    public $updatedStatus;

    public function __construct($updatedStatus)
    {
        $this->updatedStatus = $updatedStatus;
    }

    public function broadcastAs()
    {
        return new Channel('status-update');
    }
}
