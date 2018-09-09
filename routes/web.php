<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/home', 'HomeController@index')->name('home');


//'namespace' => 'IP\Modules\Dashboard\Controllers'
Route::group(['prefix' => 'systemcp', 'middleware' => ['web']], function () {
    Route::get('/', ['uses' => 'DashboardController@index', 'as' => 'dashboard.rootindex']);
    Route::get('dashboard', ['uses' => 'DashboardController@index', 'as' => 'dashboard.index']);

    Route::group(['prefix' => 'activity_timeline', 'namespace' => 'IP\Modules\Merchant\Controllers'], function () {
        Route::post('generate_keys', ['uses' => 'ApiKeyController@generateKeys', 'as' => 'api.generateKeys']);
    });

    Route::group(['prefix' => 'attachments'], function () {
        Route::get('{urlKey}/download', ['uses' => 'AttachmentController@download', 'as' => 'attachments.download']);

        Route::group(['middleware' > 'auth.admin'], function () {
            Route::post('ajax/list', ['uses' => 'AttachmentController@ajaxList', 'as' => 'attachments.ajax.list']);
            Route::post('ajax/delete',
                ['uses' => 'AttachmentController@ajaxDelete', 'as' => 'attachments.ajax.delete']);
            Route::post('ajax/modal', ['uses' => 'AttachmentController@ajaxModal', 'as' => 'attachments.ajax.modal']);
            Route::post('ajax/upload',
                ['uses' => 'AttachmentController@ajaxUpload', 'as' => 'attachments.ajax.upload']);
            Route::post('ajax/access/update',
                ['uses' => 'AttachmentController@ajaxAccessUpdate', 'as' => 'attachments.ajax.access.update']);
        });
    });

    Route::group(['prefix' => 'api_external', 'namespace' => 'IP\Modules\Merchant\Controllers'], function () {
        Route::post('generate_keys', ['uses' => 'ApiKeyController@generateKeys', 'as' => 'api.generateKeys']);
    });

    Route::group(['prefix' => 'api_settings', 'namespace' => 'IP\Modules\Merchant\Controllers'], function () {
        Route::post('generate_keys', ['uses' => 'ApiKeyController@generateKeys', 'as' => 'api.generateKeys']);
    });

    Route::group(['prefix' => 'addons', 'namespace' => 'IP\Modules\Merchant\Controllers'], function () {
      Route::get('/', ['uses' => 'AddonController@index', 'as' => 'addons.index']);

      Route::get('install/{id}', ['uses' => 'AddonController@install', 'as' => 'addons.install']);
      Route::get('uninstall/{id}', ['uses' => 'AddonController@uninstall', 'as' => 'addons.uninstall']);
      Route::get('upgrade/{id}', ['uses' => 'AddonController@upgrade', 'as' => 'addons.upgrade']);
    });

    Route::group(['prefix' => 'currencies', 'namespace' => 'IP\Modules\Merchant\Controllers'], function () {
      Route::get('currencies', ['uses' => 'CurrencyController@index', 'as' => 'currencies.index']);
      Route::get('currencies/create', ['uses' => 'CurrencyController@create', 'as' => 'currencies.create']);
      Route::get('currencies/{id}/edit', ['uses' => 'CurrencyController@edit', 'as' => 'currencies.edit']);
      Route::get('currencies/{id}/delete', ['uses' => 'CurrencyController@delete', 'as' => 'currencies.delete']);

      Route::post('currencies', ['uses' => 'CurrencyController@store', 'as' => 'currencies.store']);
      Route::post('currencies/get-exchange-rate',
          ['uses' => 'CurrencyController@getExchangeRate', 'as' => 'currencies.getExchangeRate']);
      Route::post('currencies/{id}', ['uses' => 'CurrencyController@update', 'as' => 'currencies.update']);
    }); 

    Route::group(['prefix' => 'company_profiles', 'namespace' => 'IP\Modules\Merchant\Controllers'], function () {

        Route::get('company_profiles', ['uses' => 'CompanyProfileController@index', 'as' => 'companyProfiles.index']);
        Route::get('company_profiles/create',
            ['uses' => 'CompanyProfileController@create', 'as' => 'companyProfiles.create']);
        Route::get('company_profiles/{id}/edit',
            ['uses' => 'CompanyProfileController@edit', 'as' => 'companyProfiles.edit']);
        Route::get('company_profiles/{id}/delete',
            ['uses' => 'CompanyProfileController@delete', 'as' => 'companyProfiles.delete']);

        Route::post('company_profiles', ['uses' => 'CompanyProfileController@store', 'as' => 'companyProfiles.store']);
        Route::post('company_profiles/{id}',
            ['uses' => 'CompanyProfileController@update', 'as' => 'companyProfiles.update']);

        Route::post('company_profiles/{id}/delete_logo',
            ['uses' => 'CompanyProfileController@deleteLogo', 'as' => 'companyProfiles.deleteLogo']);
        Route::post('company_profiles/ajax/modal_lookup',
            ['uses' => 'CompanyProfileController@ajaxModalLookup', 'as' => 'companyProfiles.ajax.modalLookup']);


    });

    Route::group(['prefix' => 'exports', 'namespace' => 'IP\Modules\Merchant\Controllers'], function () {
      Route::get('/', ['uses' => 'ExportController@index', 'as' => 'export.index']);
      Route::post('{export}', ['uses' => 'ExportController@export', 'as' => 'export.export']);
    });

    Route::group(['prefix' => 'numberformats', 'namespace' => 'IP\Modules\Merchant\Controllers'], function () {
      Route::get('groups', ['uses' => 'GroupController@index', 'as' => 'groups.index']);
      Route::get('groups/create', ['uses' => 'GroupController@create', 'as' => 'groups.create']);
      Route::get('groups/{group}/edit', ['uses' => 'GroupController@edit', 'as' => 'groups.edit']);
      Route::get('groups/{group}/delete', ['uses' => 'GroupController@delete', 'as' => 'groups.delete']);

      Route::post('groups', ['uses' => 'GroupController@store', 'as' => 'groups.store']);
      Route::post('groups/{group}', ['uses' => 'GroupController@update', 'as' => 'groups.update']);
    });

    Route::group(['prefix' => 'imports', 'namespace' => 'IP\Modules\Merchant\Controllers'], function () {
      Route::get('import', ['uses' => 'ImportController@index', 'as' => 'import.index']);
      Route::get('import/map/{import_type}', ['uses' => 'ImportController@mapImport', 'as' => 'import.map']);

      Route::post('import/upload', ['uses' => 'ImportController@upload', 'as' => 'import.upload']);
      Route::post('import/map/{import_type}',
          ['uses' => 'ImportController@mapImportSubmit', 'as' => 'import.map.submit']);
    });

    Route::group(['prefix' => 'itemlookups', 'namespace' => 'IP\Modules\Merchant\Controllers'], function () {
      Route::get('item_lookups', ['uses' => 'ItemLookupController@index', 'as' => 'itemLookups.index']);
      Route::get('item_lookups/create', ['uses' => 'ItemLookupController@create', 'as' => 'itemLookups.create']);
      Route::get('item_lookups/{itemLookup}/edit', ['uses' => 'ItemLookupController@edit', 'as' => 'itemLookups.edit']);
      Route::get('item_lookups/{itemLookup}/delete',
          ['uses' => 'ItemLookupController@delete', 'as' => 'itemLookups.delete']);
      Route::get('item_lookups/ajax/item_lookup',
          ['uses' => 'ItemLookupController@ajaxItemLookup', 'as' => 'itemLookups.ajax.itemLookup']);

      Route::post('item_lookups', ['uses' => 'ItemLookupController@store', 'as' => 'itemLookups.store']);
      Route::post('item_lookups/{itemLookup}', ['uses' => 'ItemLookupController@update', 'as' => 'itemLookups.update']);
      Route::post('item_lookups/ajax/process',
          ['uses' => 'ItemLookupController@process', 'as' => 'itemLookups.ajax.process']);
    });

    Route::group(['prefix' => 'mail_queue', 'namespace' => 'IP\Modules\Merchant\Controllers'], function () {
      Route::get('/', ['uses' => 'MailLogController@index', 'as' => 'mailLog.index']);
      Route::post('content', ['uses' => 'MailLogController@content', 'as' => 'mailLog.content']);
      Route::get('{id}/delete', ['uses' => 'MailLogController@delete', 'as' => 'mailLog.delete']);
    });

    Route::group(['prefix' => 'mail_log', 'namespace' => 'IP\Modules\Merchant\Controllers'], function () {
      Route::get('/', ['uses' => 'MailLogController@index', 'as' => 'mailLog.index']);
      Route::post('content', ['uses' => 'MailLogController@content', 'as' => 'mailLog.content']);
      Route::get('{id}/delete', ['uses' => 'MailLogController@delete', 'as' => 'mailLog.delete']);
    });


    Route::group(['middleware' => ['web'], 'namespace' => 'IP\Modules\PaymentMethods\Controllers'],
        function () {
            Route::get('payment_methods', ['uses' => 'PaymentMethodController@index', 'as' => 'paymentMethods.index']);
            Route::get('payment_methods/create',
                ['uses' => 'PaymentMethodController@create', 'as' => 'paymentMethods.create']);
            Route::get('payment_methods/{paymentMethod}/edit',
                ['uses' => 'PaymentMethodController@edit', 'as' => 'paymentMethods.edit']);
            Route::get('payment_methods/{paymentMethod}/delete',
                ['uses' => 'PaymentMethodController@delete', 'as' => 'paymentMethods.delete']);

            Route::post('payment_methods', ['uses' => 'PaymentMethodController@store', 'as' => 'paymentMethods.store']);
            Route::post('payment_methods/{paymentMethod}',
                ['uses' => 'PaymentMethodController@update', 'as' => 'paymentMethods.update']);
        });



        Route::group([
            'prefix' => 'report',
            'middleware' => ['web'],
            'namespace' => 'IP\Modules\Reports\Controllers'
        ], function () {
            Route::get('client_statement',
                ['uses' => 'ClientStatementReportController@index', 'as' => 'reports.clientStatement']);
            Route::post('client_statement/validate',
                ['uses' => 'ClientStatementReportController@validateOptions', 'as' => 'reports.clientStatement.validate']);
            Route::get('client_statement/html',
                ['uses' => 'ClientStatementReportController@html', 'as' => 'reports.clientStatement.html']);
            Route::get('client_statement/pdf',
                ['uses' => 'ClientStatementReportController@pdf', 'as' => 'reports.clientStatement.pdf']);

            Route::get('item_sales', ['uses' => 'ItemSalesReportController@index', 'as' => 'reports.itemSales']);
            Route::post('item_sales/validate',
                ['uses' => 'ItemSalesReportController@validateOptions', 'as' => 'reports.itemSales.validate']);
            Route::get('item_sales/html', ['uses' => 'ItemSalesReportController@html', 'as' => 'reports.itemSales.html']);
            Route::get('item_sales/pdf', ['uses' => 'ItemSalesReportController@pdf', 'as' => 'reports.itemSales.pdf']);

            Route::get('payments_collected',
                ['uses' => 'PaymentsCollectedReportController@index', 'as' => 'reports.paymentsCollected']);
            Route::post('payments_collected/validate',
                ['uses' => 'PaymentsCollectedReportController@validateOptions', 'as' => 'reports.paymentsCollected.validate']);
            Route::get('payments_collected/html',
                ['uses' => 'PaymentsCollectedReportController@html', 'as' => 'reports.paymentsCollected.html']);
            Route::get('payments_collected/pdf',
                ['uses' => 'PaymentsCollectedReportController@pdf', 'as' => 'reports.paymentsCollected.pdf']);

            Route::get('revenue_by_client',
                ['uses' => 'RevenueByClientReportController@index', 'as' => 'reports.revenueByClient']);
            Route::post('revenue_by_client/validate',
                ['uses' => 'RevenueByClientReportController@validateOptions', 'as' => 'reports.revenueByClient.validate']);
            Route::get('revenue_by_client/html',
                ['uses' => 'RevenueByClientReportController@html', 'as' => 'reports.revenueByClient.html']);
            Route::get('revenue_by_client/pdf',
                ['uses' => 'RevenueByClientReportController@pdf', 'as' => 'reports.revenueByClient.pdf']);

            Route::get('tax_summary', ['uses' => 'TaxSummaryReportController@index', 'as' => 'reports.taxSummary']);
            Route::post('tax_summary/validate',
                ['uses' => 'TaxSummaryReportController@validateOptions', 'as' => 'reports.taxSummary.validate']);
            Route::get('tax_summary/html', ['uses' => 'TaxSummaryReportController@html', 'as' => 'reports.taxSummary.html']);
            Route::get('tax_summary/pdf', ['uses' => 'TaxSummaryReportController@pdf', 'as' => 'reports.taxSummary.pdf']);

            Route::get('profit_loss', ['uses' => 'ProfitLossReportController@index', 'as' => 'reports.profitLoss']);
            Route::post('profit_loss/validate',
                ['uses' => 'ProfitLossReportController@validateOptions', 'as' => 'reports.profitLoss.validate']);
            Route::get('profit_loss/html', ['uses' => 'ProfitLossReportController@html', 'as' => 'reports.profitLoss.html']);
            Route::get('profit_loss/pdf', ['uses' => 'ProfitLossReportController@pdf', 'as' => 'reports.profitLoss.pdf']);

            Route::get('expense_list', ['uses' => 'ExpenseListReportController@index', 'as' => 'reports.expenseList']);
            Route::post('expense_list/validate',
                ['uses' => 'ExpenseListReportController@validateOptions', 'as' => 'reports.expenseList.validate']);
            Route::get('expense_list/html', ['uses' => 'ExpenseListReportController@html', 'as' => 'reports.expenseList.html']);
            Route::get('expense_list/pdf', ['uses' => 'ExpenseListReportController@pdf', 'as' => 'reports.expenseList.pdf']);
        });


        Route::group([
            'prefix' => 'templates',
            'middleware' => ['web'],
            'namespace' => 'IP\Modules\Templates\Controllers'
        ], function () {
            Route::get('client_statement',
                ['uses' => 'ClientStatementTemplatesController@index', 'as' => 'templates.clientStatement']);
            Route::post('client_statement/validate',
                ['uses' => 'ClientStatementTemplatesController@validateOptions', 'as' => 'templates.clientStatement.validate']);
            Route::get('client_statement/html',
                ['uses' => 'ClientStatementTemplatesController@html', 'as' => 'templates.clientStatement.html']);
            Route::get('client_statement/pdf',
                ['uses' => 'ClientStatementTemplatesController@pdf', 'as' => 'templates.clientStatement.pdf']);

            Route::get('item_sales', ['uses' => 'ItemSalesTemplatesController@index', 'as' => 'templates.itemSales']);
            Route::post('item_sales/validate',
                ['uses' => 'ItemSalesTemplatesController@validateOptions', 'as' => 'templates.itemSales.validate']);
            Route::get('item_sales/html', ['uses' => 'ItemSalesTemplatesController@html', 'as' => 'templates.itemSales.html']);
            Route::get('item_sales/pdf', ['uses' => 'ItemSalesTemplatesController@pdf', 'as' => 'templates.itemSales.pdf']);

            Route::get('payments_collected',
                ['uses' => 'PaymentsCollectedTemplatesController@index', 'as' => 'templates.paymentsCollected']);
            Route::post('payments_collected/validate',
                ['uses' => 'PaymentsCollectedTemplatesController@validateOptions', 'as' => 'templates.paymentsCollected.validate']);
            Route::get('payments_collected/html',
                ['uses' => 'PaymentsCollectedTemplatesController@html', 'as' => 'templates.paymentsCollected.html']);
            Route::get('payments_collected/pdf',
                ['uses' => 'PaymentsCollectedTemplatesController@pdf', 'as' => 'templates.paymentsCollected.pdf']);

            Route::get('revenue_by_client',
                ['uses' => 'RevenueByClientTemplatesController@index', 'as' => 'templates.revenueByClient']);
            Route::post('revenue_by_client/validate',
                ['uses' => 'RevenueByClientTemplatesController@validateOptions', 'as' => 'templates.revenueByClient.validate']);
            Route::get('revenue_by_client/html',
                ['uses' => 'RevenueByClientTemplatesController@html', 'as' => 'templates.revenueByClient.html']);
            Route::get('revenue_by_client/pdf',
                ['uses' => 'RevenueByClientTemplatesController@pdf', 'as' => 'templates.revenueByClient.pdf']);

            Route::get('tax_summary', ['uses' => 'TaxSummaryTemplatesController@index', 'as' => 'templates.taxSummary']);
            Route::post('tax_summary/validate',
                ['uses' => 'TaxSummaryTemplatesController@validateOptions', 'as' => 'templates.taxSummary.validate']);
            Route::get('tax_summary/html', ['uses' => 'TaxSummaryTemplatesController@html', 'as' => 'templates.taxSummary.html']);
            Route::get('tax_summary/pdf', ['uses' => 'TaxSummaryTemplatesController@pdf', 'as' => 'templates.taxSummary.pdf']);

            Route::get('profit_loss', ['uses' => 'ProfitLossTemplatesController@index', 'as' => 'templates.profitLoss']);
            Route::post('profit_loss/validate',
                ['uses' => 'ProfitLossTemplatesController@validateOptions', 'as' => 'templates.profitLoss.validate']);
            Route::get('profit_loss/html', ['uses' => 'ProfitLossTemplatesController@html', 'as' => 'templates.profitLoss.html']);
            Route::get('profit_loss/pdf', ['uses' => 'ProfitLossTemplatesController@pdf', 'as' => 'templates.profitLoss.pdf']);

            Route::get('expense_list', ['uses' => 'ExpenseListTemplatesController@index', 'as' => 'templates.expenseList']);
            Route::post('expense_list/validate',
                ['uses' => 'ExpenseListTemplatesController@validateOptions', 'as' => 'templates.expenseList.validate']);
            Route::get('expense_list/html', ['uses' => 'ExpenseListTemplatesController@html', 'as' => 'templates.expenseList.html']);
            Route::get('expense_list/pdf', ['uses' => 'ExpenseListTemplatesController@pdf', 'as' => 'templates.expenseList.pdf']);
        });

        Route::group(['middleware' => ['web'], 'namespace' => 'IP\Modules\Settings\Controllers'], function () {
            Route::get('settings', ['uses' => 'SettingController@index', 'as' => 'settings.index']);
            Route::post('settings', ['uses' => 'SettingController@update', 'as' => 'settings.update']);
            Route::get('settings/update_check', ['uses' => 'SettingController@updateCheck', 'as' => 'settings.updateCheck']);
            Route::get('settings/logo/delete', ['uses' => 'SettingController@logoDelete', 'as' => 'settings.logo.delete']);
            Route::post('settings/save_tab', ['uses' => 'SettingController@saveTab', 'as' => 'settings.saveTab']);

            if (!config('app.demo')) {
                Route::get('backup/database', ['uses' => 'BackupController@database', 'as' => 'settings.backup.database']);
            }
        });

        Route::get('tasks/run', ['uses' => 'IP\Modules\Tasks\Controllers\TaskController@run', 'as' => 'tasks.run']);

        Route::group(['middleware' => ['web'], 'namespace' => 'IP\Modules\TaxRates\Controllers'], function () {
            Route::get('tax_rates', ['uses' => 'TaxRateController@index', 'as' => 'taxRates.index']);
            Route::get('tax_rates/create', ['uses' => 'TaxRateController@create', 'as' => 'taxRates.create']);
            Route::get('tax_rates/{taxRate}/edit', ['uses' => 'TaxRateController@edit', 'as' => 'taxRates.edit']);
            Route::get('tax_rates/{taxRate}/delete', ['uses' => 'TaxRateController@delete', 'as' => 'taxRates.delete']);

            Route::post('tax_rates', ['uses' => 'TaxRateController@store', 'as' => 'taxRates.store']);
            Route::post('tax_rates/{taxRate}', ['uses' => 'TaxRateController@update', 'as' => 'taxRates.update']);
        });




    Route::group(['prefix' => 'relations'], function () {

      Route::group([
          'middleware' => ['web'],
          'prefix' => 'customers',
          'namespace' => 'IP\Modules\Clients\Controllers'
      ], function () {
          Route::get('/', ['uses' => 'ClientController@index', 'as' => 'customers.index']);
          Route::get('create', ['uses' => 'ClientController@create', 'as' => 'customers.create']);
          Route::get('{id}/edit', ['uses' => 'ClientController@edit', 'as' => 'customers.edit']);
          Route::get('{id}', ['uses' => 'ClientController@show', 'as' => 'customers.show']);
          Route::get('{id}/delete', ['uses' => 'ClientController@delete', 'as' => 'customers.delete']);
          Route::get('ajax/lookup', ['uses' => 'ClientController@ajaxLookup', 'as' => 'customers.ajax.lookup']);

          Route::post('create', ['uses' => 'ClientController@store', 'as' => 'customers.store']);
          Route::post('ajax/modal_edit', ['uses' => 'ClientController@ajaxModalEdit', 'as' => 'customers.ajax.modalEdit']);
          Route::post('ajax/modal_lookup',
              ['uses' => 'ClientController@ajaxModalLookup', 'as' => 'customers.ajax.modalLookup']);
          Route::post('ajax/modal_update/{id}',
              ['uses' => 'ClientController@ajaxModalUpdate', 'as' => 'customers.ajax.modalUpdate']);
          Route::post('ajax/check_name', ['uses' => 'ClientController@ajaxCheckName', 'as' => 'customers.ajax.checkName']);
          Route::post('ajax/check_duplicate_name',
              ['uses' => 'ClientController@ajaxCheckDuplicateName', 'as' => 'customers.ajax.checkDuplicateName']);
          Route::post('{id}/edit', ['uses' => 'ClientController@update', 'as' => 'customers.update']);

          Route::post('bulk/delete', ['uses' => 'ClientController@bulkDelete', 'as' => 'customers.bulk.delete']);

          Route::group(['prefix' => '{clientId}/contacts'], function () {
              Route::get('create', ['uses' => 'ContactController@create', 'as' => 'customers.contacts.create']);
              Route::post('create', ['uses' => 'ContactController@store', 'as' => 'customers.contacts.store']);
              Route::get('edit/{contactId}', ['uses' => 'ContactController@edit', 'as' => 'customers.contacts.edit']);
              Route::post('edit/{contactId}', ['uses' => 'ContactController@update', 'as' => 'customers.contacts.update']);
              Route::post('delete', ['uses' => 'ContactController@delete', 'as' => 'customers.contacts.delete']);
              Route::post('default', ['uses' => 'ContactController@updateDefault', 'as' => 'customers.contacts.updateDefault']);
          });
      });



      Route::group(['prefix' => 'vendors', 'namespace' => 'IP\Modules\Merchant\Controllers'], function () {
          Route::post('pay', ['uses' => 'MerchantController@pay', 'as' => 'merchant.pay']);
          Route::get('{driver}/{urlKey}/cancel',
              ['uses' => 'MerchantController@cancelUrl', 'as' => 'merchant.cancelUrl']);
          Route::get('{driver}/{urlKey}/return',
              ['uses' => 'MerchantController@returnUrl', 'as' => 'merchant.returnUrl']);
          Route::post('{driver}/{urlKey}/webhook',
              ['uses' => 'MerchantController@webhookUrl', 'as' => 'merchant.webhookUrl']);
      });

    });




    Route::group(['prefix' => 'notes', 'namespace' => 'IP\Modules\Notes\Controllers'], function () {

        Route::post('create', ['uses' => 'NoteController@create', 'as' => 'notes.create']);
        Route::post('delete', ['uses' => 'NoteController@delete', 'as' => 'notes.delete']);

    });



    Route::group(['prefix' => 'invoices'], function () {
    });

    Route::group(['prefix' => 'invoices'], function () {
    });

    Route::group(['prefix' => 'invoices'], function () {
    });

    Route::group(['prefix' => 'invoices'], function () {
    });

    Route::group(['prefix' => 'invoices'], function () {
    });

    Route::group(['prefix' => 'invoices'], function () {
    });

    Route::group(['prefix' => 'invoices'], function () {
    });

    Route::group(['prefix' => 'invoices'], function () {
    });

    Route::group(['prefix' => 'invoices'], function () {
    });

    Route::group(['prefix' => 'invoices'], function () {
    });

    Route::group(['prefix' => 'invoices'], function () {
    });

    Route::group(['prefix' => 'invoices'], function () {
    });

    Route::group(['prefix' => 'invoices'], function () {
    });

    Route::group(['prefix' => 'invoices'], function () {
    });

    Route::group(['prefix' => 'invoices'], function () {
    });

    Route::group(['prefix' => 'invoices'], function () {
    });

    Route::group(['prefix' => 'invoices'], function () {
    });

    Route::group(['prefix' => 'invoices'], function () {
    });

    Route::group(['prefix' => 'invoices'], function () {
    });

    Route::group(['prefix' => 'invoices'], function () {
    });

    Route::group(['prefix' => 'invoices'], function () {
    }); 
});














