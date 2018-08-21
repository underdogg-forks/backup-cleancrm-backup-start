<?php

namespace IP\Events;

use Illuminate\Queue\SerializesModels;
use IP\Modules\Clients\Models\Client;

class ClientSaving extends Event
{
    use SerializesModels;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }
}
