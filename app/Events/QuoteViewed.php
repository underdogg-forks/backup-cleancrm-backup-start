<?php

namespace IP\Events;

use Illuminate\Queue\SerializesModels;
use IP\Modules\Quotes\Models\Quote;

class QuoteViewed extends Event
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Quote $quote)
    {
        $this->quote = $quote;
    }
}
