<template>
    <div class="container broker-pa">


        <div class="broker-pa__header">
            <div class="columns is-multiline">
                <div class="column is-8-desktop is-12-tablet">
                    <h1 class="section-title mb-0-5">Лиды</h1>
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

        <div class="columns is-multiline">
            <div class="column">
                <div class="columns is-multiline">
                    <!--<g-g-select-input v-model="form.offer.selected" :size="'is-8'"-->
                                      <!--:placeholder="form.offer.placeholder" :label="form.offer.title"-->
                                      <!--:searchable="true" :options="formOptions.offer.options"></g-g-select-input>-->

                    <div class="column is-8">
                        <div class="field">
                            <label
                                class="label label_req"><span>{{form.offer.title}}</span></label>
                            <div class="control">
                                <multiselect
                                    v-model="form.offer.selected"
                                    :deselect-label="''"
                                    track-by="name"
                                    label="name"
                                    openDirection="bottom"
                                    :placeholder="form.offer.placeholder"
                                    :options="formOptions.offer.options"
                                    :searchable="true"
                                    :allow-empty="false"
                                    :selectLabel="''"
                                    :selectedLabel="''">
                                    <template slot="singleLabel" slot-scope="props"><img class="option__image" :src="props.option.img">
                                        <span class="option__desc"><span class="option__title">{{ props.option.name }}</span></span>
                                    </template>
                                    <template slot="option" slot-scope="props">
                                        <img class="option__image" :src="props.option.img">
                                        <div class="option__desc"><span class="option__title">{{ props.option.name }}</span></div>
                                    </template>
                                </multiselect>
                            </div>
                        </div>
                    </div>

                    <g-g-select-input v-model="form.sorting.selected" :size="'is-4'"
                                      :placeholder="form.sorting.placeholder" :label="form.sorting.title"
                                      :searchable="true" :options="formOptions.sorting.options"></g-g-select-input>
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
                    <th>ID лида</th>
                    <th>Дата создания</th>
                    <th>Кол-во входов</th>
                    <th>Кол-во заказов</th>
                    <th></th>
                </tr>
                </thead>
                <tbody class="box is-paddingless">
                <tr>
                    <td>2210</td>
                    <td class="has-text-basic">28.09.2018 <span style="color: #8B97A9;">в 12:44 (Польша)</span></td>
                    <td>125</td>
                    <td>12</td>
                    <td class="has-text-basic">
                        <a href="#" class="link-with-icon">
                            <img src="/svg/icons/ic_messages.svg">
                            <span class="has-text-decoration-underline">Написать сообщение</span>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>2211</td>
                    <td class="has-text-basic">28.09.2018 <span style="color: #8B97A9;">в 12:44 (Польша)</span></td>
                    <td>125</td>
                    <td>12</td>
                    <td class="has-text-basic">
                        <a href="#" class="link-with-icon">
                            <img src="/svg/icons/ic_messages.svg">
                            <span class="has-text-decoration-underline">Написать сообщение</span>
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </section>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'
    import BarChart from '../BarChart.js';
    import LineChart from '../LineChart.js';
    import GGSelectInput from '../../form/GGSelectInput';

    import flatPickr from 'vue-flatpickr-component';
    import {Russian} from "flatpickr/dist/l10n/ru.js"
    import 'flatpickr/dist/flatpickr.css';

    flatpickr.localize(Russian);

    export default {
        name: "BrokerLeads",
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
                    offer: {
                        selected: null,
                        title: 'Оффер',
                        placeholder: 'Выберите',
                        selectedLabel: '',
                        selectLabel: '',
                        deselectLabel: '',
                        noResult: 'Ничего не найдено'
                    },
                    sorting: {
                        selected: null,
                        title: 'Сортировка',
                        placeholder: 'Выберите',
                    },
                },
                formOptions: {
                    offer: {
                        options: [
                            {id: '1', name: 'Item 1', img: 'https://vue-multiselect.js.org/static/posters/trading_post.png'},
                            {id: '2', name: 'Item 2', img: 'https://vue-multiselect.js.org/static/posters/trading_post.png'},
                            {id: '3', name: 'Item 3', img: 'https://vue-multiselect.js.org/static/posters/trading_post.png'},
                            {id: '4', name: 'Item 4', img: 'https://vue-multiselect.js.org/static/posters/trading_post.png'},
                        ]
                    },
                    sorting: {
                        options: [
                            {id: '1', name: 'Item 1'},
                            {id: '2', name: 'Item 2'},
                            {id: '3', name: 'Item 3'},
                            {id: '4', name: 'Item 4'},
                        ]
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
