<?php

namespace IP\Events;

use Illuminate\Queue\SerializesModels;
use IP\Modules\CustomFields\Models\ClientCustom;

class ClientCustomCreating extends Event
{
    use SerializesModels;

    public function __construct(ClientCustom $clientCustom)
    {
        $this->clientCustom = $clientCustom;
    }
}
