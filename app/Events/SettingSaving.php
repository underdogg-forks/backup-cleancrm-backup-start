<?php

namespace IP\Events;

use Illuminate\Queue\SerializesModels;
use IP\Modules\Settings\Models\Setting;

class SettingSaving extends Event
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }
}
