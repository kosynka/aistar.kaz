<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Админ панель - {{ config('app.name') }}</title>

        @include('parts.frontend.styles')
        @yield('custom-styles')
        @include('parts.frontend.scripts-up')
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="#" class="site_title"><span>Админ панель - {{ config('app.name') }}</span></a>
                        </div>

                        <div class="clearfix"></div>

                        @include('parts.menu.profile')

                        <br />

                        @include('parts.menu.sidebar')
                    </div>
                </div>

                @include('parts.menu.top-navigation')

                @yield('content')
            </div>
        </div>

        @include('parts.frontend.scripts-down')
        @yield('scriptdown')
    </body>
</html>
