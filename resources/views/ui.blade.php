@extends('layouts.app')

@section('content')

    <section class="section pb-0">
        <div class="container">
            <example-ui-form></example-ui-form>
        </div>
    </section>
    <section class="section ">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <hr>
                    <h2 class="section-title">Notifications</h2>
                    <div class="notification is-success">
                        <button class="delete"></button>
                        <div class="notification__icon">
                            <img src="{{ asset('/svg/icons/notification/ic_thankyou.svg') }}" class="svg" alt="">
                        </div>
                        <div class="notification__content-wrap">
                            <h5 class="notification__title has-text-weight-bold">
                                Спасибо за регистрацию!
                            </h5>
                            <div class="notification__content is-size-875">
                                Добрый день, Андрей. Спасибо за регистрацию на нашем портале. Выбирайте продукты и
                                начинайте продавать свой бизнес или франшизу.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
