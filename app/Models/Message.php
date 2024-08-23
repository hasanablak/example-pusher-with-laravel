<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	use HasFactory;

	protected $guarded = [];

	public function room()
	{
		return $this->hasOne(Room::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
