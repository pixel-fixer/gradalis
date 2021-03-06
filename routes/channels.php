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

Broadcast::channel('Chat.Dialog.{id}', function ($user, $id) {
    return true;
    //return (int) $user->id === (int) $id;
});

Broadcast::channel('chart.data.{id}', function ($user, $id) {
    return true;
    //return (int) $user->id === (int) $id;
});

//Notifications and events for user
Broadcast::channel('App.Models.Auth.User.{id}', function ($user, $id) {
   return (int) $user->id === (int) $id;
});

Broadcast::channel('chat.{common}', function ($user, $id) {
    return ['id' => $user->id];
});
