<!DOCTYPE html>
<html>
<head>
    <title>LEMS</title>
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/fonts.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<header id="header">
    <div class="header-container">
        <div class="header-logo logo">
            <a href="/">
                <img src="/img/logo.svg" alt="logo">
            </a>
        </div>

        <nav class="header-main-menu menu">
            <div class="burger-menu">
                <span></span>
            </div>
            <ul class="header-menu-list header_menu">
                <li class="header-menu-item">
                    <a class="{{Request::path() == "home" ? "current_page_item" : ""}}" href="/">Головна</a>
                </li>
                <li class="header-menu-item">
                    <a class="{{Request::path() == "allowance" ? "current_page_item" : ""}}" href="/info-for-allowance">Безробітним</a>
                </li>
                <li class="header-menu-item">
                    <a class="{{Request::path() == "employee" ? "current_page_item" : ""}}" href="/info-for-employee">Роботодавцям</a>
                </li>
                {{--                <li class="header-menu-item">--}}
                {{--                    <a class="{{Request::path() == "/" ? "current_page_item" : ""}}" href="/contact">Перенавчання</a>--}}
                {{--                </li>--}}
                <li class="header-menu-item">
                    <a class="{{Request::path() == "contact" ? "current_page_item" : ""}}" href="/contact">Контакти</a>
                </li>
                @auth
                    <li class="header-menu-item">
                        <a class="{{Request::path() == "account" ? "current_page_item" : ""}}" href="/my-account">Особиста
                            сторінка</a>
                    </li>
                @else
                    <li class="header-menu-item">
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Увійти</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="header-menu-item">
                            <a href="{{ route('register') }}"
                               class="text-sm text-gray-700 underline">Зареєструватись</a>
                        </li>
                    @endif
                @endauth
            </ul>
        </nav>
    </div>
</header>
<div class="content">
    <div class="container">
        @yield('content')
    </div>
</div>
<footer id="footer">
    <div class="footer-container">
        <div class="row">
            <div class="footer-section-item col">
                <div class="footer-section-item-logo logo">
                    <img src="/img/footer-logo.svg"
                         alt="">
                </div>
            </div>
            <div class="footer-section-item col">
                <div class="footer-section-item-content">
                    <ul>
                        <li><a href="/">Главная</a></li>
                        <li><a href="/">Безробітним</a></li>
                        <li><a href="/">Роботодавцям</a></li>
                        <li><a href="/">Контакти</a></li>
                        <li><a href="/">Особиста сторінка</a></li>

                    </ul>
                </div>
            </div>
            <div class="footer-section-item col">
                <div class="footer-section-item-title">
                    <h3>Контакты</h3>
                </div>
                <div class="footer-section-item-content">
                    <ul>
                        <li>+3940485865</li>
                        <li>+39834е5846</li>
                        <li>+3944548588</li>
                        <li>+3485768564</li>
                    </ul>
                </div>
            </div>
            <div class="footer-section-item col">
                <div class="footer-section-item-content d-flex flex-column">
                    <ul class="footer-section-item-content-social-media social-media d-flex justify-content-around">
                        <li>
                            <img src="src/img/facebook.svg"
                                 alt="facebook">
                        </li>
                        <li>
                            <img src="src/img/instagram.svg"
                                 alt="instagram">
                        </li>
                        <li>
                            <img src="src/img/github.svg"
                                 alt="github">
                        </li>
                    </ul>
                    <ul class="footer-section-item-content-social-media social-media d-flex justify-content-around">
                        <li><img
                                src="src/img/linkedin.svg"
                                alt="linkedin"></li>
                        <li><img
                                src="src/img/pinterest.svg"
                                alt="pinterest"></li>
                        <li><img
                                src="src/img/twitter.svg"
                                alt="twitter"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="/js/script.js"></script>
</body>

</html>
