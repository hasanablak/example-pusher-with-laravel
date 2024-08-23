<?php

use App\Events\UserEvents;
use App\Http\Controllers\RoomController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
	return $request->user();
})->middleware('auth:sanctum');


Route::post('/user-something', function () {
	$user = User::find("1");
	UserEvents::dispatch($user);
});
