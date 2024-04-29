<?php


use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserOnlineEvent implements ShouldBroadcastNow
{
    use Dispatchable, SerializesModels;

    public $user;


    public function __construct($user)
    {
        $this->user = $user;
    }


    public function broadcastWith()
    {
        return [
            'id' => $this->user->id,
            'name' => $this->user->name,
        ];
    }

    public function broadcastOn()
    {
        return new PresenceChannel('presence-online');
    }








}
