@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')

    <div class="container broker-pa">


        <broker-summary-indicators></broker-summary-indicators>

        <section class="section is-paddingless content">
            <h3>Финансовые показатели</h3>
            <table class="table is-fullwidth is-size-875">
                <thead>
                <tr>
                    <th>Баланс аккаунта</th>
                    <th>Комиссия на оплате рекламодателя</th>
                    <th>Комиссия в холде</th>
                    <th>Итого к выплате</th>
                </tr>
                </thead>
                <tbody class="box is-paddingless">
                <tr>
                    <td>0.00</td>
                    <td class="has-text-basic">0.00</td>
                    <td class="has-text-basic">0.00</td>
                    <td class="has-text-basic has-text-weight-bold">0.00</td>
                </tr>
                </tbody>
            </table>
        </section>
    </div>
@endsection
