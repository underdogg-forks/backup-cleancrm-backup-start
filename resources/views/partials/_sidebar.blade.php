<div class="sidebar">
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.index') }}">
                    <i class="nav-icon fa fa-dashboard"></i> <span>@lang('cleancrm.dashboard')</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('customers.index', ['status' => 'active']) }}">
                    <i class="nav-icon fa fa-users"></i> <span>@lang('cleancrm.customers')</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link"
                   href="{{ route('quotes.index', ['status' => config('cleancrm.quoteStatusFilter')]) }}">
                    <i class="nav-icon fa fa-file-text-o"></i> <span>@lang('cleancrm.quotes')</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link"
                   href="{{ route('invoices.index', ['status' => config('cleancrm.invoiceStatusFilter')]) }}">
                    <i class="nav-icon fa fa-file-text"></i> <span>@lang('cleancrm.invoices')</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('recurringInvoices.index') }}">
                    <i class="nav-icon fa fa-refresh"></i> <span>@lang('cleancrm.recurring_invoices')</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('payments.index') }}">
                    <i class="nav-icon fa fa-credit-card"></i> <span>@lang('cleancrm.payments')</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('expenses.index') }}">
                    <i class="nav-icon fa fa-bank"></i> <span>@lang('cleancrm.expenses')</span>
                </a>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon fa fa-bar-chart-o"></i> <span>@lang('cleancrm.reports')</span>
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reports.clientStatement') }}">
                            @lang('cleancrm.client_statement')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reports.expenseList') }}">
                            @lang('cleancrm.expense_list')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reports.itemSales') }}">
                            @lang('cleancrm.item_sales')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reports.paymentsCollected') }}">
                            @lang('cleancrm.payments_collected')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reports.profitLoss') }}">
                            @lang('cleancrm.profit_and_loss')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reports.revenueByClient') }}">
                            @lang('cleancrm.revenue_by_client')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reports.taxSummary') }}">
                            @lang('cleancrm.tax_summary')
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>