Route::group(['prefix' => 'systemcp', 'middleware' => ['web']], function () {
    Route::group(['prefix' => 'quotes'], function () {
        Route::get('/', ['uses' => 'HomeController@index', 'as' => 'quotes.index']);
        Route::get('create', ['uses' => 'HomeController@create', 'as' => 'quotes.create']);
        Route::post('create', ['uses' => 'HomeController@store', 'as' => 'quotes.store']);
        Route::get('{id}/edit', ['uses' => 'HomeController@edit', 'as' => 'quotes.edit']);
        Route::post('{id}/edit', ['uses' => 'HomeController@update', 'as' => 'quotes.update']);
        Route::get('{id}/delete', ['uses' => 'HomeController@delete', 'as' => 'quotes.delete']);
        Route::get('{id}/pdf', ['uses' => 'HomeController@pdf', 'as' => 'quotes.pdf']);

        Route::get('{id}/edit/refresh', ['uses' => 'HomeController@refreshEdit', 'as' => 'quoteEdit.refreshEdit']);
        Route::post('edit/refresh_to', ['uses' => 'HomeController@refreshTo', 'as' => 'quoteEdit.refreshTo']);
        Route::post('edit/refresh_from',
            ['uses' => 'HomeController@refreshFrom', 'as' => 'quoteEdit.refreshFrom']);
        Route::post('edit/refresh_totals',
            ['uses' => 'HomeController@refreshTotals', 'as' => 'quoteEdit.refreshTotals']);
        Route::post('edit/update_client',
            ['uses' => 'HomeController@updateClient', 'as' => 'quoteEdit.updateClient']);
        Route::post('edit/update_company_profile',
            ['uses' => 'HomeController@updateCompanyProfile', 'as' => 'quoteEdit.updateCompanyProfile']);
        Route::post('recalculate', ['uses' => 'HomeController@recalculate', 'as' => 'quotes.recalculate']);
        Route::post('bulk/delete', ['uses' => 'HomeController@bulkDelete', 'as' => 'quotes.bulk.delete']);
        Route::post('bulk/status', ['uses' => 'HomeController@bulkStatus', 'as' => 'quotes.bulk.status']);
    });

    Route::group(['prefix' => 'quote_copy'], function () {
        Route::post('create', ['uses' => 'HomeController@create', 'as' => 'quoteCopy.create']);
        Route::post('store', ['uses' => 'HomeController@store', 'as' => 'quoteCopy.store']);
    });

    Route::group(['prefix' => 'quote_to_invoice'], function () {
        Route::post('create', ['uses' => 'HomeController@create', 'as' => 'quoteToInvoice.create']);
        Route::post('store', ['uses' => 'HomeController@store', 'as' => 'quoteToInvoice.store']);
    });

    Route::group(['prefix' => 'quote_mail'], function () {
        Route::post('create', ['uses' => 'QuoteMailController@create', 'as' => 'quoteMail.create']);
        Route::post('store', ['uses' => 'QuoteMailController@store', 'as' => 'quoteMail.store']);
    });

    Route::group(['prefix' => 'quote_item'], function () {
        Route::post('delete', ['uses' => 'HomeController@delete', 'as' => 'quoteItem.delete']);
    }); 
});

