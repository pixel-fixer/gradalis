@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')

    <div class="container">
        <div class="register-container">
            <div class="columns">
                <div class="column">
                    <div class="card-register card-register_buyer card-auth">
                        <div class="card-auth__header">
                            <div class="card-auth__header__title has-text-left">
                                <h1>Регистрация покупателя</h1>
                            </div>
                        </div>
                        <div class="card-body card-auth__body">
                            <form-register-buyer></form-register-buyer>
                        </div>
                    </div>
                </div>
                <div class="column is-two-fifths register-column-info-wrap">
                    <div class="register-column-info register-column-info_buyer">
                        <div class="register-column-info__title has-text-weight-bold">Комфортные инструменты для
                            покупки
                        </div>
                        <div class="register-column-info__desc">
                            Мы подобрали для вас лучшие инструменты, которые помогут купить именно ваш бизнес.
                            <br>
                            <br>
                            Более 5 инструментов от лидеров индустрии, которые помогают предпренимателям получать максимум.
                        </div>
                        <figure class="register-column-info__img">
                            <img src="{{ asset('/svg/people/people-2.svg') }}" alt="">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
