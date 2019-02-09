@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')

    <div class="container broker-pa">
        <div class="broker-pa__header">
            <div class="columns is-multiline">
                <div class="column is-8-desktop is-12-tablet">
                    <h1 class="section-title mb-0-5">Сводные показатели</h1>
                </div>
                <div class="column is-4-desktop is-12-tablet">
                    <div class="buttons">
                        <button class="button is-outlined is-info is-size-875 has-text-weight-bold h-3 px-1">
                        <span class="icon">
                          <img src="/svg/icons/ic_lifesaver-2.svg" alt="" class="svg">
                        </span>
                            <span>Помощь</span>
                        </button>
                        {{--<div class="control has-icons-left has-icons-left_1">--}}
                        {{--<div class="input inputbox-val">--}}
                        {{--За последние 30 дней--}}
                        {{--</div>--}}
                        {{--<div class="icons is-left">--}}
                        {{--<span class="icon is-small">--}}
                        {{--<img src="/svg/icons/ic_calendar.svg" alt="" class="svg">--}}
                        {{--</span>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
        </div>

        <section>
            <!-- Swiper -->
            <div class="swiper-container swiper-broker-data-indicators">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">Показы</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                12 580
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">Показы</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                12 580
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">Appr. Leads</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                12 580
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">Целей оплачено</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                12 580
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">Показы</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                12 580
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">Показы</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                12 580
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">Показы</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                12 580
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">Показы</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                12 580
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">Показы</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                12 580
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">Показы</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                12 580
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">Показы</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                12 580
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">Показы</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                12 580
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next swiper-broker-data-indicators-next"></div>
                <div class="swiper-button-prev swiper-broker-data-indicators-prev"></div>
            </div>
        </section>

        <broker-summary-indicators></broker-summary-indicators>

        <section class="section is-paddingless content">
            <h3>Финансовые показатели</h3>
        </section>
    </div>
@endsection
