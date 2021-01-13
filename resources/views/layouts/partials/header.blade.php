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
                    <a class="{{Request::path() == "allowance" ? "current_page_item" : ""}}"
                       href="/info-for-unemployed">Безробітним</a>
                </li>
                <li class="header-menu-item">
                    <a class="{{Request::path() == "employer" ? "current_page_item" : ""}}" href="/info-for-employer">Роботодавцям</a>
                </li>
                {{--                <li class="header-menu-item">--}}
                {{--                    <a class="{{Request::path() == "/" ? "current_page_item" : ""}}" href="/contact">Перенавчання</a>--}}
                {{--                </li>--}}
                {{--                <li class="header-menu-item">--}}
                {{--                    <a class="{{Request::path() == "contact" ? "current_page_item" : ""}}" href="/contact">Контакти</a>--}}
                {{--                </li>--}}
                @auth
                    <li class="header-menu-item">
                        <a
                            class="option-list-toggle-btn {{Request::path() == "account" ? "current_page_item" : ""}}">{{ Auth::user()->name }}</a>
                        <ul class="option-list-toggle">
                            <li><a href="/my-account">Особисті дані</a></li>
                            @if(Auth::user()->type === "unemployed")
                                <li><a href="/record-of-services">Мій послужний список</a></li>
                                <li><a href="/allowance/create">Оформити заявку на отримання допомоги</a></li>
                                @if(Auth::user()->unemployed->allowance->count())
                                    <li><a href="/my-allowances">Мої заявки на отримання пособія</a></li>
                                    <li><a href="/cv/create">Додати резюме</a></li>
                                    <li><a href="/my-cv">Мої резюме</a></li>
                                    <li><a href="/job-offer">Відгуки від роботодавців</a></li>

                                @endif
                                {{--                <li><a href="">Відгуки від роботодавців</a></li>--}}
                            @elseif(Auth::user()->type === "employer")
                                <li><a href="/vacancy/create">Додати вакансію</a></li>
                                <li><a href="/my-vacancies">Мої вакансії</a></li>
                                {{--                <li><a href="">Відгуки від робітників</a></li>--}}
                            @endif
                            <li><a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Вийти</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
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
