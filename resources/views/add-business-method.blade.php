@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')
    <div class="add-business">
        <section class="section section-list-objects pt-1">
            <div class="container add-business__header">
                <div class="columns is-multiline">
                    <div class="column is-6-desktop is-12-tablet"><h1 class="section-title">Продать бизнес</h1></div>
                </div>
            </div>
            <div class="container">
                <div class="box px-0 pb-0">
                    <div class="px-1-5">
                        <div class="content">
                            <h3 class="mb-1">Способы размещения объявления до 50 дней</h3>
                            <p>Публикация вашего бизнеса на проекте абсолютно бесплатна. Мы отправим ваше объявление на
                                модерацию и после проверки опубликуем его в каталоге бизнесов.</p>
                        </div>
                        <div class="ways-place-ads">
                            <div class="columns is-multiline is-gapless">
                                <div class="column is-4">
                                    <div class="ways-place-ads__item">
                                        <div class="ways-place-ads__item__info">
                                            <input type="radio" name="ways-place-ads" class="radio-wpa" id="wpa-basic">
                                            <label for="wpa-basic" v-tooltip="'25 567 пользователей выбрали этот тарифный план'">
                                                <div class="content">
                                                    <h4>Обычная продажа</h4>
                                                    <div class="text is-size-875">62% на успех в продаже</div>
                                                    <div class="ways-place-ads__item__info__price has-text-weight-bold">Бесплатно</div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="ways-place-ads__item__services">

                                        </div>
                                    </div>
                                </div>
                                <div class="column is-4">
                                    <div class="ways-place-ads__item">
                                        <div class="ways-place-ads__item__info">
                                            <input type="radio" name="ways-place-ads" class="radio-wpa" id="wpa-economy">
                                            <label for="wpa-economy" v-tooltip="'25 567 пользователей выбрали этот тарифный план'">
                                                <div class="content">
                                                    <h4>Комплекс «Эконом»</h4>
                                                    <span class="tag is-danger has-text-weight-bold">-9%</span>
                                                    <div class="text is-size-875"><b>×5</b> просмотров</div>
                                                    <div class="has-text-success is-size-875"><b>+19%</b> к успеху продажи бизнеса</div>
                                                    <div class="ways-place-ads__item__info__price has-text-weight-bold">€15 за 50 дней</div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="ways-place-ads__item__services">
                                            <div class="card card-service">
                                                <div class="card-service__body">
                                                    <div class="is-flex">
                                                        <figure class="card-service__icon"><img
                                                                src="http://marketplacenew.local/svg/icons/services/ic_translate.svg" alt="">
                                                        </figure>
                                                        <h4 class="card-service__title">Перевод документов</h4></div>
                                                    <div class="card-service__info">
                                                        <div class="card-service__excerpt is-size-875">
                                                            Наши специалисты переведут документы на английский и русский.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card card-service">
                                                <div class="card-service__body">
                                                    <div class="is-flex">
                                                        <figure class="card-service__icon"><img
                                                                src="http://marketplacenew.local/svg/icons/services/ic_translate.svg" alt="">
                                                        </figure>
                                                        <h4 class="card-service__title">Перевод документов</h4></div>
                                                    <div class="card-service__info">
                                                        <div class="card-service__excerpt is-size-875">
                                                            Наши специалисты переведут документы на английский и русский.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-4">
                                    <div class="ways-place-ads__item">
                                        <div class="ways-place-ads__item__info">
                                            <input type="radio" name="ways-place-ads" class="radio-wpa" id="wpa-lux" checked>
                                            <label for="wpa-lux" v-tooltip="'25 567 пользователей выбрали этот тарифный план'">
                                                <div class="content">
                                                    <h4>«Люкс продажа»</h4>
                                                    <span class="tag is-danger has-text-weight-bold">-22%</span>
                                                    <div class="text is-size-875"><b>×30</b> просмотров</div>
                                                    <div class="has-text-success is-size-875"><b>+88%</b> к успеху продажи бизнеса</div>
                                                    <div class="ways-place-ads__item__info__price has-text-weight-bold">€50 за 50 дней</div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="ways-place-ads__item__services">
                                            <div class="card card-service">
                                                <div class="card-service__body">
                                                    <div class="is-flex">
                                                        <figure class="card-service__icon"><img
                                                                src="http://marketplacenew.local/svg/icons/services/ic_translate.svg" alt="">
                                                        </figure>
                                                        <h4 class="card-service__title">Перевод документов</h4></div>
                                                    <div class="card-service__info">
                                                        <div class="card-service__excerpt is-size-875">
                                                            Наши специалисты переведут документы на английский и русский.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card card-service">
                                                <div class="card-service__body">
                                                    <div class="is-flex">
                                                        <figure class="card-service__icon"><img
                                                                src="http://marketplacenew.local/svg/icons/services/ic_translate.svg" alt="">
                                                        </figure>
                                                        <h4 class="card-service__title">Перевод документов</h4></div>
                                                    <div class="card-service__info">
                                                        <div class="card-service__excerpt is-size-875">
                                                            Наши специалисты переведут документы на английский и русский.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card card-service">
                                                <div class="card-service__body">
                                                    <div class="is-flex">
                                                        <figure class="card-service__icon"><img
                                                                src="http://marketplacenew.local/svg/icons/services/ic_translate.svg" alt="">
                                                        </figure>
                                                        <h4 class="card-service__title">Перевод документов</h4></div>
                                                    <div class="card-service__info">
                                                        <div class="card-service__excerpt is-size-875">
                                                            Наши специалисты переведут документы на английский и русский.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card card-service">
                                                <div class="card-service__body">
                                                    <div class="is-flex">
                                                        <figure class="card-service__icon"><img
                                                                src="http://marketplacenew.local/svg/icons/services/ic_translate.svg" alt="">
                                                        </figure>
                                                        <h4 class="card-service__title">Перевод документов</h4></div>
                                                    <div class="card-service__info">
                                                        <div class="card-service__excerpt is-size-875">
                                                            Наши специалисты переведут документы на английский и русский.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ways-place-ads-footer px-1-5 is-flex">
                        <div class="is-flex ways-place-ads-footer-price-info-wrap">
                            <h3>Итого:</h3>
                            <div class="ways-place-ads-footer-price-info">
                                <span class="price-old has-text-weight-bold">$180</span>
                                <span class="price-now has-text-weight-bold">$150</span>
                                <span class="price-sale">Экономия <span class="has-text-weight-bold has-text-danger">-22%</span></span>
                            </div>
                        </div>
                       <div>
                           <button class="button is-warning h-3 is-size-875 has-text-weight-bold px-1">Продать бизнес с пакетом «Люкс продажа»</button>
                       </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
