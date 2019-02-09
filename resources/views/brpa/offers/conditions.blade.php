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
            <h3>Условия</h3>
            <table class="table is-striped is-fullwidth is-size-875">
                <thead>
                <tr>
                    <th>Условия трафика</th>
                    <th width="1rem"></th>
                    <th>Примечание</th>
                </tr>
                </thead>
                <tbody class="box is-paddingless">
                <tr>
                    <td class="has-text-basic">
                        <span>Контекстная реклама</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                           <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                        </span>
                    </td>
                    <td class="has-text-basic"><span class="icon"><img src="/svg/icons/ic_unlocked.svg" class="svg" alt=""></span></td>
                    <td class="has-text-basic">Запрещена контекстная реклама на бренд рекламодателя</td>
                </tr>
                <tr>
                    <td class="has-text-basic">
                        <span>Баннерная реклама</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                           <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                        </span></td>
                    <td class="has-text-basic"><span class="icon"><img src="/svg/icons/ic_locked.svg" class="svg" alt=""></span></td>
                    <td class="has-text-basic"></td>
                </tr>
                <tr>
                    <td class="has-text-basic">
                        <span>Email</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                           <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                        </span>
                    </td>
                    <td class="has-text-basic"><span class="icon"><img src="/svg/icons/ic_unlocked.svg" class="svg" alt=""></span></td>
                    <td class="has-text-basic">Только по согласованию с рекламодателем</td>
                </tr>
                </tbody>
            </table>
        </section>
    </div>
@endsection
