<?php

namespace App\Events;

use App\Models\Room;
use App\Models\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class MessageActionEvent implements ShouldBroadcast
{
	use Dispatchable, InteractsWithSockets, SerializesModels;

	/**
	 * Create a new event instance.
	 */
	public function __construct(public Room $room, public $message, public User $user) {}

	/**
	 * Get the channels the event should broadcast on.
	 *
	 * @return array<int, \Illuminate\Broadcasting\Channel>
	 */
	public function broadcastOn(): array
	{
		$channels = [];
		foreach ($this->room->users()->get() as $user) {
			if ($user->id != $this->user->id) {
				$channels[] = new PrivateChannel("Auth.$user->id.MessageAction");
			}
		}

		return $channels;
	}
}
