@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')
    <div class="add-business">
        <section class="section section-list-objects pt-1">
            <div class="container add-business__header">
                <div class="columns is-multiline">
                    <div class="column is-6-desktop is-12-tablet"><h1 class="section-title">Продать бизнес</h1></div>
                    <div class="column is-6-desktop is-12-tablet">
                        <div class="info-banner-wrap">
                            <div class="info-banner is-flex">
                                <figure>
                                    <img src="{{ asset('/img/manager.png') }}" alt="">
                                </figure>
                                <div class="is-size-875 info-banner__text">
                                    <span class="has-text-weight-bold">Не хотите заполнять?</span>&nbsp;<span>Наш менеджер поможет вам!</span>
                                </div>
                                <div class="info-banner__buttons">
                                    <a href="#" class="button is-warning is-inverted is-outlined has-text-weight-bold is-size-875">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <form-add-bussines></form-add-bussines>
            </div>
        </section>
    </div>

@endsection
