@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')
    <div class="container">
        <div class="columns">
            <div class="column is-4">
                @include('spa.aside')
            </div>
            <div class="column is-8">
                <section class="section pt-1 pb-0 px-0">
                    <h1 class="section-title mb-1-75">Ваш баланс</h1>
                    <div class="card-your-balance is-flex">
                        <figure>
                            <img src="{{ asset('/svg/icons/ic_balance.svg') }}" alt="Balance" class="svg">
                        </figure>
                        <span class="has-text-weight-bold">Текущий баланс составляет — €100</span>
                    </div>
                </section>
                <section class="section pt-0 pb-0 px-0">
                    <h3 class="mb-1">Пополнение баланса</h3>
                    <div class="columns is-multiline">
                        <div class="column is-6">
                            <a href="#" class="card-balance-replenishment is-size-875">
                                <div class="card-balance-replenishment__title">
                                    <img src="{{ asset('/svg/icons/ic_credit_card.svg') }}" alt="Card" class="svg">
                                    <span class="has-text-weight-bold">Кредитной картой Visa и MasterCard</span>
                                </div>
                                <div class="card-balance-replenishment__desc">
                                    Без процентов и дополниельных комиссий.
                                </div>
                            </a>
                        </div>
                        <div class="column is-6">
                            <a href="#" class="card-balance-replenishment is-size-875">
                                <div class="card-balance-replenishment__title">
                                    <img src="{{ asset('/svg/icons/ic_paypal.svg') }}" alt="Paypal" class="svg">
                                    <span class="has-text-weight-bold">Через PayPal</span>
                                </div>
                                <div class="card-balance-replenishment__desc">
                                    Быстро, надежно и безопасно.
                                </div>
                            </a>
                        </div>
                        <div class="column is-6">
                            <a href="#" class="card-balance-replenishment is-size-875">
                                <div class="card-balance-replenishment__title">
                                    <img src="{{ asset('/svg/icons/ic_payment_system.svg') }}" alt="Payment system"
                                         class="svg">
                                    <span class="has-text-weight-bold">Платежными системами</span>
                                </div>
                                <div class="card-balance-replenishment__desc">
                                    Мы принимаем к оплате Skrill, Neteller, Qiwi. Комиссия зависит от платежной системы.
                                </div>
                            </a>
                        </div>
                        <div class="column is-6">
                            <a href="#" class="card-balance-replenishment is-size-875">
                                <div class="card-balance-replenishment__title">
                                    <img src="{{ asset('/svg/icons/ic_cash.svg') }}" alt="Cash" class="svg">
                                    <span class="has-text-weight-bold">Наличными</span>
                                </div>
                                <div class="card-balance-replenishment__desc">
                                    Банковский перевод и пополнение через терминал. Комиссия составляет — 2%.
                                </div>
                            </a>
                        </div>
                    </div>
                </section>
                <section class="section pt-1 mt-1 px-0">
                    <h3 class="mb-1">История транзакций</h3>
                    <table class="table is-fullwidth is-size-875">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Способо пополнения</th>
                            <th>Дата</th>
                            <th>Сумма платежа</th>
                            <th>Результат</th>
                        </tr>
                        </thead>
                        <tbody class="box is-paddingless">
                        <tr>
                            <td class="has-text-basic">1</td>
                            <td class="has-text-weight-bold">Кредитной картой *4567</td>
                            <td class="has-text-basic">12 марта 2019</td>
                            <td class="has-text-weight-bold">€100</td>
                            <td class="has-text-warning">В процессе</td>
                        </tr>
                        <tr>
                            <td class="has-text-basic">2</td>
                            <td class="has-text-weight-bold">Paypal</td>
                            <td class="has-text-basic">6 марта 2019</td>
                            <td class="has-text-weight-bold">€200</td>
                            <td class="has-text-success">Зачислено</td>
                        </tr>
                        <tr>
                            <td class="has-text-basic">3</td>
                            <td class="has-text-weight-bold">Skrill</td>
                            <td class="has-text-basic">1 марта 2019</td>
                            <td class="has-text-weight-bold">€50</td>
                            <td class="has-text-success">Зачислено</td>
                        </tr>
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </div>
@endsection
