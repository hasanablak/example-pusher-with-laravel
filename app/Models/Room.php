<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
	use HasFactory;

	protected $guarded = [];

	public function user()
	{
		return $this->hasOne(User::class);
	}

	public function users()
	{
		return $this->belongsToMany(User::class);
	}

	public function messages()
	{
		return $this->hasMany(Message::class, "room_id");
	}
}
