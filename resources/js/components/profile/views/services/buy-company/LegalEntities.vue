<template>
    <div>
        <section class="section pt-1 pb-0 px-0">
            <h1 class="section-title mb-1-75">Покупка юридического лица</h1>
        </section>
        <section class="section pt-0 px-0">
            <div class="buttons mb-2">
                <a href="#" class="button is-info h-3 is-size-875 has-text-weight-bold px-1">
                    <span class="icon has-flip-horizontally"><img src="/svg/icons/ic_arrow_right.svg" alt=""
                                                                  class="svg"></span>
                    <span>Вернуться к форме</span>
                </a>
            </div>
            <div>
                <div class="box px-0 pb-0">
                    <div class="px-1-5">
                        <h3 class="mb-1 is-flex has-align-items-center">
                            <span>Юридическое лицо №1</span>
                            <span class="icon icon-1" v-tooltip="'tooltip text'">
                           <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                        </span>
                        </h3>
                        <div class="columns is-multiline is-size-875">
                            <div class="column is-6 pb-0">
                                <div class="has-text-right-tablet">Название юридического лица:</div>
                            </div>
                            <div class="column is-6 pb-0">
                                <div class="has-text-weight-bold has-text-dark-blue">ООО “Linas Cafe”</div>
                            </div>

                            <div class="column is-6 pb-0">
                                <div class="has-text-right-tablet">Страна:</div>
                            </div>
                            <div class="column is-6 pb-0">
                                <div class="has-text-weight-bold has-text-dark-blue">Польша</div>
                            </div>

                            <div class="column is-6 pb-0">
                                <div class="has-text-right-tablet">Регион:</div>
                            </div>
                            <div class="column is-6 pb-0">
                                <div class="has-text-weight-bold has-text-dark-blue">Мазовецкое воеводство</div>
                            </div>

                            <div class="column is-6 pb-0">
                                <div class="has-text-right-tablet">Город:</div>
                            </div>
                            <div class="column is-6 pb-0">
                                <div class="has-text-weight-bold has-text-dark-blue">Варшава</div>
                            </div>

                            <div class="column is-6 pb-0">
                                <div class="has-text-right-tablet">Дата создания:</div>
                            </div>
                            <div class="column is-6 pb-0">
                                <div class="has-text-weight-bold has-text-dark-blue">13 март 2000</div>
                            </div>

                            <div class="column is-6 pb-0">
                                <div class="has-text-right-tablet">Годовой оборот:</div>
                            </div>
                            <div class="column is-6 pb-0">
                                <div class="has-text-weight-bold has-text-dark-blue">€ 1 000 000</div>
                            </div>

                            <div class="column is-6 pb-0">
                                <div class="has-text-right-tablet">Номер KRS:</div>
                            </div>
                            <div class="column is-6 pb-0">
                                <div class="has-text-weight-bold has-text-dark-blue">4353245645664</div>
                            </div>

                            <div class="column is-6 pb-0">
                                <div class="has-text-right-tablet">Документ с KRS:</div>
                            </div>
                            <div class="column is-6 pb-0">
                                <a href="#" class="has-text-decoration-underline">Скачать</a>
                            </div>

                            <div class="column is-6 pb-0">
                                <div class="has-text-right-tablet">Виды деятельности:</div>
                            </div>
                            <div class="column is-6 pb-0">
                                <div class="has-text-weight-bold has-text-dark-blue">Оптовая торговля</div>
                                <div class="has-text-weight-bold has-text-dark-blue">Розничная торговля</div>
                                <div class="has-text-weight-bold has-text-dark-blue">Логистика</div>
                                <div class="has-text-weight-bold has-text-dark-blue">Бухгалтерские услуги</div>
                                <div class="has-text-weight-bold has-text-dark-blue">Маркетинг</div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="px-1-5 mb-2">
                        <div class="columns is-multiline is-mobile has-align-items-center">
                            <div class="column is-6-tablet is-narrow">
                                <div class="has-text-right-tablet is-size-875">Стоимость:</div>
                            </div>
                            <div class="column is-6-tablet is-narrow">
                                <div class="has-text-weight-bold has-text-dark-blue is-size-4">€1000</div>
                            </div>
                        </div>
                        <div class="columns is-multiline is-mobile">
                            <div class="column is-6-tablet is-narrow has-text-right-tablet">
                                <button
                                    class="button is-success is-outlined has-text-weight-bold is-size-875 is-active">
                                <span class="icon">
                                      <img src="/svg/icons/ic_success.svg" class="svg" alt="">
                                </span>
                                    <span>Одобрено</span>
                                </button>
                            </div>
                            <div class="column is-6-tablet is-narrow">
                                <button class="button is-danger is-outlined has-text-weight-bold is-size-875" disabled>
                                <span class="icon">
                                      <img src="/svg/icons/ic_danger.svg" class="svg" alt="">
                                </span>
                                    <span>Отклонить</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="service-action-comment p-1-5 is-flex">
                        <figure class="is-marginless mr-1">
                            <img src="https://image.freepik.com/free-photo/no-translate-detected_23-2147650966.jpg"
                                 alt="">
                        </figure>
                        <div class="service-action-comment__info">
                            <div class="is-flex is-size-7 has-text-basic">
                                <div class="service-action-comment__title has-text-weight-bold">Исполнитель</div>
                                <time class="service-action-comment__time">17:39</time>
                            </div>
                            <div class="service-action-comment__content is-size-875 has-text-dark-blue">
                                Пожалуйста, уменьшите установленный объем работы.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box px-0 pb-0">
                    <div class="px-1-5">
                        <h3 class="mb-1 is-flex has-align-items-center">
                            <span>Юридическое лицо №2</span>
                            <span class="icon icon-1" v-tooltip="'tooltip text'">
                           <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                        </span>
                        </h3>
                        <div class="columns is-multiline is-size-875">
                            <div class="column is-6 pb-0">
                                <div class="has-text-right-tablet">Название юридического лица:</div>
                            </div>
                            <div class="column is-6 pb-0">
                                <div class="has-text-weight-bold has-text-dark-blue">ООО “Linas Cafe”</div>
                            </div>

                            <div class="column is-6 pb-0">
                                <div class="has-text-right-tablet">Страна:</div>
                            </div>
                            <div class="column is-6 pb-0">
                                <div class="has-text-weight-bold has-text-dark-blue">Польша</div>
                            </div>

                            <div class="column is-6 pb-0">
                                <div class="has-text-right-tablet">Регион:</div>
                            </div>
                            <div class="column is-6 pb-0">
                                <div class="has-text-weight-bold has-text-dark-blue">Мазовецкое воеводство</div>
                            </div>

                            <div class="column is-6 pb-0">
                                <div class="has-text-right-tablet">Город:</div>
                            </div>
                            <div class="column is-6 pb-0">
                                <div class="has-text-weight-bold has-text-dark-blue">Варшава</div>
                            </div>

                            <div class="column is-6 pb-0">
                                <div class="has-text-right-tablet">Дата создания:</div>
                            </div>
                            <div class="column is-6 pb-0">
                                <div class="has-text-weight-bold has-text-dark-blue">13 март 2000</div>
                            </div>

                            <div class="column is-6 pb-0">
                                <div class="has-text-right-tablet">Годовой оборот:</div>
                            </div>
                            <div class="column is-6 pb-0">
                                <div class="has-text-weight-bold has-text-dark-blue">€ 1 000 000</div>
                            </div>

                            <div class="column is-6 pb-0">
                                <div class="has-text-right-tablet">Номер KRS:</div>
                            </div>
                            <div class="column is-6 pb-0">
                                <div class="has-text-weight-bold has-text-dark-blue">4353245645664</div>
                            </div>

                            <div class="column is-6 pb-0">
                                <div class="has-text-right-tablet">Документ с KRS:</div>
                            </div>
                            <div class="column is-6 pb-0">
                                <a href="#" class="has-text-decoration-underline">Скачать</a>
                            </div>

                            <div class="column is-6 pb-0">
                                <div class="has-text-right-tablet">Виды деятельности:</div>
                            </div>
                            <div class="column is-6 pb-0">
                                <div class="has-text-weight-bold has-text-dark-blue">Оптовая торговля</div>
                                <div class="has-text-weight-bold has-text-dark-blue">Розничная торговля</div>
                                <div class="has-text-weight-bold has-text-dark-blue">Логистика</div>
                                <div class="has-text-weight-bold has-text-dark-blue">Бухгалтерские услуги</div>
                                <div class="has-text-weight-bold has-text-dark-blue">Маркетинг</div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="px-1-5 mb-2">
                        <div class="columns is-multiline is-mobile has-align-items-center">
                            <div class="column is-6-tablet is-narrow">
                                <div class="has-text-right-tablet is-size-875">Стоимость:</div>
                            </div>
                            <div class="column is-6-tablet is-narrow">
                                <div class="has-text-weight-bold has-text-dark-blue is-size-4">€1000</div>
                            </div>
                        </div>
                        <div class="columns is-multiline is-mobile">
                            <div class="column is-6-tablet is-narrow has-text-right-tablet">
                                <button class="button is-success is-outlined has-text-weight-bold is-size-875">
                                <span class="icon">
                                      <img src="/svg/icons/ic_success.svg" class="svg" alt="">
                                </span>
                                    <span>Одобрить</span>
                                </button>
                            </div>
                            <div class="column is-6-tablet is-narrow">
                                <button class="button is-danger is-outlined has-text-weight-bold is-size-875">
                                <span class="icon">
                                      <img src="/svg/icons/ic_danger.svg" class="svg" alt="">
                                </span>
                                    <span>Отклонить</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="service-action-comment p-1-5 is-flex">
                        <figure class="is-marginless mr-1">
                            <img src="https://image.freepik.com/free-photo/no-translate-detected_23-2147650966.jpg"
                                 alt="">
                        </figure>
                        <div class="service-action-comment__info">
                            <div class="is-flex is-size-7 has-text-basic">
                                <div class="service-action-comment__title has-text-weight-bold">Исполнитель</div>
                                <time class="service-action-comment__time">17:39</time>
                            </div>
                            <div class="service-action-comment__content is-size-875 has-text-dark-blue">
                                Пожалуйста, уменьшите установленный объем работы.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="buttons mt-2">
                <a href="#" class="button is-info h-3 is-size-875 has-text-weight-bold px-1">
                    <span>Оформить доверенность</span>
                    <span class="icon"><img src="/svg/icons/ic_arrow_right.svg" alt=""
                                                                  class="svg"></span>
                </a>
            </div>
        </section>
    </div>
</template>

<script>

    export default {
        components: {

        },
        props: ['user'],
        data: () => ({

        }),
        mounted() {

        },
        methods: {}
    }
</script>

<style>

</style>
