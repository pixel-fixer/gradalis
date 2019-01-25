@extends('layouts.app')

@section('content')

    <section class="section pb-0">
        <div class="container">
            <h2 class="section-title">Forms</h2>
            <example-ui-form></example-ui-form>
        </div>
    </section>
    <section class="section pb-0 pt-0">
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
    <section class="section pt-0">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <hr>
                    <h2 class="section-title">Buttons social</h2>
                   <div class="columns">
                       <div class="column is-12">
                           <div class="buttons">
                               <button class="button is-vk is-size-875 has-text-weight-bold h-3 px-1">
                                   Вконтакте
                               </button>
                               <button class="button is-ok is-size-875 has-text-weight-bold h-3 px-1">
                                   Одноклассники
                               </button>
                               <button class="button is-fb is-size-875 has-text-weight-bold h-3 px-1">
                                   Facebook
                               </button>
                           </div>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </section>

@endsection
