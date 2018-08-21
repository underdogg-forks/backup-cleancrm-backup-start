<?php

namespace IP\Events;

use Illuminate\Queue\SerializesModels;
use IP\Modules\RecurringInvoices\Models\RecurringInvoiceItem;

class RecurringInvoiceItemSaving extends Event
{
    use SerializesModels;

    public function __construct(RecurringInvoiceItem $recurringInvoiceItem)
    {
        $this->recurringInvoiceItem = $recurringInvoiceItem;
    }
}
