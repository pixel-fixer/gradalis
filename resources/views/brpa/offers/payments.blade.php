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
            <h3>Выплаты</h3>
            <div class="is-size-875 has-text-basic">
                <p>
                    Цель оффера - это действие, которое будет оплачено рекламодателем. У каждого рекламодателя свои цели
                    при
                    проведении рекламной кампании. В этом разделе представлены и подробно описаны все цели выбранного
                    вами
                    рекламодателя и эквивалентные им денежные вознаграждения, которые он готов заплатить за выполнение
                    вебмастером каждой цели.
                </p>
            </div>
            <table class="table is-striped is-fullwidth is-size-875">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Регионы</th>
                    <th>Наименование цели</th>
                    <th>
                        <span>CPL</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                           <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                        </span>
                    </th>
                    <th>
                        <span>CPS</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                           <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                        </span>
                    </th>
                </tr>
                </thead>
                <tbody class="box is-paddingless">
                <tr>
                    <td>1</td>
                    <td>Россия</td>
                    <td>Активная дебетовая карта</td>
                    <td>1.69 - 2.99</td>
                    <td>18.84 - 24.73</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Польша</td>
                    <td>Активная дебетовая карта</td>
                    <td>1.69 - 2.99</td>
                    <td>18.84 - 24.73</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Польша</td>
                    <td>Активная дебетовая карта</td>
                    <td>1.69 - 2.99</td>
                    <td>18.84 - 24.73</td>
                </tr>
                </tbody>
            </table>
        </section>
    </div>
@endsection
