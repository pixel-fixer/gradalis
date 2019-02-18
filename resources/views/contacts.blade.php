@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')

    <div class="about">
        <section class="section pt-1 pb-0">
            <div class="container">
                <h1 class="section-title mb-1">Контакты</h1>
            </div>
        </section>
        <section class="section pt-1">
            <div class="container contacts">
                <div class="columns is-multiline">
                    <div class="column is-6">
                        <div class="contacts__item">
                            <div class="columns is-multiline">
                                <div class="column is-6">
                                    <div class="is-flex has-align-items-center">
                                     <span class="icon icon-1 mr-0-5">
                                        <img src="{{ asset('/svg/icons/ic_phone.svg') }}" class="svg">
                                     </span>
                                        <span class="is-size-875 has-text-weight-bold">По всем вопросам</span>
                                    </div>
                                </div>
                                <div class="column is-6">
                                    <div>
                                        <a href="#" class="has-text-weight-bold has-text-info">8 800 2024 70</a>
                                        <div class="contacts__item__desc is-size-875">Работаем с 10:00 до 20:00</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="contacts__item">
                            <div class="columns is-multiline">
                                <div class="column is-6">
                                    <div class="is-flex has-align-items-center">
                                     <span class="icon icon-1 mr-0-5">
                                        <img src="{{ asset('/svg/icons/ic_phone.svg') }}" class="svg">
                                     </span>
                                        <span class="is-size-875 has-text-weight-bold">Локальный телефон</span>
                                    </div>
                                </div>
                                <div class="column is-6">
                                    <div>
                                        <a href="#" class="has-text-weight-bold has-text-info">+7 (495) 567-53-76</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="contacts__item">
                            <div class="columns is-multiline">
                                <div class="column is-6">
                                    <div class="is-flex has-align-items-center">
                                     <span class="icon icon-1 mr-0-5">
                                        <img src="{{ asset('/svg/icons/ic_mail.svg') }}" class="svg">
                                     </span>
                                        <span class="is-size-875 has-text-weight-bold">Контактный email</span>
                                    </div>
                                </div>
                                <div class="column is-6">
                                    <div>
                                        <a href="#" class="is-size-875 has-text-info has-text-decoration-underline">info@invest.pl</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="contacts__item">
                            <div class="columns is-multiline">
                                <div class="column is-6">
                                    <div class="is-flex has-align-items-center">
                                     <span class="icon icon-1 mr-0-5">
                                        <img src="{{ asset('/svg/icons/ic_security.svg') }}" class="svg">
                                     </span>
                                        <span class="is-size-875 has-text-weight-bold">Отдел безопасности</span>
                                    </div>
                                </div>
                                <div class="column is-6">
                                    <div>
                                        <a href="#" class="is-size-875 has-text-info has-text-decoration-underline">security@invest.pl</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="column is-6">
                        <div class="contacts__item">
                            <div class="columns is-multiline">
                                <div class="column is-6">
                                    <div class="is-flex has-align-items-center">
                                     <span class="icon icon-1 mr-0-5">
                                        <img src="{{ asset('/svg/icons/ic_location.svg') }}" class="svg">
                                     </span>
                                        <span class="is-size-875 has-text-weight-bold">Адрес главного офиса</span>
                                    </div>
                                </div>
                                <div class="column is-6">
                                    <div>
                                       <span class="is-size-875">022245, ul. Dluga 52, Warsaw 00-241, Poland</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="contacts__item">
                            <div class="columns is-multiline">
                                <div class="column is-6">
                                    <div class="is-flex has-align-items-center">
                                     <span class="icon icon-1 mr-0-5">
                                        <img src="{{ asset('/svg/icons/ic_mailbox.svg') }}" class="svg">
                                     </span>
                                        <span class="is-size-875 has-text-weight-bold">Почтовый адрес</span>
                                    </div>
                                </div>
                                <div class="column is-6">
                                    <div>
                                       <span class="is-size-875">006436, Россия, Санкт-Петербург, ул. Ломоносова 123, пом. 65</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="contacts__item">
                            <div class="columns is-multiline">
                                <div class="column is-6">
                                    <div class="is-flex has-align-items-center">
                                     <span class="icon icon-1 mr-0-5">
                                        <img src="{{ asset('/svg/icons/ic_quality.svg') }}" class="svg">
                                     </span>
                                        <span class="is-size-875 has-text-weight-bold">Отдел качества и сервиса</span>
                                    </div>
                                </div>
                                <div class="column is-6">
                                    <div>
                                        <a href="#" class="has-text-weight-bold has-text-info">+7 (495) 567-53-76</a>
                                        <div class="contacts__item__desc is-size-875">Руководитель: Анна Польская</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
