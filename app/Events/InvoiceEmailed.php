<?php

namespace IP\Events;

use Illuminate\Queue\SerializesModels;
use IP\Modules\Invoices\Models\Invoice;

class InvoiceEmailed extends Event
{
    use SerializesModels;

    public function __construct(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }
}
