@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')
    <div class="add-business">
        <section class="section section-list-objects pt-1">
            <div class="container add-business__header">
                <div class="columns is-multiline">
                    <div class="column is-6-desktop is-12-tablet"><h1 class="section-title">{{__('business.create.title')}}</h1></div>
                    <div class="column is-6-desktop is-12-tablet">
                        <div class="info-banner-wrap">
                            <div class="info-banner is-flex">
                                <figure>
                                    <img src="{{ asset('/img/manager.png') }}" alt="">
                                </figure>
                                <div class="is-size-875 info-banner__text">
                                    {!! __('business.create.help') !!}
                                </div>
                                <div class="info-banner__buttons">
                                    <a href="#" class="button is-warning is-inverted is-outlined has-text-weight-bold is-size-875">{{__('business.create.btn_more')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <form-add-business></form-add-business>
            </div>
        </section>
    </div>

@endsection
