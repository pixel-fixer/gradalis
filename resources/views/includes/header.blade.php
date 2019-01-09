<header class="header has-background-white">
    <div class="container">
        <nav class="navbar header__line-top">
            <div class="navbar-brand">
                <a class="navbar-item" href="{{ url('/') }}">
                    <img src="{{ asset('/svg/logo.svg') }}" width="155" height="48"
                         alt="{{ config('app.name', 'Laravel') }}">
                </a>
                <div class="navbar-item navbar-contacts">
                    <a href="tel:8800202470" class="navbar-contacts__phone">8 800 2024 70</a>
                    <div class="navbar-contacts__worktime">Работаем с 10:00 до 20:00</div>
                </div>
            </div>


            <div class="navbar-end">
                <!-- Authentication Links -->
                @guest
                    <div class="navbar-item is-paddingless">
                        <a class="navbar-item rounded"><img src="{{ asset('/svg/icons/ic_favorites.svg') }}"
                                                            alt="Fav"></a>
                        <a class="navbar-item basic login" href="{{ route('login') }}"><img
                                src="{{ asset('/svg/icons/ic_login.svg') }}" alt="Login"><span>{{ __('Login') }}</span></a>
                        <div class="buttons has-addons buttons-business">
                            <a class="button is-link" data-desc="Регистрация">Купить бизнес</a>
                            <a class="button is-warning" data-desc="Регистрация">Продать бизнес</a>
                        </div>
                    </div>
                @else
                    <div class="navbar-item is-paddingless">
                        <a class="navbar-item rounded">
                            <img src="{{ asset('/svg/icons/ic_notifications.svg') }}" alt="Not">
                            <span class="tag is-danger is-rounded tag__count">12</span>
                        </a>
                        <a class="navbar-item rounded"><img src="{{ asset('/svg/icons/ic_favorites.svg') }}"
                                                            alt="Fav"></a>
                        <a class="navbar-item basic user"><img src="{{ asset('/img/avatar-1.png') }}"
                                                               alt="User"><span>User Name</span></a>
                        <a class="navbar-item basic"><img src="{{ asset('/svg/icons/ic_balance.svg') }}"
                                                          alt="Balance"><span>$100</span></a>
                        <a class="navbar-item basic" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><img
                                src="{{ asset('/svg/icons/ic_login.svg') }}" alt="Login"><span>{{ __('Logout') }}</span></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                @endguest

            </div>
        </nav>
    </div>
    <div class="navbar-divider"></div>
    <div class="container">
        <nav class="navbar header__line-bottom" role="navigation" aria-label="main navigation">
            <div class="navbar-start main-menu">
                <a class="navbar-item is-active">
                    <img src="{{ asset('/svg/icons/ic_home.svg') }}" alt="Home" class="icon"><span>Главная</span>
                </a>
                <a class="navbar-item">
                    <img src="{{ asset('/svg/icons/ic_business.svg') }}" alt="Business" class="icon"><span>Бизнес</span>
                </a>
                <a class="navbar-item">
                    <img src="{{ asset('/svg/icons/ic_franchise.svg') }}" alt="Franchise"
                         class="icon"><span>Франшизы</span>
                </a>
                <a class="navbar-item">
                    <img src="{{ asset('/svg/icons/ic_product.svg') }}" alt="Product" class="icon"><span>Продукты компании</span>
                </a>
                <a class="navbar-item">
                    <img src="{{ asset('/svg/icons/ic_news.svg') }}" alt="News" class="icon"><span>Новости</span>
                </a>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        <img src="{{ asset('/svg/icons/ic_about.svg') }}" alt="About"
                             class="icon"><span>О компании</span>
                    </a>

                    <div class="navbar-dropdown">
                        <a class="navbar-item">
                            About
                        </a>
                        <a class="navbar-item">
                            Jobs
                        </a>
                        <a class="navbar-item">
                            Contact
                        </a>
                        <hr class="navbar-divider">
                        <a class="navbar-item">
                            Report an issue
                        </a>
                    </div>
                </div>
            </div>

            <div class="navbar-end">
                <div class="navbar-item has-dropdown is-hoverable navbar-lang">
                    <a class="navbar-link">
                        <img src="{{ asset('/svg/icons/ic_flag_russian.svg') }}" alt="Lang"
                             class="icon"><span>Русский</span>
                    </a>

                    <div class="navbar-dropdown">
                        <a class="navbar-item">
                            <img src="{{ asset('/svg/icons/ic_flag_russian.svg') }}" alt="Lang" class="icon"><span>Русский</span>
                        </a>
                        <a class="navbar-item">
                            <img src="{{ asset('/svg/icons/ic_flag_russian.svg') }}" alt="Lang" class="icon"><span>Русский</span>
                        </a>
                        <a class="navbar-item">
                            <img src="{{ asset('/svg/icons/ic_flag_russian.svg') }}" alt="Lang" class="icon"><span>Русский</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </div>

</header>
