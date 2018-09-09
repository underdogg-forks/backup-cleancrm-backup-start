<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@lang('cleancrm.welcome')</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    @include('partials._head')

    @include('partials._js_global')

</head>
<body class="app flex-row align-items-center">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <span class="card-title">@lang('cleancrm.sign_in')</span>
                </div>
                <div class="card-body p-5">
                    @yield('content')
                    <!-- Scripts -->
                    {{--<script src="{{ asset('js/app.js') }}"></script>--}}
                </div>
            </div>
        </div>
    </div>
</body>
</html>