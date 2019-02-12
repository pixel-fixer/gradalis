<template>
    <div class="container broker-pa">


        <div class="broker-pa__header">
            <div class="columns is-multiline">
                <div class="column is-12">
                    <h1 class="section-title mb-0-5">Баланс и выплаты</h1>
                </div>
            </div>
        </div>

        <div class="columns is-multiline">
            <div class="column is-8">
                <div class="broker-pa__balance-box-date is-flex">
                    <section>
                        <!-- Swiper -->
                        <div class="swiper-container swiper-broker-data-balance-month">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="broker-data-balance-month-indicator">
                                        <div class="broker-data-balance-month-indicator__value">
                                            Сентябрь, 18
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="broker-data-balance-month-indicator">
                                        <div class="broker-data-balance-month-indicator__value">
                                            Октябрь, 18
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="broker-data-balance-month-indicator">
                                        <div class="broker-data-balance-month-indicator__value">
                                            Ноябрь, 18
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide is-active">
                                    <div class="broker-data-balance-month-indicator">
                                        <div class="broker-data-balance-month-indicator__value">
                                            Декабрь, 18
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="broker-data-balance-month-indicator">
                                        <div class="broker-data-balance-month-indicator__value">
                                            Январь, 19
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="broker-data-balance-month-indicator">
                                        <div class="broker-data-balance-month-indicator__value">
                                            Февраль, 19
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="broker-data-balance-month-indicator">
                                        <div class="broker-data-balance-month-indicator__value">
                                            Март, 19
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next swiper-broker-data-indicators-next"></div>
                            <div class="swiper-button-prev swiper-broker-data-indicators-prev"></div>
                        </div>
                    </section>
                    <div class="no-date">
                        <span>
                            Данные недоступны, так как в этом месяце не было начислений
                        </span>
                    </div>
                </div>
            </div>
            <div class="column is-4">
                <div class="box is-paddingless broker-pa__balance-box">
                    <div class="broker-pa__balance-box__header is-flex">
                        <figure>
                            <img src="/svg/icons/ic_balance.svg" class="svg" alt="">
                        </figure>
                        <h4>Текущий баланс к выплат
                            составляет — €100</h4>
                    </div>
                    <hr class="my-0">
                    <div class="broker-pa__balance-box__info-list is-size-875">
                        <div class="broker-pa__balance-box__info-item is-flex">
                            <div class="is-flex"><span>График выплат</span><span class="icon icon-1"
                                                                                 v-tooltip="'tooltip text'"><img
                                src="/svg/icons/ic_help.svg" class="svg" alt=""></span></div>
                            <div class="has-text-right"><span>Ежемесячно, 1-го и 16-го</span></div>
                        </div>
                        <div class="broker-pa__balance-box__info-item is-flex">
                            <div class="is-flex"><span>Холд</span><span class="icon icon-1"
                                                                        v-tooltip="'tooltip text'"><img
                                src="/svg/icons/ic_help.svg" class="svg" alt=""></span></div>
                            <div class="has-text-right"><span>3 дня</span></div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="broker-pa__balance-box__info-list is-size-875">
                        <div class="broker-pa__balance-box__info-item is-flex">
                            <div class="is-flex"><span>Основной баланс</span><span class="icon icon-1"
                                                                                   v-tooltip="'tooltip text'"><img
                                src="/svg/icons/ic_help.svg" class="svg" alt=""></span></div>
                            <div class="has-text-right"><span>€ 11 690.00</span></div>
                        </div>
                        <div class="broker-pa__balance-box__info-item is-flex">
                            <div class="is-flex"><span>Комис. на оплате рекламодателя</span><span class="icon icon-1"
                                                                                                  v-tooltip="'tooltip text'"><img
                                src="/svg/icons/ic_help.svg" class="svg" alt=""></span></div>
                            <div class="has-text-right"><span>€ 470.00</span></div>
                        </div>
                        <div class="broker-pa__balance-box__info-item is-flex">
                            <div class="is-flex"><span>Комис. в холде</span><span class="icon icon-1"
                                                                                  v-tooltip="'tooltip text'"><img
                                src="/svg/icons/ic_help.svg" class="svg" alt=""></span></div>
                            <div class="has-text-right"><span>€ 70.00</span></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <section class="section is-paddingless content">
            <h3>Все операции по счету</h3>
            <table class="table is-fullwidth is-size-875">
                <thead>
                <tr>
                    <th>ID заявки</th>
                    <th>Дата создания</th>
                    <th>Статус</th>
                    <th>Сумма к списанию</th>
                    <th>Сумма к выплате</th>
                    <th>Внешний счет</th>
                    <th></th>
                </tr>
                </thead>
                <tbody class="box is-paddingless">
                <tr>
                    <td>2210</td>
                    <td class="has-text-basic">28.09.2018 <span style="color: #8B97A9;">в 12:44 (Польша)</span></td>
                    <td class="has-text-basic">Выведено</td>
                    <td>€ 11 690.00</td>
                    <td class="has-text-basic has-text-weight-bold">
                        € 11 690.00
                    </td>
                    <td class="has-text-basic">56763467734</td>
                    <td>
                        <span class="icon icon-1 has-action">
                           <img src="/svg/icons/ic_check.svg" class="svg" alt="">
                        </span>
                        <span class="icon icon-1 has-action">
                           <img src="/svg/icons/ic_view-list.svg" class="svg" alt="">
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>2210</td>
                    <td class="has-text-basic">28.09.2018 <span style="color: #8B97A9;">в 12:44 (Польша)</span></td>
                    <td class="has-text-basic">Выведено</td>
                    <td>€ 11 690.00</td>
                    <td class="has-text-basic has-text-weight-bold">
                        € 11 690.00
                    </td>
                    <td class="has-text-basic">56763467734</td>
                    <td>
                        <span class="icon icon-1 has-action">
                           <img src="/svg/icons/ic_check.svg" class="svg" alt="">
                        </span>
                        <span class="icon icon-1 has-action">
                           <img src="/svg/icons/ic_view-list.svg" class="svg" alt="">
                        </span>
                    </td>
                </tr>
                </tbody>
            </table>
        </section>
    </div>
</template>

<script>

    export default {
        name: "BrokerBalance",
        components: {

        },
        data() {
            return {

            }
        },
    }
</script>

<style scoped>

</style>
