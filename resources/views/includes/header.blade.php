<header class="header has-background-white">
    <div class="container">
        <nav class="navbar header__line-top is-flex">
            <div class="navbar-brand">
                <a class="navbar-item py-0" href="{{ url('/') }}">
                    <img src="{{ asset('/svg/logo.svg') }}" height="64"
                         alt="{{ config('app.name', 'Laravel') }}">
                </a>
            {{--<div class="navbar-item navbar-contacts is-hidden-mobile">--}}
            {{--<a href="tel:8800202470" class="navbar-contacts__phone">8 800 2024 70</a>--}}
            {{--<div class="navbar-contacts__worktime">Работаем с 10:00 до 20:00</div>--}}
            {{--</div>--}}

            <!-- ToDo: Show only in Broker Personal Area -->
                @auth
                    {{-- @if(Auth::user()->user_id) --}}
                    @if(false)
                        <div class="navbar-item is-hidden-touch">
                            <div class="manager is-flex">
                                @if(Auth::user()->user->avatar)
                                    <figure class="manager__avatar">
                                        <img src="{{Auth::user()->user->avatar}}">
                                    </figure>
                                @endif
                                <div class="manager__info">
                                    <div class="manager__name has-text-weight-bold">
                                        {{Auth::user()->hasAnyRole(['Account-manager', 'Media buyer'])}}
                                        @if(Auth::user()->hasAnyRole(['Account-manager', 'Media buyer']))
                                            Ваш менеджер:
                                        @elseif(Auth::user()->hasAnyRole(['Покупатель', 'Продавец']))
                                            Ваш брокер:
                                        @endif
                                        {{Auth::user()->user->first_name}}
                                    </div>
                                    <div class="is-flex">
                                        @if(Auth::user()->user->phone)
                                            <a href="#" class="manager__phone is-size-875">
                                                <img src="/svg/icons/ic_call.svg" alt="" class="svg">
                                                <span>{{Auth::user()->user->phone}}</span>
                                            </a>
                                        @endif
                                        <a href="/profile/chat/new-dialog/{{Auth::user()->user->id}}"
                                           class="manager__chat is-size-875"><img src="/svg/icons/chat/ic_person.svg"
                                                                                  alt="" class="svg"><span>Написать в чат</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endauth
                @if(Auth::check() && (Auth::user()->hasRole('Продавец') || Auth::user()->hasRole('Покупатель')))
                    <div class="navbar-item is-hidden-touch">
                        <div class="manager is-flex">
                            <figure class="manager__avatar">
                                <img src="https://image.freepik.com/free-photo/no-translate-detected_23-2147650966.jpg"
                                     alt="">
                            </figure>
                            <div class="manager__info">
                                <div class="manager__name has-text-weight-bold">Ваш менеджер: Ирина</div>
                                <div class="is-flex">
                                    <a href="#" class="manager__phone is-size-875"><img src="/svg/icons/ic_call.svg"
                                                                                        alt=""
                                                                                        class="svg"><span>+38 (450) 566-56-43</span></a>
                                    <a href="#" class="manager__chat is-size-875"><img
                                            src="/svg/icons/chat/ic_person.svg"
                                            alt="" class="svg"><span>Написать в чат</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>


            <div class="navbar-end">
                <!-- Authentication Links -->
                @guest
                    <div class="navbar-item is-flex">
                        <a class="navbar-item rounded"
                           v-tooltip.bottom-center="'Чтобы добавить в избранное, нужно авторизоваться'">
                            <img src="{{ asset('/svg/icons/ic_favorites.svg') }}" alt="Fav">
                        </a>
                        <a class="navbar-item basic login" href="{{ route('login') }}"><img
                                src="{{ asset('/svg/icons/ic_login.svg') }}" alt="Login"><span
                                class="is-hidden-tablet-only">{{ __('Login') }}</span></a>
                        <div class="buttons has-addons buttons-business is-hidden-mobile">
                            <a href="/register/seller" class="button is-link" data-desc="Регистрация">Купить бизнес</a>
                            <a href="/register/seller" class="button is-warning" data-desc="Регистрация">Продать
                                бизнес</a>
                        </div>
                    </div>
                @else
                    <div class="navbar-item is-paddingless">
                        <a class="navbar-item rounded">
                            <img src="{{ asset('/svg/icons/ic_notifications.svg') }}" alt="Not">
                            @unless(Auth::user()->unreadNotifications)
                                <span
                                    class="tag is-danger is-rounded tag__count">{{count(Auth::user()->unreadNotifications)}}</span>
                            @endunless
                        </a>
                        <a href="/profile/favorites" class="navbar-item rounded"><img
                                src="{{ asset('/svg/icons/ic_favorites.svg') }}"
                                alt="Fav"></a>
                        @php
                            $url = '/profile';
                            if(auth()->user()->hasRole('Акаунт-менеджер')){
                                $url = '/account';
                            }
                        @endphp
                        <div class="dropdown is-right is-hoverable">
                            <div class="dropdown-trigger">
                                <a href="{{$url}}" class="navbar-item basic user">
                                    <img src="{{ (Auth::user()->avatar) ?: asset('/svg/icons/ic_login.svg') }}"
                                         aria-haspopup="true"
                                         aria-controls="dropdown-user-menu"><span
                                        class="is-hidden-mobile">{{ Auth::user()->full_name }}</span></a>
                            </div>
                            <div class="dropdown-menu" id="dropdown-user-menu" role="menu">
                                <div class="dropdown-content is-paddingless">

                                    <a class="dropdown-item" href="{{$url}}">Личный кабинет</a>
                                    <hr class="dropdown-divider is-marginless">
                                    <a class="dropdown-item" href="/profile/chat">Сообщения</a>
                                    <hr class="dropdown-divider is-marginless">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Выйти
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">@csrf</form>
                                </div>
                            </div>
                        </div>
                        {{--<a href="/profile" class="navbar-item basic user"><img src="{{ Auth::user()->avatar }}"--}}
                        {{--alt="User"><span--}}
                        {{--class="is-hidden-mobile">{{ Auth::user()->full_name }}</span></a>--}}
                        <a href="/profile/balance" class="navbar-item basic is-hidden-mobile"><img
                                src="{{ asset('/svg/icons/ic_balance.svg') }}"
                                alt="Balance"><span>${{ Auth::user()->balance }}</span></a>

                        <a class="navbar-item basic is-hidden-tablet" v-tooltip.left-start="{
                                                            content: '$100',
                                                            trigger: 'click',
                                                    }">
                            <img src="{{ asset('/svg/icons/ic_balance.svg') }}"
                                 alt="Balance"></a>

                        {{--<a class="navbar-item basic" href="{{ route('logout') }}" onclick="event.preventDefault();--}}
                        {{--document.getElementById('logout-form').submit();"><img--}}
                        {{--src="{{ asset('/svg/icons/ic_login.svg') }}" alt="Login"><span>{{ __('Logout') }}</span></a>--}}
                        {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                        {{--@csrf--}}
                        {{--</form>--}}
                    </div>
                @endguest

            </div>
        </nav>
    </div>
    <div class="navbar-divider is-block"></div>
    <div class="container">

    <!-- ToDo: Other menu in Broker Personal Area -->
    @if(Auth::check() && !Auth::user()->hasRole('Медиа-баер') && !Auth::user()->hasRole('Акаунт-менеджер'))
        <!-- Desktop Menu-->
            <nav class="navbar header__line-bottom is-hidden-touch" role="navigation" aria-label="main navigation">
                <div class="navbar-start main-menu">
                    <a class="navbar-item is-active">
                        <img src="{{ asset('/svg/icons/ic_home.svg') }}" alt="Home" class="icon"><span>Главная</span>
                    </a>
                    <a href="{{ route('business.index') }}" class="navbar-item">
                        <img src="{{ asset('/svg/icons/ic_business.svg') }}" alt="Business"
                             class="icon"><span>Бизнес</span>
                    </a>
                    <a class="navbar-item">
                        <img src="{{ asset('/svg/icons/ic_franchise.svg') }}" alt="Franchise"
                             class="icon"><span>Франшизы</span>
                    </a>
                    <a href="/services-new" class="navbar-item">
                        <img src="{{ asset('/svg/icons/ic_product.svg') }}" alt="Product" class="icon"><span>Продукты компании</span>
                    </a>
                    <a href="/news" class="navbar-item">
                        <img src="{{ asset('/svg/icons/ic_news.svg') }}" alt="News" class="icon"><span>Новости</span>
                    </a>

                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            <img src="{{ asset('/svg/icons/ic_about.svg') }}" alt="About"
                                 class="icon"><span>О компании</span>
                        </a>

                        <div class="navbar-dropdown">
                            <a href="/about" class="navbar-item">
                                О компании
                            </a>
                            <a href="/contacts" class="navbar-item">
                                Контакты
                            </a>
                            <a href="/vacancy" class="navbar-item">
                                Вакансии
                            </a>
                            <a href="/reviews" class="navbar-item">
                                Отзывы
                            </a>
                            <a href="/help" class="navbar-item">
                                Помощь
                            </a>
                        </div>
                    </div>
                </div>

                <div class="navbar-end">
                    @include('includes.navbar-lang-desktop')
                </div>
            </nav>

            <!-- Tablet and mobile Menu-->
            <div class="header__line-bottom header__line-bottom_mobile is-flex is-hidden-desktop">

                <div class="dropdown is-left navbar-item navbar-main-menu main-menu">

                    <div class="dropdown-trigger">
                        <div class="navbar-link navbar-item" aria-haspopup="true"
                             aria-controls="dropdown-menu-main-mobile">
                            <img src="{{ asset('/svg/icons/ic_home.svg') }}" alt="Home"
                                 class="icon"><span>Главная</span>
                        </div>
                    </div>
                    <div class="dropdown-menu" id="dropdown-menu-main-mobile" role="menu">
                        <div class="dropdown-content">
                            <a href="#" class="dropdown-item navbar-item">
                                <img src="{{ asset('/svg/icons/ic_home.svg') }}" alt="Home"
                                     class="icon"><span>Главная</span>
                            </a>
                            <a href="#" class="dropdown-item navbar-item">
                                <img src="{{ asset('/svg/icons/ic_home.svg') }}" alt="Home"
                                     class="icon"><span>Главная</span>
                            </a>
                            <a href="#" class="dropdown-item navbar-item">
                                <img src="{{ asset('/svg/icons/ic_home.svg') }}" alt="Home"
                                     class="icon"><span>Главная</span>
                            </a>

                            <div class="dropdown is-left dropdown-item navbar-item">

                                <div class="dropdown-trigger">
                                    <div class="navbar-link">
                                        <img src="{{ asset('/svg/icons/ic_home.svg') }}" alt="Home"
                                             class="icon"><span>О компании</span>
                                    </div>
                                </div>
                                <div class="dropdown-menu">
                                    <div class="dropdown-content">
                                        <a href="#" class="dropdown-item navbar-item">
                                            <img src="{{ asset('/svg/icons/ic_home.svg') }}" alt="Home"
                                                 class="icon"><span>О компании 1</span>
                                        </a>
                                        <a href="#" class="dropdown-item navbar-item">
                                            <img src="{{ asset('/svg/icons/ic_home.svg') }}" alt="Home"
                                                 class="icon"><span>О компании 2</span>
                                        </a>
                                        <a href="#" class="dropdown-item navbar-item">
                                            <img src="{{ asset('/svg/icons/ic_home.svg') }}" alt="Home"
                                                 class="icon"><span>О компании 3</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                @include('includes.navbar-lang-mobile')

            </div>
    @endif

    @if(Auth::check() && (Auth::user()->hasRole('Медиа-баер') || Auth::user()->hasRole('Акаунт-менеджер')))
        <!-- Desktop Menu Broker-->
            <nav class="navbar header__line-bottom is-hidden-touch" role="navigation" aria-label="main navigation">
                <div class="navbar-start main-menu">
                    @if(Auth::user()->hasRole('Акаунт-менеджер'))
                        <a href="/account" class="navbar-item ">
                            <img src="{{ asset('/svg/icons/ic_partners.svg') }}"
                                 class="icon"><span>Партнеры</span>
                        </a>
                    @endif

                    <a href="/broker/realtime" class="navbar-item">
                        <img src="{{ asset('/svg/icons/ic_real_stats.svg') }}" class="icon"><span>Статистика</span>
                    </a>
                    <a href="/broker/web-offers" class="navbar-item">
                        <img src="{{ asset('/svg/icons/ic_offers.svg') }}"
                             class="icon"><span>Офферы</span>
                    </a>
                    <a href="/broker/leads" class="navbar-item">
                        <img src="{{ asset('/svg/icons/ic_leads.svg') }}" class="icon"><span>Лиды</span>
                    </a>
                    <a href="/broker/chat" class="navbar-item">
                        <img src="{{ asset('/svg/icons/ic_messages.svg') }}" class="icon"><span>Сообщения</span>
                    </a>
                    <a href="/broker/settings" class="navbar-item">
                        <img src="{{ asset('/svg/icons/ic_profile_settings.svg') }}" class="icon"><span>Настройки</span>
                    </a>


                </div>

                <div class="navbar-end">
                    @include('includes.navbar-lang-desktop')
                </div>
            </nav>

            <!-- Tablet and mobile Menu-->
            <div class="header__line-bottom header__line-bottom_mobile is-flex is-hidden-desktop"
                 style="display: none !important;">

                <div class="dropdown is-left navbar-item navbar-main-menu main-menu">

                    <div class="dropdown-trigger">
                        <div class="navbar-link navbar-item" aria-haspopup="true"
                             aria-controls="dropdown-menu-main-mobile">
                            <img src="{{ asset('/svg/icons/ic_complete_stat.svg') }}"
                                 class="icon"><span>Сводные показатели</span>
                        </div>
                    </div>
                    <div class="dropdown-menu" id="dropdown-menu-main-mobile" role="menu">
                        <div class="dropdown-content">
                            <a class="dropdown-item navbar-item">
                                <img src="{{ asset('/svg/icons/ic_real_stats.svg') }}"
                                     class="icon"><span>Статистика</span>
                            </a>
                            <a class="dropdown-item navbar-item">
                                <img src="{{ asset('/svg/icons/ic_offers.svg') }}"
                                     class="icon"><span>Офферы</span>
                            </a>
                            <a class="dropdown-item navbar-item">
                                <img src="{{ asset('/svg/icons/ic_leads.svg') }}" class="icon"><span>Лиды</span>
                            </a>
                            <a class="dropdown-item navbar-item">
                                <img src="{{ asset('/svg/icons/ic_messages.svg') }}" class="icon"><span>Сообщения</span>
                            </a>
                            <a class="dropdown-item navbar-item">
                                <img src="{{ asset('/svg/icons/ic_profile_settings.svg') }}"
                                     class="icon"><span>Настройки</span>
                            </a>

                        </div>
                    </div>
                </div>


                <div class="navbar-end">
                    @include('includes.navbar-lang-mobile')
                </div>

            </div>
        @endif
    </div>

    @guest
        <div class="container">
            <nav class="navbar header__line-bottom is-hidden-touch" role="navigation" aria-label="main navigation">
                <div class="navbar-start main-menu">
                    <a class="navbar-item is-active">
                        <img src="{{ asset('/svg/icons/ic_home.svg') }}" alt="Home" class="icon"><span>Главная</span>
                    </a>
                    <a href="{{ route('business.index') }}" class="navbar-item">
                        <img src="{{ asset('/svg/icons/ic_business.svg') }}" alt="Business"
                             class="icon"><span>Бизнес</span>
                    </a>
                    <a class="navbar-item">
                        <img src="{{ asset('/svg/icons/ic_franchise.svg') }}" alt="Franchise"
                             class="icon"><span>Франшизы</span>
                    </a>
                    <a href="/services-new" class="navbar-item">
                        <img src="{{ asset('/svg/icons/ic_product.svg') }}" alt="Product" class="icon"><span>Продукты компании</span>
                    </a>
                    <a href="/news" class="navbar-item">
                        <img src="{{ asset('/svg/icons/ic_news.svg') }}" alt="News" class="icon"><span>Новости</span>
                    </a>

                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            <img src="{{ asset('/svg/icons/ic_about.svg') }}" alt="About"
                                 class="icon"><span>О компании</span>
                        </a>

                        <div class="navbar-dropdown">
                            <a href="/about" class="navbar-item">
                                О компании
                            </a>
                            <a href="/contacts" class="navbar-item">
                                Контакты
                            </a>
                            <a href="/vacancy" class="navbar-item">
                                Вакансии
                            </a>
                            <a href="/reviews" class="navbar-item">
                                Отзывы
                            </a>
                            <a href="/help" class="navbar-item">
                                Помощь
                            </a>
                        </div>
                    </div>
                </div>

                <div class="navbar-end">
                    @include('includes.navbar-lang-desktop')
                </div>
            </nav>

            <!-- Tablet and mobile Menu-->
            <div class="header__line-bottom header__line-bottom_mobile is-flex is-hidden-desktop">

                <div class="dropdown is-left navbar-item navbar-main-menu main-menu">

                    <div class="dropdown-trigger">
                        <div class="navbar-link navbar-item" aria-haspopup="true"
                             aria-controls="dropdown-menu-main-mobile">
                            <img src="{{ asset('/svg/icons/ic_home.svg') }}" alt="Home"
                                 class="icon"><span>Главная</span>
                        </div>
                    </div>
                    <div class="dropdown-menu" id="dropdown-menu-main-mobile" role="menu">
                        <div class="dropdown-content">
                            <a href="#" class="dropdown-item navbar-item">
                                <img src="{{ asset('/svg/icons/ic_home.svg') }}" alt="Home"
                                     class="icon"><span>Главная</span>
                            </a>
                            <a href="#" class="dropdown-item navbar-item">
                                <img src="{{ asset('/svg/icons/ic_home.svg') }}" alt="Home"
                                     class="icon"><span>Главная</span>
                            </a>
                            <a href="#" class="dropdown-item navbar-item">
                                <img src="{{ asset('/svg/icons/ic_home.svg') }}" alt="Home"
                                     class="icon"><span>Главная</span>
                            </a>

                            <div class="dropdown is-left dropdown-item navbar-item">

                                <div class="dropdown-trigger">
                                    <div class="navbar-link">
                                        <img src="{{ asset('/svg/icons/ic_home.svg') }}" alt="Home"
                                             class="icon"><span>О компании</span>
                                    </div>
                                </div>
                                <div class="dropdown-menu">
                                    <div class="dropdown-content">
                                        <a href="#" class="dropdown-item navbar-item">
                                            <img src="{{ asset('/svg/icons/ic_home.svg') }}" alt="Home"
                                                 class="icon"><span>О компании 1</span>
                                        </a>
                                        <a href="#" class="dropdown-item navbar-item">
                                            <img src="{{ asset('/svg/icons/ic_home.svg') }}" alt="Home"
                                                 class="icon"><span>О компании 2</span>
                                        </a>
                                        <a href="#" class="dropdown-item navbar-item">
                                            <img src="{{ asset('/svg/icons/ic_home.svg') }}" alt="Home"
                                                 class="icon"><span>О компании 3</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="navbar-end">
                    @include('includes.navbar-lang-mobile')
                </div>

            </div>
        </div>
        <div class="buttons has-addons buttons-business buttons-business_mobile is-hidden-tablet">
            <a class="button is-link" data-desc="Регистрация">Купить бизнес</a>
            <a class="button is-warning" data-desc="Регистрация">Продать бизнес</a>
        </div>
    @endguest

</header>
