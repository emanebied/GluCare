<?php

namespace App\Events\Auth;

use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RegisterEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
