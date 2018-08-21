<?php

namespace IP\Events;

use Illuminate\Queue\SerializesModels;
use IP\Modules\Invoices\Models\Invoice;
use IP\Modules\RecurringInvoices\Models\RecurringInvoice;

class InvoiceCreatedRecurring extends Event
{
    use SerializesModels;

    public function __construct(Invoice $invoice, RecurringInvoice $recurringInvoice)
    {
        $this->invoice = $invoice;
        $this->recurringInvoice = $recurringInvoice;
    }
}
