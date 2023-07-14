<?php

namespace App\Listeners;

use App\Events\UserRegistrationEvent;
use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserRegistrationNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegistrationEvent $event): void
    {
       $admins=$event->admins;
        foreach ($admins as $admin){
            $notification['user_id']=$admin->id;
            $notification['text']='Add new user by name '. $event->user->name;
            Notification::create($notification);
        };

    }
}
