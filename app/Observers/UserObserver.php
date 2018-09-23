<?php

namespace App\Observers;

use App\Models\Users;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class UserObserver
{
    public function creating(Users $user)
    {
        //
    }

    public function updating(Users $user)
    {
        //
    }
}