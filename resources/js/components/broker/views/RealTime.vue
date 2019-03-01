<template>
    <div class="container broker-pa">
        <div class="broker-pa__header">
            <div class="columns is-multiline">
                <div class="column is-8-desktop is-12-tablet">
                    <h1 class="section-title mb-0-5">{{trans('account.in_realtime')}}</h1>
                </div>
                <div class="column is-4-desktop is-12-tablet">
                    <div class="buttons">
                        <button class="button is-outlined is-info is-size-875 has-text-weight-bold h-3 px-1">
                        <span class="icon">
                          <img src="/svg/icons/ic_lifesaver-2.svg" alt="" class="svg">
                        </span>
                            <span>{{trans('account.help')}}</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <section>
            <!-- Swiper -->
            <div class="swiper-container swiper-broker-data-indicators">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">{{trans('account.views')}}</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                {{views}}
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">{{trans('account.hits')}}</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                {{hits}}
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">{{trans('account.open_leads')}}</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                {{open_leads}}
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">{{trans('account.approved_leads')}}</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                {{approved_leads}}
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">{{trans('account.payed_targets')}}</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                {{payed_targets}}
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">{{trans('account.open_commission')}}</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                {{open_commission}}
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">{{trans('account.approved_commission')}}</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                {{approved_commission}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next swiper-broker-data-indicators-next"></div>
                <div class="swiper-button-prev swiper-broker-data-indicators-prev"></div>
            </div>
        </section>

        <div class="columns is-multiline">
            <div class="column is-12">
                <broker-real-time-indicators></broker-real-time-indicators>
            </div>
        </div>

        <section class="section is-paddingless content box">
            <table class="table is-fullwidth is-size-875 is-paddingless has-background-white broker-pa__realtime-table">
                <thead class="bb">
                <tr class="has-background-info">
                    <th colspan="2" class="has-text-white has-text-centered">По офферам</th>
                    <th colspan="3" class="has-text-white has-text-centered">Трафик</th>
                    <th colspan="3" class="has-text-white has-text-centered">Лиды</th>
                    <th colspan="2" class="has-text-white has-text-centered">Комиссия</th>
                </tr>
                <tr>
                    <th class="">ID</th>
                    <th class="">Название</th>
                    <th class="no-wrap">
                        <span>Показы</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                           <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                        </span>
                    </th>
                    <th class="no-wrap">
                        <span>Хиты</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                           <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                        </span>
                    </th>
                    <th class="no-wrap">
                        <span>Клики</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                           <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                        </span>
                    </th>
                    <th class="no-wrap">
                        <span>Открытая</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                           <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                        </span>
                    </th>
                    <th class="no-wrap">
                        <span>Одобрена</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                           <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                        </span>
                    </th>
                    <th class="no-wrap">
                        <span>Целей оплачено</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                           <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                        </span>
                    </th>
                    <th class="no-wrap">
                        <span>Открытая</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                           <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                        </span>
                    </th>
                    <th class="no-wrap">
                        <span>Одобренная</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                           <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                        </span>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="offer in offers">
                    <td class="">{{offer.id}}</td>
                    <td class="has-text-basic has-line-height-normal"><router-link :to="{ path: '/broker/web-offer/'+ offer.id}">{{offer.name}}</router-link></td>
                    <td class="">{{offer.views}}</td>
                    <td class="">{{offer.hits}}</td>
                    <td class="">{{offer.hits}}</td>
                    <td class="">{{offer.open_leads}}</td>
                    <td class="">{{offer.approved_leads}}</td>
                    <td class="">{{offer.payed_targets}}</td>
                    <td class="has-text-weight-bold">{{offer.open_commission}}</td>
                    <td class="has-text-weight-bold">{{offer.approved_commission}}</td>
                </tr>
                </tbody>
            </table>
        </section>
    </div>
</template>

<script>

    export default {
        name: "RealTime",
        components: {},
        data() {
            return {
                offers: [],
                views: 0,
                hits: 0,
                open_leads: 0,
                approved_leads: 0,
                payed_targets: 0,
                open_commission: 0,
                approved_commission: 0,
            }
        },
        created() {
            let vm = this;
            axios.get('/broker-get-summary').then(responce => {
                let data = responce.data;
                vm.views = data.views;
                vm.hits = data.hits;
                vm.open_leads = data.open_leads;
                vm.approved_leads = data.approved_leads;
                vm.payed_targets = data.payed_targets;
                vm.open_commission = data.open_commission;
                vm.approved_commission = data.approved_commission;
            });
            axios.get('/broker-get-offers-summary').then(responce => {
                vm.offers = responce.data;
            });
        }
    }
</script>

<style scoped>

</style>
