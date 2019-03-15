@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')
    <section class="section py-0">
        <div class="container">
            <div class="register-container">
                <div class="columns is-multiline">
                    <div class="column">
                        <div class="card-register card-register_buyer card-auth">
                            <div class="card-auth__header">
                                <div class="card-auth__header__title has-text-left">
                                    <h1>Регистрация медиа-байера</h1>
                                </div>
                            </div>
                            <div class="card-body card-auth__body">
                                <form-register-media-buyer></form-register-media-buyer>
                            </div>
                        </div>
                    </div>
                    <div class="column is-two-fifths-desktop is-12-tablet py-0">
                        <div class="register-column-info-wrap">
                            <div class="register-column-info register-column-info_buyer">
                                <div class="register-column-info__title has-text-weight-bold">
                                    Комфортные инструменты для медиа байера
                                </div>
                                <div class="register-column-info__desc">
                                    Мы подобрали для вас лучшие инструменты, которые помогут продать ваш бизнес максимально комофртно. Более 12 инструментов от лидеров индустрии, которые помогают предпренимателям получать максимум.
                                </div>
                                <figure class="register-column-info__img">
                                    <img src="{{ asset('/svg/people/people-2.svg') }}" alt="">
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
