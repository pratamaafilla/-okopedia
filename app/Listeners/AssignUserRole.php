<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Role;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AssignUserRole
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        //nampung ID dari Role user (ID = 1) ke variabel $role
        $roleid = Role::where('name', 'user')->firstOrFail();

        //pas user dibuat, nanti akan langsung di kasih role id = 1
        $event->user->roles()->attach($roleid->id);
    }
}
