<template>

    <div class="container broker-pa">


        <div class="broker-pa__header">
            <div class="columns is-multiline">
                <div class="column is-8-desktop is-12-tablet">
                    <h1 class="section-title mb-0-5">Сводные показатели</h1>
                </div>
                <div class="column is-4-desktop is-12-tablet">
                    <div class="buttons">
                        <button class="button is-outlined is-info is-size-875 has-text-weight-bold h-3 px-1 mb-0">
                        <span class="icon">
                          <img src="/svg/icons/ic_lifesaver-2.svg" alt="" class="svg">
                        </span>
                            <span>Помощь</span>
                        </button>
                        <div
                            class="control has-icons-left has-icons-left_1">
                            <flat-pickr
                                class="input is-size-875"
                                v-model="form.rangeDates.value"
                                :placeholder="form.rangeDates.placeholder"
                                :config="form.rangeDates.config"
                            >

                            </flat-pickr>
                            <div class="icons is-left">
                                  <span class="icon is-small">
                                    <img src="/svg/icons/ic_calendar.svg" class="svg" alt="">
                                  </span>
                            </div>
                        </div>
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
                                <span class="is-size-875 has-text-basic">Показы</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                12 580
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">Показы</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                12 580
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">Appr. Leads</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                12 580
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">Целей оплачено</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                12 580
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">Показы</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                12 580
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">Показы</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                12 580
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">Показы</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                12 580
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">Показы</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                12 580
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">Показы</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                12 580
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">Показы</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                12 580
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">Показы</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                12 580
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">Показы</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                12 580
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
            <div class="column">
                <div class="columns is-multiline">
                    <g-g-select-input v-model="form.typeData.selected" :size="'is-4'"
                                      :placeholder="form.typeData.placeholder" :label="form.typeData.title"
                                      :searchable="true" :options="form.typeData.options"></g-g-select-input>
                    <g-g-select-input v-model="form.comparison.selected" :size="'is-4'"
                                      :placeholder="form.comparison.placeholder" :label="form.comparison.title"
                                      :searchable="true" :options="form.comparison.options"></g-g-select-input>
                    <g-g-select-input v-model="form.sorting.selected" :size="'is-4'"
                                      :placeholder="form.sorting.placeholder" :label="form.sorting.title"
                                      :searchable="true" :options="form.sorting.options"></g-g-select-input>
                </div>
            </div>

            <div class="column is-narrow">
                <div class="is-flex has-align-items-end h-full">
                    <div class="buttons mb-0 mr-1">
                        <button class="button h-3 is-outlined is-info is-size-875 px-1 mb-0">
                            <span class="icon icon-1 is-small"><img src="/svg/icons/ic_reload.svg" alt=""
                                                                    class="svg"></span>
                        </button>
                    </div>

                    <div class="buttons has-addons mb-0 mr-1">
                        <button class="button h-3 is-outlined is-info is-size-875 mb-0 is-active">
                            <span>День</span>
                        </button>
                        <button class="button h-3 is-outlined is-size-875 mb-0 is-info">
                            <span>Неделя</span>
                        </button>
                    </div>

                    <div class="buttons has-addons mb-0">
                        <button class="button h-3 is-outlined is-info is-size-875 is-medium mb-0"
                                v-bind:class="{ 'is-active': typeChart=='line'}"
                                @click="typeChart='line'">
                            <span class="icon is-medium">
                                <img src="/svg/icons/ic_line-chart.svg" alt=""
                                     class="svg"></span>
                        </button>
                        <button class="button h-3 is-outlined is-size-875 is-info is-medium mb-0"
                                v-bind:class="{ 'is-active': typeChart=='bar'}"
                                @click="typeChart='bar'">
                            <span class="icon is-medium"><img src="/svg/icons/ic_analytics-2.svg" alt=""
                                                              class="svg"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="chart-time-zone is-size-875">
            (GMT+03:00) Москва
        </div>

        <div class="mb-2">
            <line-chart :chartdata="datacollection" :height="260"
                        v-if="typeChart=='line'"/>
            <bar-chart :chartdata="datacollection" :height="260"
                       v-if="typeChart=='bar'"/>
        </div>

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

</template>

<script>
    import Multiselect from 'vue-multiselect';
    import BarChart from '../../charts/BarChart.js';
    import LineChart from '../../charts/LineChart.js';
    import GGSelectInput from '../../form/GGSelectInput';

    import flatPickr from 'vue-flatpickr-component';
    import {Russian} from "flatpickr/dist/l10n/ru.js"
    import 'flatpickr/dist/flatpickr.css';

    flatpickr.localize(Russian);

    export default {
        name: "BrokerSummaryIndicators",
        components: {
            Multiselect, BarChart, LineChart, GGSelectInput, flatPickr
        },
        data() {
            return {
                form: {
                    rangeDates: {
                        placeholder: '25.02.2018 - 03.03.2018',
                        value: '',
                        config: {
                            mode: "range",
                            altFormat: 'd.m.Y',
                            altInput: true,
                            dateFormat: 'Y-m-d'
                        }
                    },
                    typeData: {
                        selected: null,
                        title: 'Данные в графике',
                        placeholder: 'Выберите',
                        selectedLabel: '',
                        selectLabel: '',
                        deselectLabel: '',
                        options: [
                            {id: '1', name: 'Item 1'},
                            {id: '2', name: 'Item 2'},
                            {id: '3', name: 'Item 3'},
                            {id: '4', name: 'Item 4'},
                        ],
                        noResult: 'Ничего не найдено'
                    },
                    comparison: {
                        selected: null,
                        title: 'Сравнение',
                        placeholder: 'Выберите',
                        selectedLabel: '',
                        selectLabel: '',
                        deselectLabel: '',
                        options: [
                            {id: '1', name: 'Item 1'},
                            {id: '2', name: 'Item 2'},
                            {id: '3', name: 'Item 3'},
                            {id: '4', name: 'Item 4'},
                        ],
                        noResult: 'Ничего не найдено'
                    },
                    sorting: {
                        selected: null,
                        title: 'Сортировка',
                        placeholder: 'Выберите',
                        selectedLabel: '',
                        selectLabel: '',
                        deselectLabel: '',
                        options: [
                            {id: '1', name: 'Item 1'},
                            {id: '2', name: 'Item 2'},
                            {id: '3', name: 'Item 3'},
                            {id: '4', name: 'Item 4'},
                        ],
                        noResult: 'Ничего не найдено'
                    },


                },
                datacollection: {
                    labels: ['Январь', 'Февраль', 'Март', 'Апрель', 'Мая', 'Июнь', 'Июль'],
                    datasets: [
                        {
                            label: 'Все показы',
                            backgroundColor: '#0070D9',
                            borderColor: '#0070D9',
                            borderWidth: 2,
                            data: [40, 39, 10, 40, 39, 80, 40],
                            fill: false,
                            lineTension: 0,
                            pointBorderWidth: 4,
                            // cubicInterpolationMode: 'monotone'
                        }
                    ]
                },
                typeChart: 'line',
            }
        },
    }
</script>

<style scoped>

</style>
