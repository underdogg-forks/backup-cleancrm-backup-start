<?php

namespace IP\Events;

use Illuminate\Queue\SerializesModels;
use IP\Modules\Quotes\Models\QuoteItem;

class QuoteItemSaving extends Event
{
    use SerializesModels;

    public function __construct(QuoteItem $quoteItem)
    {
        $this->quoteItem = $quoteItem;
    }
}
