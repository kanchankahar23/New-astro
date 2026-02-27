<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat-notify.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('wallet-updated.{userId}', function ($user, $userId) {
    return (int) $user->id === (int) $userId;
});

// Broadcast::channel('appointment-notification', function () {
//     return true;
// });
Broadcast::channel('astrologer-notification.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('astrologer-chat.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id; // Only allow the astrologer to listen
});

Broadcast::channel('chat.decline.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat.accept.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('video-call-request.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('video-call-accept.{userId}', function ($user, $userId) {
    return (int) $user->id === (int) $userId;
});

Broadcast::channel('video-call-decline.{userId}', function ($user, $userId) {
    return (int) $user->id === (int) $userId;
});
Broadcast::channel('update-astrologer-timer.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


Broadcast::channel('video-call.{userId}', function ($user, $userId) {
    return (int) $user->id === (int) $userId;
});




// Broadcast::channel('astrologer-notification.{appointmentId}', function ($user, $appointmentId) {
//     return true;
// });