Route::group(['prefix' => 'systemcp', 'middleware' => ['web']], function () {
    Route::group(['prefix' => 'invoices'], function () {
        Route::get('/', ['uses' => 'HomeController@index', 'as' => 'invoices.index']);
        Route::get('create', ['uses' => 'HomeController@create', 'as' => 'invoices.create']);
        Route::post('create', ['uses' => 'HomeController@store', 'as' => 'invoices.store']);
        Route::get('{id}/edit', ['uses' => 'HomeController@edit', 'as' => 'invoices.edit']);
        Route::post('{id}/edit', ['uses' => 'HomeController@update', 'as' => 'invoices.update']);
        Route::get('{id}/delete', ['uses' => 'HomeController@delete', 'as' => 'invoices.delete']);
        Route::get('{id}/pdf', ['uses' => 'HomeController@pdf', 'as' => 'invoices.pdf']);

        Route::get('{id}/edit/refresh',
            ['uses' => 'HomeController@refreshEdit', 'as' => 'invoiceEdit.refreshEdit']);
        Route::post('edit/refresh_to', ['uses' => 'HomeController@refreshTo', 'as' => 'invoiceEdit.refreshTo']);
        Route::post('edit/refresh_from',
            ['uses' => 'HomeController@refreshFrom', 'as' => 'invoiceEdit.refreshFrom']);
        Route::post('edit/refresh_totals',
            ['uses' => 'HomeController@refreshTotals', 'as' => 'invoiceEdit.refreshTotals']);
        Route::post('edit/update_client',
            ['uses' => 'HomeController@updateClient', 'as' => 'invoiceEdit.updateClient']);
        Route::post('edit/update_company_profile',
            ['uses' => 'HomeController@updateCompanyProfile', 'as' => 'invoiceEdit.updateCompanyProfile']);
        Route::post('recalculate',
            ['uses' => 'HomeController@recalculate', 'as' => 'invoices.recalculate']);
        Route::post('bulk/delete', ['uses' => 'HomeController@bulkDelete', 'as' => 'invoices.bulk.delete']);
        Route::post('bulk/status', ['uses' => 'HomeController@bulkStatus', 'as' => 'invoices.bulk.status']);
    });

    Route::group(['prefix' => 'invoice_copy'], function () {
        Route::post('create', ['uses' => 'HomeController@create', 'as' => 'invoiceCopy.create']);
        Route::post('store', ['uses' => 'HomeController@storeMeNow', 'as' => 'invoiceCopy.store']);
    });

    Route::group(['prefix' => 'invoice_mail'], function () {
        Route::post('create', ['uses' => 'HomeController@create', 'as' => 'invoiceMail.create']);
        Route::post('store', ['uses' => 'HomeController@store', 'as' => 'invoiceMail.store']);
    });

    Route::group(['prefix' => 'invoice_item'], function () {
        Route::post('delete', ['uses' => 'HomeController@delete', 'as' => 'invoiceItem.delete']);
    });
});


