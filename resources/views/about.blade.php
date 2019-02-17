@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')

    <div class="about">
        <div class="container pt-1">
            <h1 class="section-title">О компании</h1>
        </div>
        <section class="section pt-1">
            <div class="container">
                <div class="columns is-multiline">
                    <div class="column is-8">
                        <h2 class="mb-1 has-text-left">Наша миссия</h2>
                        <div class="content">
                            <p>
                                «Участники модного рынка начали заблаговременно смотреть на возможности, а не просто
                                фокусироваться на предстоящих вызовах», — говорится в исследовании. Авторы ожидают, что
                                основной
                                импульс роста будет поступать с рынков люксовых товаров, а также от развивающихся рынков
                                в Азии.
                            </p>
                            <p>
                                В отрасли возникнут опасливые настроения из-за ослабления ключевых экономических
                                показателей и
                                других потенциально дестабилизирующих сил, ожидают в BoF и McKinsey. Представители
                                модной
                                индустрии начнут действовать осторожнее из-за опасений возможного замедления мировой
                                экономики к
                                2020 году и будут активнее изучать свои возможности для повышения производительности.
                            </p>
                        </div>
                    </div>
                    <div class="column is-4">
                        <div class="about__phrase">
                        <span class="has-text-weight-bold">
                            Мы помогаем предпринимателям делать правильные вложения средств. Именно это делает нас непобедимыми на рынке.
                        </span>
                        </div>
                    </div>
                    <div class="column is-7"><span class="about__count-clients">49 508</span></div>
                    <div class="column is-5">
                    <span class="about__count-clients-desc">
                        клиентов поверили в наши возможности и силы
                    </span>
                    </div>
                </div>
            </div>
        </section>
        <section class="section our-team">
            <div class="container">
                <h2 class="mb-2 has-text-left">Наша команда</h2>
                <div class="columns is-multiline">
                    <div class="column is-3">
                        <div class="our-team__item">
                            <figure class="mb-0-5">
                                <img src="https://s.pfst.net/2015.10/8515416672106b1d8b1dd45a0495f01e4b8a4d03b652_b.jpg"
                                     alt="">
                            </figure>
                            <h3>Станислав Суслов</h3>
                            <div class="team__item__position is-size-875 has-text-basic">
                                CEO, руководитель компании
                            </div>
                        </div>
                    </div>
                    <div class="column is-3">
                        <div class="our-team__item">
                            <figure class="mb-0-5">
                                <img src="https://s.pfst.net/2015.10/8515416672106b1d8b1dd45a0495f01e4b8a4d03b652_b.jpg"
                                     alt="">
                            </figure>
                            <h3>Станислав Суслов</h3>
                            <div class="team__item__position is-size-875 has-text-basic">
                                CEO, руководитель компании
                            </div>
                        </div>
                    </div>
                    <div class="column is-3">
                        <div class="our-team__item">
                            <figure class="mb-0-5">
                                <img src="https://s.pfst.net/2015.10/8515416672106b1d8b1dd45a0495f01e4b8a4d03b652_b.jpg"
                                     alt="">
                            </figure>
                            <h3>Станислав Суслов</h3>
                            <div class="team__item__position is-size-875 has-text-basic">
                                CEO, руководитель компании
                            </div>
                        </div>
                    </div>
                    <div class="column is-3">
                        <div class="our-team__item">
                            <figure class="mb-0-5">
                                <img src="https://s.pfst.net/2015.10/8515416672106b1d8b1dd45a0495f01e4b8a4d03b652_b.jpg"
                                     alt="">
                            </figure>
                            <h3>Станислав Суслов</h3>
                            <div class="team__item__position is-size-875 has-text-basic">
                                CEO, руководитель компании
                            </div>
                        </div>
                    </div>
                    <div class="column is-12">
                        <div class="has-text-centered">
                            <a href="#" class="button is-outlined is-info is-size-875 has-text-weight-bold h-3 px-1">Посмотреть
                                все ваканасии компании</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section">
            <div class="container">
                <div class="columns is-multiline">
                    <div class="column is-4">
                        <img src="/img/about-2.jpg" alt="">
                    </div>
                    <div class="column is-8">
                        <div class="content">
                            <h2 class="mb-2">Ценности и задачи</h2>
                            <p>
                                «Участники модного рынка начали заблаговременно смотреть на возможности, а не просто
                                фокусироваться на предстоящих вызовах», — говорится в исследовании. Авторы ожидают, что
                                основной импульс роста будет поступать с рынков люксовых товаров, а также от развивающихся
                                рынков в Азии.
                            </p>
                            <p>
                                В отрасли возникнут опасливые настроения из-за ослабления ключевых экономических показателей
                                и других потенциально дестабилизирующих сил, ожидают в BoF и McKinsey. Не так давно
                                появилась такая модная тенденция как стол-матрешка. Конечно, такие варианты были всегда, но
                                в последнее время такие решения стали очень популярны не только в маленьких квартирах.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
