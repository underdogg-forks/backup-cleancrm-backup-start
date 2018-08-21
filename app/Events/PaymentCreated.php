<?php

namespace IP\Events;

use Illuminate\Queue\SerializesModels;
use IP\Modules\Payments\Models\Payment;

class PaymentCreated extends Event
{
    use SerializesModels;

    public function __construct(Payment $payment)
    {
        $this->payment = $payment;
    }
}
