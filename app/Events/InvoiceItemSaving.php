<?php

namespace IP\Events;

use Illuminate\Queue\SerializesModels;
use IP\Modules\Invoices\Models\InvoiceItem;

class InvoiceItemSaving extends Event
{
    use SerializesModels;

    public function __construct(InvoiceItem $invoiceItem)
    {
        $this->invoiceItem = $invoiceItem;
    }
}
