<?php

namespace App\Events;
use App\Subject;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class onAddSubjectEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_name;
    public $subject_name;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Subject $subject, User $user)
    {
        //
        $this->subject_name = $subject->name;
        $this->user_name = $user->name;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
