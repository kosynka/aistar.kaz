<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Админ панель - {{ config('app.name') }}</title>

    <!-- Include CSS -->
    @include('parts.frontend.styles')
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle">
            <i class="bx bx-menu" id="header-toggle"></i>
        </div>
        <div class="header_img">
            <img src="https://i.imgur.com/hczKIze.jpg" alt="фото" />
        </div>
    </header>

    <div class="l-navbar" id="nav-bar">
        @include('parts.menu.nav-sidebar')
    </div>

    <div class="height-100">
        @yield('content')
    </div>

    <!-- Include JS -->
    @include('parts.frontend.scripts-down')
  </body>
</html>
