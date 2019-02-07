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

        @include('brpa.offers.nav')


        <section class="section is-paddingless content">
            <h3>Инструкции</h3>
            <div class="is-size-875 has-text-basic">
                <p>
                    Готовый бизнес — это компания, которая выжила на рынке и имеет выраженную бизнес-модель. Ее покупка
                    позволяет избежать трудностей, связанных с самостоятельным стартом. Покупатель принимает риски и
                    получает активы, которые уже приносят прибыль. Продавцу достается компенсация за выход из бизнеса,
                    которым он не может или не хочет управлять дальше. Выгода есть для обеих сторон!
                </p>
                <p>
                    Большая часть сделок по готовому бизнесу — это продажа недорогих предприятий. Их стоимость сильно
                    зависит от
                    показателей прибыльности, также на нее влияет размер и цена прилагаемых активов. Как правило, работающий
                    бизнес можно приобрести даже за 250'000 — 300'000 рублей.
                </p>
                <p>
                    Объекты действующего бизнеса очень разные: от интернет-магазинов и маленьких кофеен, которые стоят
                    недорого, до заводов и горнолыжных курортов за миллионы рублей.
                </p>
            </div>
        </section>
    </div>
@endsection