Route::group(['prefix' => 'systemcp', 'middleware' => ['web']], function () {
  Route::group(['prefix' => 'recurring_invoices'], function () {
      Route::get('/', ['uses' => 'HomeController@index', 'as' => 'recurringInvoices.index']);
      Route::get('create',
          ['uses' => 'HomeController@create', 'as' => 'recurringInvoices.create']);
      Route::post('create',
          ['uses' => 'HomeController@store', 'as' => 'recurringInvoices.store']);
      Route::get('{id}/edit',
          ['uses' => 'HomeController@edit', 'as' => 'recurringInvoices.edit']);
      Route::post('{id}/edit',
          ['uses' => 'HomeController@update', 'as' => 'recurringInvoices.update']);
      Route::get('{id}/delete',
          ['uses' => 'HomeController@delete', 'as' => 'recurringInvoices.delete']);

      Route::get('{id}/edit/refresh',
          ['uses' => 'HomeController@refreshEdit', 'as' => 'recurringInvoiceEdit.refreshEdit']);
      Route::post('edit/refresh_to',
          ['uses' => 'HomeController@refreshTo', 'as' => 'recurringInvoiceEdit.refreshTo']);
      Route::post('edit/refresh_from',
          ['uses' => 'HomeController@refreshFrom', 'as' => 'recurringInvoiceEdit.refreshFrom']);
      Route::post('edit/refresh_totals', [
          'uses' => 'HomeController@refreshTotals',
          'as' => 'recurringInvoiceEdit.refreshTotals'
      ]);
      Route::post('edit/update_client',
          ['uses' => 'HomeController@updateClient', 'as' => 'recurringInvoiceEdit.updateClient']);
      Route::post('edit/update_company_profile', [
          'uses' => 'HomeController@updateCompanyProfile',
          'as' => 'recurringInvoiceEdit.updateCompanyProfile'
      ]);
      Route::post('recalculate', [
          'uses' => 'HomeController@recalculate',
          'as' => 'recurringInvoices.recalculate'
      ]);
  });

  Route::group(['prefix' => 'recurring_invoice_copy'], function () {
      Route::post('create',
          ['uses' => 'HomeController@create', 'as' => 'recurringInvoiceCopy.create']);
      Route::post('store',
          ['uses' => 'HomeController@store', 'as' => 'recurringInvoiceCopy.store']);
  });

  Route::group(['prefix' => 'recurring_invoice_item'], function () {
      Route::post('delete',
          ['uses' => 'HomeController@delete', 'as' => 'recurringInvoiceItem.delete']);
  });
});

