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
                            <div class="notification__content content is-size-875">
                                Добрый день, Андрей. Спасибо за регистрацию на нашем портале. Выбирайте продукты и
                                начинайте продавать свой бизнес или франшизу.
                            </div>
                        </div>
                    </div>
                    <div class="notification notification_v2 is-success">
                        <div class="notification__icon">
                            <img src="/svg/icons/notification/ic_warning_success.svg" class="svg" alt="">
                        </div>
                        <div class="notification__content-wrap">
                            <h5 class="notification__title has-text-weight-bold is-marginless">
                                Примите к сведению
                            </h5>
                            <div class="notification__content content is-size-875">
                                Давно выяснено, что при оценке дизайна и композиции читаемый текст
                                мешает сосредоточиться. Lorem Ipsum используют потому, что тот
                                обеспечивает
                            </div>
                        </div>
                    </div>

                    <div class="notification is-warning">
                        <button class="delete"></button>
                        <div class="notification__icon">
                            <img src="/svg/icons/notification/ic_warning_warning.svg" class="svg" alt="">
                        </div>
                        <div class="notification__content-wrap">
                            <h5 class="notification__title has-text-weight-bold">
                                Важно
                            </h5>
                            <div class="notification__content content is-size-875">
                                Добрый день, Андрей. Спасибо за регистрацию на нашем портале. Выбирайте продукты и
                                начинайте продавать свой бизнес или франшизу.
                            </div>
                        </div>
                    </div>
                    <div class="notification notification_v2 is-warning">
                        <div class="notification__icon">
                            <img src="/svg/icons/notification/ic_warning_warning.svg" class="svg" alt="">
                        </div>
                        <div class="notification__content-wrap">
                            <h5 class="notification__title has-text-weight-bold is-marginless">
                                Важно
                            </h5>
                            <div class="notification__content content is-size-875">
                                Давно выяснено, что при оценке дизайна и композиции читаемый текст
                                мешает сосредоточиться. Lorem Ipsum используют потому, что тот
                                обеспечивает
                            </div>
                        </div>
                    </div>

                    <div class="notification is-borderless is-warning">
                        <div class="notification__icon">
                            <img src="/svg/icons/notification/ic_warning_warning_tringle.svg" class="svg" alt="">
                        </div>
                        <div class="notification__content-wrap">
                            <div class="is-flex-tablet has-align-items-center">
                                <h5 class="notification__title has-text-weight-bold is-marginless">
                                    Уведомление
                                </h5>
                                <time class="has-text-weight-bold"><span>&nbsp;●</span> 17:00 02.03.2019</time>
                            </div>
                            <div class="notification__content content is-size-875">
                                Добрый день, Андрей. Вы одобрили 2х кандидатов по вакансии "Маркетолог" Они ждут подписания договора. Перейдите на вкладку рекрутинг.
                            </div>
                        </div>
                    </div>

                    <div class="notification is-danger">
                        <button class="delete"></button>
                        <div class="notification__icon">
                            <img src="/svg/icons/notification/ic_warning_danger.svg" class="svg" alt="">
                        </div>
                        <div class="notification__content-wrap">
                            <h5 class="notification__title has-text-weight-bold">
                                Внимание!
                            </h5>
                            <div class="notification__content content is-size-875">
                                Добрый день, Андрей. Спасибо за регистрацию на нашем портале. Выбирайте продукты и
                                начинайте продавать свой бизнес или франшизу.
                            </div>
                        </div>
                    </div>
                    <div class="notification notification_v2 is-danger">
                        <div class="notification__icon">
                            <img src="/svg/icons/notification/ic_warning_danger.svg" class="svg" alt="">
                        </div>
                        <div class="notification__content-wrap">
                            <h5 class="notification__title has-text-weight-bold is-marginless">
                                Внимание!
                            </h5>
                            <div class="notification__content content is-size-875">
                                Давно выяснено, что при оценке дизайна и композиции читаемый текст
                                мешает сосредоточиться. Lorem Ipsum используют потому, что тот
                                обеспечивает
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
