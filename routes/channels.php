<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

// Broadcast::routes(['middleware' => ['web', 'auth']]);
// Broadcast::channel('chat.{task_id}', \App\Broadcasting\MessagesChannel::class);
Broadcast::channel('chat.{broadcast_id}', function ($user, $broadcast_id) {
    return Auth::check();
  });