Route::group(['prefix' => 'systemcp', 'middleware' => ['web']], function () {
    Route::get('payments', ['uses' => 'HomeController@index', 'as' => 'payments.index']);
    Route::post('payments/create', ['uses' => 'HomeController@create', 'as' => 'payments.create']);
    Route::post('payments/store', ['uses' => 'HomeController@store', 'as' => 'payments.store']);
    Route::get('payments/{payment}', ['uses' => 'HomeController@edit', 'as' => 'payments.edit']);
    Route::post('payments/{payment}', ['uses' => 'HomeController@update', 'as' => 'payments.update']);

    Route::get('payments/{payment}/delete', ['uses' => 'HomeController@delete', 'as' => 'payments.delete']);

    Route::post('bulk/delete', ['uses' => 'HomeController@bulkDelete', 'as' => 'payments.bulk.delete']);

    Route::group(['prefix' => 'payment_mail'], function () {
        Route::post('create', ['uses' => 'HomeController@create', 'as' => 'paymentMail.create']);
        Route::post('store', ['uses' => 'HomeController@store', 'as' => 'paymentMail.store']);
    });
});



Route::group(['prefix' => 'systemcp', 'middleware' => ['web']], function () {
  Route::group([
      'middleware' => ['web'],
      'prefix' => 'expenses',
      'namespace' => 'IP\Modules\Expenses\Controllers'
  ], function () {
      Route::get('/', ['uses' => 'ExpenseController@index', 'as' => 'expenses.index']);
      Route::get('create', ['uses' => 'ExpenseCreateController@create', 'as' => 'expenses.create']);
      Route::post('create', ['uses' => 'ExpenseCreateController@store', 'as' => 'expenses.store']);
      Route::get('{id}/edit', ['uses' => 'ExpenseEditController@edit', 'as' => 'expenses.edit']);
      Route::post('{id}/edit', ['uses' => 'ExpenseEditController@update', 'as' => 'expenses.update']);
      Route::get('{id}/delete', ['uses' => 'ExpenseController@delete', 'as' => 'expenses.delete']);

      Route::group(['prefix' => 'bill'], function () {
          Route::post('create', ['uses' => 'ExpenseBillController@create', 'as' => 'expenseBill.create']);
          Route::post('store', ['uses' => 'ExpenseBillController@store', 'as' => 'expenseBill.store']);
      });

      Route::get('lookup/category',
          ['uses' => 'ExpenseLookupController@lookupCategory', 'as' => 'expenses.lookupCategory']);
      Route::get('lookup/vendor', ['uses' => 'ExpenseLookupController@lookupVendor', 'as' => 'expenses.lookupVendor']);

      Route::post('bulk/delete', ['uses' => 'ExpenseController@bulkDelete', 'as' => 'expenses.bulk.delete']);
  });
});

