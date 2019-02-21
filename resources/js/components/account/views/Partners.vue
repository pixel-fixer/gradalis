<template>

    <div class="container broker-pa">


        <div class="broker-pa__header">
            <div class="columns is-multiline">
                <div class="column is-8-desktop is-12-tablet">
                    <h1 class="section-title mb-0-5">Партнеры</h1>
                </div>
                <div class="column is-4-desktop is-12-tablet">
                    <div class="buttons">
                        <button class="button is-outlined is-info is-size-875 has-text-weight-bold h-3 px-1 mb-0">
                        <span class="icon">
                          <img src="/svg/icons/ic_lifesaver-2.svg" alt="" class="svg">
                        </span>
                            <span>Помощь</span>
                        </button>
                        <button class="button is-outlined is-info is-size-875 has-text-weight-bold h-3 px-1 mb-0"
                                @click="showModalRef= true">
                        <span class="icon">
                          <img src="/svg/icons/ic_code.svg" alt="" class="svg">
                        </span>
                            <span class="has-text-decoration-underline">Ваша реферальная ссылка</span>
                        </button>

                        <modal v-if="showModalRef"
                               @close="showModalRef = false">
                            <div slot="header">
                                <p class="modal-card-title mb-0">Header</p>
                            </div>

                            <div slot="body">

                            </div>
                            <div slot="footer">

                            </div>
                        </modal>

                    </div>
                </div>
                <div class="column is-8-desktop is-12-tablet">
                    <div class="buttons has-addons mb-0 mr-1 has-justify-content-start">
                        <router-link :to="{ path: '/account/partners/'}"
                                     class="button h-3 is-outlined is-info is-size-875 mb-0 is-active">
                            <span>Активные партнеры</span>
                        </router-link>
                        <router-link :to="{ path: '/account/partners/future'}"
                                     class="button h-3 is-outlined is-info is-size-875 mb-0">
                            <span>Будущие партнеры</span>
                        </router-link>
                    </div>
                </div>
                <div class="column is-4-desktop is-12-tablet">
                    <div class="buttons">
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
            <table class="table is-fullwidth is-size-875">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Аккаунт</th>
                    <th>Дата регистрации</th>
                    <th>Страна</th>
                    <th>Сообщ. на модер.</th>
                    <th>Клики</th>
                    <th>Лиды</th>
                    <th>Сумма к выплате</th>
                    <th></th>
                </tr>
                </thead>
                <tbody class="box is-paddingless">
                <tr>
                    <td>2210</td>
                    <td class="has-vertical-align-middle">
                        <div class="name-account">
                            <figure><img src="https://www.hoteloxford.com/data/jpg/foto-galleria-130.jpg" alt="">
                            </figure>
                            <span>Димитрий</span>
                        </div>
                    </td>
                    <td class="has-text-basic">28.09.2018</td>
                    <td class="has-text-basic">Россия</td>
                    <td class="has-text-basic">
                        <a href="#" class="has-text-decoration-underline">
                            12 сообщений
                        </a>
                    </td>
                    <td>12 525</td>
                    <td>1 525</td>
                    <td class="has-text-weight-bold">€ 11 690.00</td>
                    <td>
                        <div class="is-flex">
                            <a href="#" class="link-with-icon mr-1">
                                <img src="/svg/icons/ic_details.svg">
                                <span class="has-text-decoration-underline">В аккаунт</span>
                            </a>
                            <a href="#" class="link-with-icon">
                                <img src="/svg/icons/ic_profile_settings.svg">
                                <span class="has-text-decoration-underline">Настройки</span>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>2210</td>
                    <td class="has-vertical-align-middle">
                        <div class="name-account">
                            <figure><img src="https://www.hoteloxford.com/data/jpg/foto-galleria-130.jpg" alt="">
                            </figure>
                            <span>Димитрий</span>
                        </div>
                    </td>
                    <td class="has-text-basic">28.09.2018</td>
                    <td class="has-text-basic">Россия</td>
                    <td class="has-text-basic">
                        <a href="#" class="has-text-decoration-underline">
                            12 сообщений
                        </a>
                    </td>
                    <td>12 525</td>
                    <td>1 525</td>
                    <td class="has-text-weight-bold">€ 11 690.00</td>
                    <td>
                        <div class="is-flex">
                            <a href="#" class="link-with-icon mr-1">
                                <img src="/svg/icons/ic_details.svg">
                                <span class="has-text-decoration-underline">В аккаунт</span>
                            </a>
                            <a href="#" class="link-with-icon">
                                <img src="/svg/icons/ic_profile_settings.svg">
                                <span class="has-text-decoration-underline">Настройки</span>
                            </a>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </section>
    </div>

</template>

<script>
    import BarChart from '../../charts/BarChart.js';
    import LineChart from '../../charts/LineChart.js';
    import GGSelectInput from '../../form/GGSelectInput';
    import Modal from '../../Modal';

    import flatPickr from 'vue-flatpickr-component';
    import {Russian} from "flatpickr/dist/l10n/ru.js"
    import 'flatpickr/dist/flatpickr.css';

    flatpickr.localize(Russian);

    export default {
        name: "AccountPartners",
        components: {
            BarChart, LineChart, GGSelectInput, flatPickr, Modal
        },
        data() {
            return {
                showModalRef: false,
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
