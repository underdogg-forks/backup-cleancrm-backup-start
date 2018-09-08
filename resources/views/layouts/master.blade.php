<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <title>{{ config('cleancrm.headerTitleText') }}</title>

    @include('partials._head')

    @include('partials._js_global')

    @yield('head')

    @yield('javascript')

</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">

@include('partials._header')

<div class="app-body">

    @include('partials._sidebar')

    <main class="main">
        <div class="container-fluid pt-3">
            @yield('content')
        </div>
    </main>

</div>

<div id="modal-placeholder"></div>

</body>
</html>