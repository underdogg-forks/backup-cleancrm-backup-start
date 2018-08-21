<?php

namespace IP\Events;

use Illuminate\Queue\SerializesModels;
use IP\Modules\Users\Models\User;

class UserDeleted extends Event
{
    use SerializesModels;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
