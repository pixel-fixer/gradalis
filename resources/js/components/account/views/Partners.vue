<template>

    <div class="container broker-pa">


        <div class="broker-pa__header">
            <div class="columns is-multiline">
                <div class="column is-8-desktop is-12-tablet">
                    <h1 class="section-title mb-0-5">{{trans('account.partners')}}</h1>
                </div>
                <div class="column is-4-desktop is-12-tablet">
                    <div class="buttons">
                        <button class="button is-outlined is-info is-size-875 has-text-weight-bold h-3 px-1 mb-0">
                        <span class="icon">
                          <img src="/svg/icons/ic_lifesaver-2.svg" alt="" class="svg">
                        </span>
                            <span>{{trans('account.help')}}</span>
                        </button>
                        <button class="button is-outlined is-info is-size-875 has-text-weight-bold h-3 px-1 mb-0"
                                @click="showModalRef= true">
                        <span class="icon">
                          <img src="/svg/icons/ic_code.svg" alt="" class="svg">
                        </span>
                            <span class="has-text-decoration-underline">{{trans('account.your_ref_link')}}</span>
                        </button>

                        <modal v-if="showModalRef"
                               @close="showModalRef = false">
                            <div slot="header">
                                <p class="modal-card-title mb-0">Сылка</p>
                            </div>

                            <div slot="body">
                                <a href="#">https://ref.market.local/parner-invitation/4</a>
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
                    <g-g-select-input v-model="typeData" :size="'is-4'"
                                      @input=""
                                      :placeholder="trans('account.data_in_chart.placeholder')"
                                      :label="trans('account.data_in_chart.title')"
                                      :searchable="true"
                                      :options="trans('account.data_in_chart.options')"></g-g-select-input>
                    <g-g-select-input v-model="comparison" :size="'is-4'"
                                      :placeholder="trans('account.compare.placeholder')"
                                      :label="trans('account.compare.title')"
                                      :searchable="true" :options="trans('account.compare.options')"></g-g-select-input>
                    <g-g-select-input v-model="sorting" :size="'is-4'"
                                      :placeholder="trans('account.sort.placeholder')"
                                      :label="trans('account.sort.title')"
                                      :searchable="true" :options="trans('account.sort.options')"></g-g-select-input>
                </div>
            </div>

            <div class="column is-narrow">
                <div class="is-flex has-align-items-end h-full">
                    <div class="buttons mb-0 mr-1">
                        <button @click="fetchChartData" class="button h-3 is-outlined is-info is-size-875 px-1 mb-0">
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
                        <span class="icon is-medium">
                            <img src="/svg/icons/ic_analytics-2.svg" alt=""
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
                    <th>ID</th>
                    <th>{{trans('account.account')}}</th>
                    <th>{{trans('account.reg_date')}}</th>
                    <th>{{trans('account.country')}}</th>
                    <th>{{trans('account.moderate_messages')}}</th>
                    <th>{{trans('account.clicks')}}</th>
                    <th>{{trans('account.leads')}}</th>
                    <th>{{trans('account.sum_to_pay')}}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody class="box is-paddingless">
                <tr v-for="partner in partners">
                    <td>{{partner.id}}</td>
                    <td class="has-vertical-align-middle">
                        <div class="name-account">
                            <figure><img :src="(partner.user.avatar)?partner.user.avatar:'/svg/icons/ic_login.svg'"
                                         alt="">
                            </figure>
                            <span>{{partner.user.first_name}}</span>
                        </div>
                    </td>
                    <td class="has-text-basic">{{partner.created_at}}</td>
                    <td class="has-text-basic">{{partner.user.country.translation.ru}}</td>
                    <td class="has-text-basic">
                        <a href="#" class="has-text-decoration-underline">
                            {{partner.moderate_messages}} сообщений
                        </a>
                    </td>
                    <td>{{partner.hits}}</td>
                    <td>{{partner.approved_leads}}</td>
                    <td class="has-text-weight-bold">{{partner.approved_commission}}</td>
                    <td>
                        <div class="is-flex">
                            <a href="#" class="link-with-icon mr-1">
                                <img src="/svg/icons/ic_details.svg">
                                <span class="has-text-decoration-underline">{{trans('account.in_account')}}</span>
                            </a>
                            <router-link class="link-with-icon" :tag="'a'"
                                         :to="{ name: 'partner-settings', params: { userId: partner.id} }">
                                <img src="/svg/icons/ic_profile_settings.svg">
                                <span class="has-text-decoration-underline">{{trans('account.settings')}}</span>
                            </router-link>
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
                partners: [],
                partnersIds: [],
                chart: {
                    data: null
                },
                typeData: 1,
                comparison: 1,
                sorting: 1,
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
                options: {
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
                            },

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
            dateChanged(val) {
                this.from = val[0];
                this.to = val[1];
                this.fetchChartData()
            },
            switchDateType(type = 'day') {
                this.dateType = type;
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
            switchData(type) {
                this.datacollection.labels = [];
                this.datacollection.datasets[0].data = [];
                if (type == 'views') {
                    Object.keys(this.chart.data).forEach(el => {
                        this.datacollection.labels.push(this.chart.data[el].date);
                        this.datacollection.datasets[0].data.push(this.chart.data[el].views + 0);
                        this.datacollection.datasets[0].label = trans('account.views');
                    });
                } else if (type == 'clicks') {
                    Object.keys(this.chart.data).forEach(el => {
                        this.datacollection.labels.push(this.chart.data[el].date);
                        this.datacollection.datasets[0].data.push(this.chart.data[el].clicks + 0);
                        this.datacollection.datasets[0].label = trans('account.clicks');
                    });
                } else if (type = 'registered') {
                    Object.keys(this.chart.data).forEach(el => {
                        this.datacollection.labels.push(this.chart.data[el].date);
                        this.datacollection.datasets[0].data.push(this.chart.data[el].registered + 0);
                        this.datacollection.datasets[0].label = trans('account.registrations');
                    });
                }
                this.switchChart(this.typeChart);
            },
            switchComapre(type) {
                if (this.datacollection.datasets.length == 1) {
                    this.datacollection.datasets.push({
                        label: 'Все показы',
                        backgroundColor: '#9C27B0',
                        borderColor: '#9C27B0',
                        borderWidth: 2,
                        data: [40, 39, 10, 40, 39, 80, 40],
                        fill: false,
                        lineTension: 0,
                        pointBorderWidth: 4,
                        // cubicInterpolationMode: 'monotone'
                    });
                }
                this.datacollection.datasets[1].data = [];
                if (type == 'views') {
                    Object.keys(this.chart.data).forEach(el => {
                        this.datacollection.datasets[1].data.push(this.chart.data[el].views + 0);
                        this.datacollection.datasets[1].label = trans('account.views');
                    });
                } else if (type == 'clicks') {
                    Object.keys(this.chart.data).forEach(el => {
                        this.datacollection.datasets[1].data.push(this.chart.data[el].clicks + 0);
                        this.datacollection.datasets[1].label = trans('account.clicks');
                    });
                } else if (type = 'registered') {
                    Object.keys(this.chart.data).forEach(el => {
                        this.datacollection.datasets[1].data.push(this.chart.data[el].registered + 0);
                        this.datacollection.datasets[1].label = trans('account.registrations');
                    });
                }
                this.switchChart(this.typeChart);
            },
            fetchPartners() {
                let vm = this;
                axios.post('/account-get-partners', {
                    approved: true
                }).then(responce => {
                    vm.partners = responce.data;
                    responce.data.forEach(partner => {
                        vm.partnersIds.push(partner.id);
                    });
                    vm.fetchChartData();

                })
            },
            fetchChartData() {
                let vm = this;
                let data = {};
                data.partners = vm.partnersIds;
                data.dateType = vm.dateType;
                if (vm.from) {
                    data.from = vm.from;
                }
                if (vm.to) {
                    data.to = vm.to;
                }
                axios.post('/account-chart-data', {
                    data: data
                }).then(responce => {
                    vm.chart.data = responce.data.result;
                    vm.switchData('views');
                })
            },

        },
        created() {
            this.fetchPartners();
        },
        watch: {
            typeData: {
                immediate: false,
                handler(value) {
                    if (value) {
                        if (value == 1) {
                            this.switchData('views');
                        } else if (value == 2) {
                            this.switchData('clicks');
                        } else if (value == 3) {
                            this.switchData('registered');
                        }
                    }
                }
            },
            comparison: {
                immediate: false,
                handler(value) {
                    if (value > 1) {
                        if (value == 2) {
                            this.switchComapre('views');
                        } else if (value == 3) {
                            this.switchComapre('clicks');
                        } else if (value == 4) {
                            this.switchComapre('registered');
                        }
                    } else {
                        this.datacollection.datasets = this.datacollection.datasets.slice(0, 1);
                        this.switchChart();
                    }
                }
            }
        }
    }
</script>

<style scoped>

</style>