Route::group(['prefix' => 'systemcp', 'middleware' => ['web']], function () {
    Route::group(['prefix' => 'invoices'], function () {
    });
});

Route::group(['prefix' => 'systemcp', 'middleware' => ['web']], function () {
    Route::group(['prefix' => 'invoices'], function () {
    });
});

Route::group(['middleware' => ['web'], 'namespace' => 'IP\Modules\Users\Controllers'], function () {
    Route::get('users', ['uses' => 'UserController@index', 'as' => 'users.index']);

    Route::get('users/create/{userType}', ['uses' => 'UserController@create', 'as' => 'users.create']);
    Route::post('users/create/{userType}', ['uses' => 'UserController@store', 'as' => 'users.store']);

    Route::get('users/{id}/edit/{userType}', ['uses' => 'UserController@edit', 'as' => 'users.edit']);
    Route::post('users/{id}/edit/{userType}', ['uses' => 'UserController@update', 'as' => 'users.update']);

    Route::get('users/{id}/delete', ['uses' => 'UserController@delete', 'as' => 'users.delete']);

    Route::get('users/{id}/password/edit', ['uses' => 'UserPasswordController@edit', 'as' => 'users.password.edit']);
    Route::post('users/{id}/password/edit',
        ['uses' => 'UserPasswordController@update', 'as' => 'users.password.update']);

    Route::post('users/client', ['uses' => 'UserController@getClientInfo', 'as' => 'users.clientInfo']);
});














