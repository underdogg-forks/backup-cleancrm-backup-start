<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a href="{{ route('dashboard.index')}}" class="navbar-brand">
        <span class="navbar-brand-full">{{ config('cleancrm.headerTitleText') }}</span>
        {{--<img src="{{ asset('assets/img/ip_logo_1x1.svg') }}" alt="{{ config('cleancrm.headerTitleText') }}"
                class="navbar-brand-minimized">--}}
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="nav navbar-nav ml-auto d-md-down-none">
        <li class="nav-item dropdown px-3">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @lang('cleancrm.settings')
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('addons.index') }}">@lang('cleancrm.addons')</a>
                <a class="dropdown-item" href="{{ route('currencies.index') }}">@lang('cleancrm.currencies')</a>
                <a class="dropdown-item"
                   href="{{ route('companyProfiles.index') }}">@lang('cleancrm.company_profiles')</a>
                <a class="dropdown-item" href="{{ route('export.index') }}">@lang('cleancrm.export_data')</a>
                <a class="dropdown-item" href="{{ route('groups.index') }}">@lang('cleancrm.groups')</a>
                <a class="dropdown-item" href="{{ route('import.index') }}">@lang('cleancrm.import_data')</a>
                <a class="dropdown-item" href="{{ route('itemLookups.index') }}">@lang('cleancrm.item_lookups')</a>
                <a class="dropdown-item" href="{{ route('mailLog.index') }}">@lang('cleancrm.mail_log')</a>
                <a class="dropdown-item"
                   href="{{ route('paymentMethods.index') }}">@lang('cleancrm.payment_methods')</a>
                <a class="dropdown-item" href="{{ route('taxRates.index') }}">@lang('cleancrm.tax_rates')</a>
                <a class="dropdown-item" href="{{ route('users.index') }}">@lang('cleancrm.user_accounts')</a>
                <a class="dropdown-item" href="{{ route('settings.index') }}">@lang('cleancrm.system_settings')</a>
                {{-- @foreach (config('cleancrm.menus.system') as $menu)
                  @if (view()->exists($menu))
                      @include($menu)
                  @endif
              @endforeach --}}
            </div>
        </li>
        <li class="nav-item dropdown">
            @if (Auth::check())
                <a class="nav-link dropdown-toggle pr-3" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="true" aria-expanded="false">
                    @if (config('cleancrm.displayProfileImage'))
                        <img src="{{ $profileImageUrl }}" alt="User Image"/>
                    @else
                        {{ $userName }}
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-center">
                        <strong>Account</strong>
                    </div>
                    <a class="dropdown-item" href="#">
                        <i class="fa fa-bell-o"></i> Updates
                        <span class="badge badge-info">42</span>
                    </a>
                    <div class="divider"></div>
                    <a class="dropdown-item" href="{{ route('session.logout') }}">
                        <i class="fa fa-lock"></i> Logout
                    </a>
                </div>
            @else
                <a class="nav-link dropdown-toggle pr-3" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="true" aria-expanded="false">Not logged in</a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">
                        <i class="fa fa-bell-o"></i> Updates
                        <span class="badge badge-info">42</span>
                    </a>
                    <div class="divider"></div>
                </div>

            @endif
        </li>
    </ul>
</header>
