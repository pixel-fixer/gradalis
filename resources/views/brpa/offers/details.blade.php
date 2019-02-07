@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')

    <div class="container broker-pa">
        <div class="broker-pa__header">
            <div class="columns is-multiline">
                <div class="column is-8-desktop is-12-tablet">
                    <h1 class="section-title mb-0-5">Банк Хоум Кредит: Дебетовая карта Польза</h1>
                    <div class="broker-pa__id">ID: 2556</div>
                </div>
                <div class="column is-4-desktop is-12-tablet">
                    <div class="buttons">
                        <button class="button is-outlined is-info is-size-875 has-text-weight-bold h-3 px-1">
                        <span class="icon">
                          <img src="/svg/icons/ic_lifesaver-2.svg" alt="" class="svg">
                        </span>
                            <span>Помощь</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        @include('brpa.offers.nav')

        <section class="section is-paddingless content">
            <div class="box broker-pa__details">
                <div class="columns is-multiline">
                    <div class="column is-3">
                        <figure class="broker-pa__details__thumb">
                            <img src="https://photo.hotellook.com/image_v2/crop/2272683466/1200/630.auto" alt="">
                        </figure>
                        <button class="button is-info h-3 is-size-875 is-fullwidth has-text-weight-bold mb-1"
                                @click="showModal('modal-create-offer-link')">
                            <span class="icon">
                                 <img src="/svg/icons/ic_connect_offer.svg" alt="" class="svg">
                            </span>
                            <span>Подключить оффер</span>
                        </button>
                        <div class="has-text-grey-light is-size-875 broker-pa__details__add-offer-desc">
                            <i>Кликните, что бы получить доступ к инструментам</i>
                        </div>

                        <!-- Modal -->
                        <broker-offers-modal-create-link></broker-offers-modal-create-link>

                    </div>
                    <div class="column is-9">
                        <h3>Основная информация</h3>
                        <div class="broker-pa__details__main-info is-size-875">
                            <div class="broker-pa__details__main-info__item">
                                <span>Статус</span>
                                <span>Базовый</span>
                            </div>
                            <div class="broker-pa__details__main-info__item">
                                <span>Сайт</span>
                                <span>
                                   <a href="#" class="link-with-icon">
                                       <img src="http://marketplacenew.local/svg/icons/ic_details.svg">
                                       <span class="has-text-decoration-underline">https://www.homecredit.ru</span></a>
                                </span>
                            </div>
                            <div class="broker-pa__details__main-info__item">
                                <span>Время одобрения (в днях):</span>
                                <span>30</span>
                            </div>
                            <div class="broker-pa__details__main-info__item">
                                <span>Время оплаты (в днях):</span>
                                <span>10</span>
                            </div>
                            <div class="broker-pa__details__main-info__item">
                                <span>Cookie LTV (дней):</span>
                                <span>30</span>
                            </div>
                            <div class="broker-pa__details__main-info__item">
                                <span>Страна офиса:</span>
                                <span>Россия</span>
                            </div>
                        </div>
                        <hr>
                        <h3>Описание оффера</h3>
                        <p>
                            Банк Хоум Кредит занимает лидерские позиции на рынке финансовой розницы России. Входит в
                            ТОП-10 по кредитам физическим лицам, занимает первое место на рынке потребительских кредитов
                            в точках продаж.
                        </p>
                        <p style="font-weight: bold;">
                            Тариф дебетовой карты "Польза":
                        </p>
                        <ul>
                            <li>7% — при остатке менее 300000 ₽ и совершении покупок на сумму не менее 5000 ₽. в мес.
                            </li>
                            <li>3% — на сумму превышения 300000 ₽ и совершении покупок на сумму не менее 5000 ₽ в мес.
                            </li>
                            <li>0 % — в остальных случаях, выплачиваются ежемесячно.</li>
                            <li>за получение наличных в любых банкоматах и кассах других банков по первым пяти операциям
                                в мес. РП длится в течение календарного месяца с первого и по последнее число.
                            </li>
                        </ul>
                        <hr>
                        <p>
                            <a href="#" class="link-more is-size-875"><span class="has-text-decoration-underline">Полные условия программы</span>
                                <span class="icon icon-1"><img src="/svg/icons/ic_arrow.svg" alt="" class="svg"></span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
