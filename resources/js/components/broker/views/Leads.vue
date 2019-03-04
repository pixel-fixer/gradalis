<template>
    <div class="container broker-pa">


        <div class="broker-pa__header">
            <div class="columns is-multiline">
                <div class="column is-8-desktop is-12-tablet">
                    <h1 class="section-title mb-0-5">{{trans('account.leads')}}</h1>
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
                                @on-close="dateChanged"
                                v-model="rangeDates.value"
                                :placeholder="rangeDates.placeholder"
                                :config="rangeDates.config"
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
                    <g-g-select-input v-model="offer" :size="'is-8'"
                                      :placeholder="trans('account.offer.placeholder')"
                                      :label="trans('account.offer.title')"
                                      @input="changeOffer"
                                      :searchable="true" :options="offerOptions"
                                      :withImg="true">
                    </g-g-select-input>
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
                        <button class="button h-3 is-outlined is-info is-size-875 mb-0"
                                v-bind:class="{ 'is-active': dateType=='day'}"
                                @click="switchDateType('day')"
                        >
                            <span>{{trans('account.day')}}</span>
                        </button>
                        <button class="button h-3 is-outlined is-size-875 mb-0 is-info"
                                v-bind:class="{ 'is-active': dateType=='week'}"
                                @click="switchDateType('week')"
                        >
                            <span>{{trans('account.week')}}</span>
                        </button>
                    </div>

                    <div class="buttons has-addons mb-0">
                        <button class="button h-3 is-outlined is-info is-size-875 is-medium mb-0"
                                v-bind:class="{ 'is-active': typeChart=='line'}"
                                @click="switchChart('line')">
                            <span class="icon is-medium">
                                <img src="/svg/icons/ic_line-chart.svg" alt=""
                                     class="svg"></span>
                        </button>
                        <button class="button h-3 is-outlined is-size-875 is-info is-medium mb-0"
                                v-bind:class="{ 'is-active': typeChart=='bar'}"
                                @click="switchChart('bar')">
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
            <line-chart ref="lineChart" v-model="datacollection" :dataset="datacollection" :height="260"
                        v-show="typeChart=='line'"/>
            <bar-chart ref="barChart" v-model="datacollection" :dataset="datacollection" :height="260"
                       v-show="typeChart=='bar'"/>
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
                <tr v-for="item in detailList">
                    <td>{{item.lead_id}}</td>
                    <td class="has-text-basic">{{item.date}} <span style="color: #8B97A9;"> в {{item.time}} (Польша)</span></td>
                    <td>{{item.login_count}}</td>
                    <td>12</td>
                    <td class="has-text-basic">
                        <message-modal :title="trans('account.write_message')"></message-modal>
                    </td>
                </tr>
                </tbody>
            </table>
        </section>
        <portal-target name="modals"></portal-target>
    </div>
</template>

<script>
    import BarChart from '../../charts/BarChart.js';
    import LineChart from '../../charts/LineChart.js';
    import GGSelectInput from '../../form/GGSelectInput';

    import flatPickr from 'vue-flatpickr-component';
    import {Russian} from "flatpickr/dist/l10n/ru.js"
    import 'flatpickr/dist/flatpickr.css';
    import MessageModal from '../../modals/MessageModal';

    flatpickr.localize(Russian);

    export default {
        name: "BrokerLeads",
        components: {
            BarChart, LineChart, GGSelectInput, flatPickr,MessageModal
        },
        data() {
            return {
                showModalRef: false,
                partners: null,
                partnersId: [],
                offer: 1,
                detailList:[],
                offerOptions: trans('account.offer.options'),
                chart: {
                    data: null
                },
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

                // id: '4',
                // name: 'Item 4',
                // img: 'https://vue-multiselect.js.org/static/posters/trading_post.png'

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
                }, options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        xAxes: [{
                            gridLines: {
                                color: "#CFDAE6",
                                drawTicks: false,
                                // zeroLineColor: "#0070D9",
                            },
                            ticks: {
                                fontColor: "#B4C4DB",
                                fontSize: 14,
                                fontFamily: "'Roboto', sans-serif",
                                padding: 10,
                            },
                        }],
                        yAxes: [{
                            gridLines: {
                                color: "#CFDAE6",
                                drawTicks: false,
                                zeroLineColor: "#0070D9",
                            },
                            ticks: {
                                fontColor: "#B4C4DB",
                                fontSize: 14,
                                fontFamily: "'Roboto', sans-serif",
                                beginAtZero: true,
                                padding: 10,
                                suggestedMin: 0,
                                suggestedMax: 5
                            },
                            stepSize: 1

                        }]
                    },
                    tooltips: {
                        backgroundColor: '#1C2940',
                        titleFontFamily: "'Roboto', sans-serif",
                        bodyFontFamily: "'Roboto', sans-serif",
                        footerFontFamily: "'Roboto', sans-serif",
                        cornerRadius: 3,
                    },
                    legend: {
                        display: true,
                        textAlign: 'left',
                        labels: {
                            // boxWidth: 8,
                            usePointStyle: true,
                            fontColor: '#B4C4DB',
                            fontSize: 14,
                            fontFamily: "'Roboto', sans-serif",
                        }
                    },
                },
                typeChart: 'line',
                dateType: 'day',
                from: null,
                to: null
            }
        },
        methods: {
            changeOffer(){
                this.fetchChartData();
            },
            dateChanged(val) {
                this.from = val[0];
                this.to = val[1];
                this.fetchChartData()
            },
            switchChart(type = 'line') {
                if (type == 'bar') {
                    this.typeChart = 'bar';
                    this.$nextTick(() => {
                        this.$refs['barChart'].renderChart(this.datacollection, this.options)
                    })
                } else if (type == 'line') {
                    this.typeChart = 'line';
                    this.$nextTick(() => {
                        this.$refs['lineChart'].renderChart(this.datacollection, this.options)
                    })
                }
            },
            switchDateType(type = 'day') {
                this.dateType = type;
                this.fetchChartData()
            },
            fetchOffers() {
                let vm = this;
                axios.get('/broker-get-offers').then(responce => {
                    responce.data.forEach(el => {
                        vm.offerOptions.push(el);
                    });

                });
            },
            fetchLeadsDetails() {
                let vm = this;
                axios.post('/broker-get-leads-details').then(responce => {
                    responce.data.forEach(el => {
                        vm.detailList.push(el);
                    });
                });
            },
            fetchChartData() {
                let vm = this;
                let data = {};
                data.partnerId = vm.$store.state.partner.id;
                data.dateType = vm.dateType;
                if (vm.from) {
                    data.from = vm.from;
                }
                if (vm.to) {
                    data.to = vm.to;
                }
                if (vm.offer > 1) {
                    data.campaign_id = vm.offer;
                }
                axios.post('/broker-lead-chart-data', {
                    data: data
                }).then(responce => {
                    vm.chart.data = responce.data;
                    vm.datacollection.labels = [];
                    vm.datacollection.datasets[0].data = [];
                    vm.chart.data.forEach(key => {
                        vm.datacollection.labels.push(key.date);
                        vm.datacollection.datasets[0].data.push(key.approved_leads);
                    });
                    this.switchChart();
                })
            },

        },
        mounted() {
            this.fetchOffers();
            this.fetchLeadsDetails();
            this.fetchChartData();
        },
    }
</script>

<style scoped>

</style>
