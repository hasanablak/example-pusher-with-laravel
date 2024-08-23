<?php

use App\Models\Order;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
	return (int) $user->id === (int) $id;
});

// aşağıdaki kontrol biraz saçma bunu veritabanında da yapabiliriz
Broadcast::channel('Auth.{id}.MessageAction', function (User $user, $id) {
	return true;
});

// Broadcast::channel('orders.{orderId}', function (User $user, int $orderId) {
// 	return $user->id === Order::findOrNew($orderId)->user_id;
// });
