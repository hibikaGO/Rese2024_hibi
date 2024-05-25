<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--css下記追加-->
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>
<body>
    <header>
        <div class="header_inner">
            <div class="header_logo">
                <input type="checkbox" id="popup">
                <label for="popup" class="popup-open">
                    <div class="menu_icon">
                        <img src="{{ asset('picture/Rese_icon.png')}}" class="icon">
                    </div>
                </label>
                <div class="popup-overlay">
                    <div class="popup-window">
                        <label for="popup" class="popup-open">
                            <div class="popup-close" for="popup">×</div>
                        </label>
                        <div class="menu">
                            <a href="/" class=menu-link>Home</a>
                            @if (Auth::check())
                            <form class="form" action="/logout" method="post">
                            @csrf
                            <button class="header-nav__button">Logout</button>
                            </form>
                            @else
                            <a href="/login" class="menu-link">Login</a>
                            @endif
                            <a href="/mypage" class=menu-link>Mypage</a>
                        </div>
                    </div>
                </div>
                <h1 class=icon_text>Rese</h1>
            </div>
            @yield('header')
        </div>
    </header>
    <main>
        <div class="main">
        @yield('content')
        </div>
    </main>
</body>
</html>