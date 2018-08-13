<?php

namespace IP\Events;

use Illuminate\Queue\SerializesModels;
use IP\Modules\Expenses\Models\Expense;

class ExpenseSaved extends Event
{
    use SerializesModels;

    public function __construct(Expense $expense)
    {
        $this->expense = $expense;
    }
}