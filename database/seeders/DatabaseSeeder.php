<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\Room;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 */
	public function run(): void
	{
		// User::factory(10)->create();
		DB::table('room_user')->delete();
		Message::where('id', '!=', 0)->delete();
		Room::where('id', '!=', 0)->delete();
		User::where('id', '!=', 0)->delete();



		$user1 = User::factory()->create([
			'name' => 'Hasan Ablak',
			'email' => 'hasan@test.com',
		]);

		$user2 = User::factory()->create([
			'name' => 'Ümmügülsüm Ablak',
			'email' => 'ummugulsum@test.com',
		]);


		$room = Room::create([
			"user_id" => $user1->id,
			"name" => "Hasan'ın odası"
		]);

		$room->users()->attach([$user1->id, $user2->id]);


		Message::create([
			"user_id" => $user1->id,
			"room_id" => $room->id,
			"message" => "Bu Odayı ben oluşturdum"
		]);

		Message::create([
			"user_id" => $user1->id,
			"room_id" => $room->id,
			"message" => "Bu odanın sahibi benim"
		]);

		Message::create([
			"user_id" => $user2->id,
			"room_id" => $room->id,
			"message" => "Ben bu odada sadece bir misafirim"
		]);
	}
}
