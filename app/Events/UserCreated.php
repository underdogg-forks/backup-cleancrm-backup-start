<?php

namespace IP\Events;

use Illuminate\Queue\SerializesModels;
use IP\Modules\Users\Models\User;

class UserCreated extends Event
{
    use SerializesModels;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
}