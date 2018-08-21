<?php

namespace IP\Events;

use Illuminate\Queue\SerializesModels;
use IP\Modules\RecurringInvoices\Models\RecurringInvoice;

class RecurringInvoiceDeleted extends Event
{
    use SerializesModels;

    public $recurringInvoice;

    public function __construct(RecurringInvoice $recurringInvoice)
    {
        $this->recurringInvoice = $recurringInvoice;
    }
}
