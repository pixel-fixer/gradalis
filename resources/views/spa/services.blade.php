@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')
    <div class="container">
        <div class="columns">
            <div class="column is-4">
                @include('spa.aside')
            </div>
            <div class="column is-8">
                <section class="section pt-1 px-0">
                    <div class="notification-list">
                        <div class="notification is-success">
                            <button class="delete"></button>
                            <div class="notification__icon">
                                <img src="{{ asset('/svg/icons/notification/ic_thankyou.svg') }}" class="svg" alt="">
                            </div>
                            <div class="notification__content-wrap">
                                <h5 class="notification__title has-text-weight-bold">
                                    Спасибо за регистрацию!
                                </h5>
                                <div class="notification__content is-size-875">
                                    Добрый день, Андрей. Спасибо за регистрацию на нашем портале. Выбирайте продукты и
                                    начинайте продавать свой бизнес или франшизу.
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="section-title mb-1-75">Продукты</h1>
                    <div class="buttons buttons-services-list">
                        <button class="button is-outlined is-info is-size-875 has-text-weight-bold">Управление объявленем</button>
                        <button class="button is-outlined is-info is-size-875 has-text-weight-bold is-active">Помощь в продаже</button>
                        <button class="button is-outlined is-info is-size-875 has-text-weight-bold">Услуги и документы</button>
                    </div>
                    <div class="columns is-multiline">
                        <div class="column is-6">
                            <!-- Example Layout card service -->
                            <div class="card card-service">
                                <div class="card-service__body">
                                    <div class="is-flex">
                                        <figure class="card-service__icon">
                                            <img src="{{ asset('/svg/icons/services/ic_translate.svg') }}" alt="">
                                        </figure>
                                        <h4 class="card-service__title">Перевод документов</h4>
                                    </div>
                                    <div class="card-service__info">
                                        <div class="card-service__excerpt is-size-875">
                                            Наши специалисты переведут документы на английский и русский.
                                        </div>
                                        <div class="card-service__price">€15 за один перевод</div>
                                    </div>
                                </div>
                                <div class="card-service__footer">
                                    <a class="button is-warning is-outlined is-size-875 h-3">Заказать</a>
                                    <a class="button is-clear is-clear_close is-size-875 h-3"><span class="has-text-decoration-underline">Подробнее</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="column is-6">
                            <!-- Example Layout card service -->
                            <div class="card card-service">
                                <div class="card-service__body">
                                    <div class="is-flex">
                                        <figure class="card-service__icon">
                                            <img src="{{ asset('/svg/icons/services/ic_translate.svg') }}" alt="">
                                        </figure>
                                        <h4 class="card-service__title">Перевод документов</h4>
                                    </div>
                                    <div class="card-service__info">
                                        <div class="card-service__excerpt is-size-875">
                                            Наши специалисты переведут документы на английский и русский.
                                        </div>
                                        <div class="card-service__price">€15 за один перевод</div>
                                    </div>
                                </div>
                                <div class="card-service__footer">
                                    <a class="button is-warning is-outlined is-size-875 h-3">Заказать</a>
                                    <a class="button is-clear is-clear_close is-size-875 h-3"><span class="has-text-decoration-underline">Подробнее</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="column is-6">
                            <!-- Example Layout card service -->
                            <div class="card card-service">
                                <div class="card-service__body">
                                    <div class="is-flex">
                                        <figure class="card-service__icon">
                                            <img src="{{ asset('/svg/icons/services/ic_translate.svg') }}" alt="">
                                        </figure>
                                        <h4 class="card-service__title">Перевод документов</h4>
                                    </div>
                                    <div class="card-service__info">
                                        <div class="card-service__excerpt is-size-875">
                                            Наши специалисты переведут документы на английский и русский.
                                        </div>
                                        <div class="card-service__price">€15 за один перевод</div>
                                    </div>
                                </div>
                                <div class="card-service__footer">
                                    <a class="button is-warning is-outlined is-size-875 h-3">Заказать</a>
                                    <a class="button is-clear is-clear_close is-size-875 h-3"><span class="has-text-decoration-underline">Подробнее</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="column is-6">
                            <!-- Example Layout card service -->
                            <div class="card card-service">
                                <div class="card-service__body">
                                    <div class="is-flex">
                                        <figure class="card-service__icon">
                                            <img src="{{ asset('/svg/icons/services/ic_translate.svg') }}" alt="">
                                        </figure>
                                        <h4 class="card-service__title">Перевод документов</h4>
                                    </div>
                                    <div class="card-service__info">
                                        <div class="card-service__excerpt is-size-875">
                                            Наши специалисты переведут документы на английский и русский.
                                        </div>
                                        <div class="card-service__price">€15 за один перевод</div>
                                    </div>
                                </div>
                                <div class="card-service__footer">
                                    <a class="button is-warning is-outlined is-size-875 h-3">Заказать</a>
                                    <a class="button is-clear is-clear_close is-size-875 h-3"><span class="has-text-decoration-underline">Подробнее</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="column is-6">
                            <!-- Example Layout card service -->
                            <div class="card card-service">
                                <div class="card-service__body">
                                    <div class="is-flex">
                                        <figure class="card-service__icon">
                                            <img src="{{ asset('/svg/icons/services/ic_translate.svg') }}" alt="">
                                        </figure>
                                        <h4 class="card-service__title">Перевод документов</h4>
                                    </div>
                                    <div class="card-service__info">
                                        <div class="card-service__excerpt is-size-875">
                                            Наши специалисты переведут документы на английский и русский.
                                        </div>
                                        <div class="card-service__price">€15 за один перевод</div>
                                    </div>
                                </div>
                                <div class="card-service__footer">
                                    <a class="button is-warning is-outlined is-size-875 h-3">Заказать</a>
                                    <a class="button is-clear is-clear_close is-size-875 h-3"><span class="has-text-decoration-underline">Подробнее</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="column is-6">
                            <!-- Example Layout card service -->
                            <div class="card card-service">
                                <div class="card-service__body">
                                    <div class="is-flex">
                                        <figure class="card-service__icon">
                                            <img src="{{ asset('/svg/icons/services/ic_translate.svg') }}" alt="">
                                        </figure>
                                        <h4 class="card-service__title">Перевод документов</h4>
                                    </div>
                                    <div class="card-service__info">
                                        <div class="card-service__excerpt is-size-875">
                                            Наши специалисты переведут документы на английский и русский.
                                        </div>
                                        <div class="card-service__price">€15 за один перевод</div>
                                    </div>
                                </div>
                                <div class="card-service__footer">
                                    <a class="button is-warning is-outlined is-size-875 h-3">Заказать</a>
                                    <a class="button is-clear is-clear_close is-size-875 h-3"><span class="has-text-decoration-underline">Подробнее</span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
            </div>
        </div>
    </div>
@endsection
