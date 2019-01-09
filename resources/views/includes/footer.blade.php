<footer class="footer">
    <div class="container">
        <div class="columns">
            <div class="column is-3">
                <a class="footer__logo" href="{{ url('/') }}">
                    <img src="{{ asset('/svg/logo.svg') }}" width="155" height="48"
                         alt="{{ config('app.name', 'Laravel') }}">
                </a>
                <div class="footer__contacts">
                    <a href="tel:8800202470" class="footer__contacts__phone">8 800 2024 70</a>
                    <div class="footer__contacts__worktime">Работаем с 10:00 до 20:00</div>
                </div>
                <div class="footer__socials">
                    <ul>
                        <li>
                            <a href="#" target="_blank" class="fb">
                                <img src="{{ asset('/svg/icons/socials/ic_facebook.svg') }}" alt="Facebook">
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank" class="ok">
                                <img src="{{ asset('/svg/icons/socials/ic_ok.svg') }}" alt="Ok">
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank" class="yt">
                                <img src="{{ asset('/svg/icons/socials/ic_youtube.svg') }}" alt="Youtube">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="column is-9">
                <div class="columns footer__nav">
                    <div class="column is-3">
                        <ul>
                            <li class="cat-title">
                                <a href="#">Бизнес</a>
                            </li>
                            <li>
                                <a href="#">Продать бизнес</a>
                            </li>
                            <li>
                                <a href="#">Купить бизнес</a>
                            </li>
                            <li>
                                <a href="#">Индивидуальная консультация</a>
                            </li>
                        </ul>
                    </div>
                    <div class="column is-3">
                        <ul>
                            <li class="cat-title">
                                <a href="#">Франшизы</a>
                            </li>
                            <li>
                                <a href="#">Продать бизнес</a>
                            </li>
                            <li>
                                <a href="#">Купить бизнес</a>
                            </li>
                            <li>
                                <a href="#">Индивидуальная консультация</a>
                            </li>
                        </ul>
                    </div>
                    <div class="column is-3">
                        <ul>
                            <li class="cat-title">
                                <a href="#">Продукты компании</a>
                            </li>
                            <li>
                                <a href="#">Продукты для продавцов</a>
                            </li>
                            <li>
                                <a href="#">Продукты для покупателей</a>
                            </li>
                            <li>
                                <a href="#">Инвестирование</a>
                            </li>
                        </ul>
                    </div>
                    <div class="column is-3">
                        <ul>
                            <li class="cat-title">
                                <a href="#">О компании</a>
                            </li>
                            <li>
                                <a href="#">Информация</a>
                            </li>
                            <li>
                                <a href="#">Отзывы</a>
                            </li>
                            <li>
                                <a href="#">Контакты</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="columns">
                    <div class="column is-12">
                        <div class="footer__info">
                            Предоставленные на сайте данные имеют информационный характер и не являются
                            публичной офертой.<br>© 2019 «Invest.pl», официальный сайт
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
