<?php

namespace App\Http\Controllers;

use App\Events\MessageActionEvent;
use App\Events\RoomMessageEvent;
use App\Models\Message;
use App\Models\Room;
use Illuminate\Http\Request;

class MessageController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(Request $request, $room_id)
	{

		$roomMessages = Message::where("room_id", $room_id)->with('user')->get();

		$roomMessages = $roomMessages->map(fn($message) => [...$message->toArray(), "time" => $message->created_at->diffForHumans()]);

		return [
			"status" => "success",
			"data" => $roomMessages ?? []
		];
	}


	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request, Room $room)
	{
		if (!$room->users()->where('user_id', auth()->id())->exists()) {
			return response([
				"status" => "error",
				"message" => "Sen bu odada değilsin!"
			]);
		}


		$message = Message::create([
			"room_id" => $room->id,
			"message" => $request->message,
			"user_id" => auth()->id()
		]);



		MessageActionEvent::dispatch($room, $message, auth()->user());

		return [
			"status" => "success",
			"data" => $message
		];
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		//
	}
}
