@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')

    <div class="container broker-pa">
        <div class="broker-pa__header">
            <div class="columns is-multiline">
                <div class="column is-8-desktop is-12-tablet">
                    <h1 class="section-title mb-0-5">Банк Хоум Кредит: Дебетовая карта Польза</h1>
                    <div class="broker-id">ID: 2556</div>
                </div>
                <div class="column is-4">
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

@endsection
