<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\RoomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('welcome');
})->name('home');


Route::post('login', function (Request $request) {
	$request->validate([
		"email" => "required",
		"password" => "required"
	]);

	$auth = Auth::attempt($request->only(["email", "password"]));

	if ($auth) {

		return response([
			"status" => "success",
			"data" => auth()->user()
		]);
	} else {
		return response([
			"status" => "error",
			"data" => ""
		]);
	}
})->name('login');


Route::post('logout', function () {
	auth()->logout();
	return redirect()->route('home');
})->name('logout');



Route::apiResource('rooms', RoomController::class)->names('api.rooms');

Route::apiResource('rooms.messages', MessageController::class)->names('api.rooms.messages');
