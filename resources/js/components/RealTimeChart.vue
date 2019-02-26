<script>
    import {Line} from 'vue-chartjs'
    import 'chartjs-plugin-streaming';
    import 'chartjs-plugin-zoom';
    import 'moment';

    export default {
        name: "RealTimeChart",
        extends: Line,
        props: {
            chartTypeData: {default: 1},
            chartCompareData: {default: 1},
            chartTypeTime: {default: 'second'}
        },
        data() {
            return {
                user: null,
                partner: null,
                label: trans('account.views'),
                compareLabel: null,
                chart: {
                    data: [0]
                },
                datacollection: {
                    labels: ['- 10 мин.', '- 9 мин.', '- 8 мин.', '- 7 мин.', '- 6 мин.', '- 5 мин.', '- 4 мин.', '- 3 мин.', '- 2 мин.', '- 1 мин.', '0 мин.'],
                    datasets: [
                        {
                            label: trans('account.views'),
                            backgroundColor: '#0070D9',
                            borderColor: '#0070D9',
                            borderWidth: 2,
                            data: [],
                            fill: false,
                            lineTension: 0,
                            pointBorderWidth: 4,
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'second',
                                displayFormats: {
                                    second: 'H:mm:ss'
                                },
                                minUnit: 'second',
                            },
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
                                stepSize: 1,
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
                doRender: true,
                timeType: 'minute',
                time: null,
                rendered: false,
                interval: 1000 * 60,
                workerId: null
            }
        },
        methods: {
            worker() {
                this.workerId = setInterval(() => {
                    this.datacollection.datasets[0].data.shift();
                    if (this.doRender) {
                        this.fetchChartData();
                    } else {
                        this.datacollection.datasets[0].data.push(0)
                        this.$data._chart.update();
                    }
                }, this.interval)
            },
            fetchChartData() {
                let vm = this;
                axios.post('/broker-chart-data', {
                    time: vm.time,
                    type: vm.timeType
                }).then(responce => {
                    vm.chart.data = Object.entries(responce.data);
                    if (vm.time) {
                        let val = vm.chart.data.shift();
                        if (this.chartTypeData == 1) {
                            vm.datacollection.datasets[0].data.push(val[1].views)
                        } else if (this.chartTypeData == 2) {
                            vm.datacollection.datasets[0].data.push(val[1].clicks)
                        } else if (this.chartTypeData == 3) {
                            vm.datacollection.datasets[0].data.push(val[1].registered)
                        }
                        if (this.chartCompareData > 1) {
                            vm.datacollection.datasets[1].data.shift()
                        }
                        if (this.chartCompareData == 2) {
                            vm.datacollection.datasets[1].data.push(val[1].views)
                        } else if (this.chartCompareData == 3) {
                            vm.datacollection.datasets[1].data.push(val[1].clicks)
                        } else if (this.chartCompareData == 4) {
                            vm.datacollection.datasets[1].data.push(val[1].registered)
                        }
                        vm.time = null;
                        this.$data._chart.update();
                    } else {
                        vm.datacollection.datasets[0].data = [];
                        if (this.chartTypeData == 1) {
                            vm.datacollection.datasets[0].label = trans('account.views');
                            vm.chart.data.forEach(el => {
                                vm.datacollection.datasets[0].data.push(el[1].views + 0);
                            });
                        } else if (this.chartTypeData == 2) {
                            vm.datacollection.datasets[0].label = trans('account.clicks');
                            vm.chart.data.forEach(el => {
                                vm.datacollection.datasets[0].data.push(el[1].clicks + 0);
                            });
                        } else if (this.chartTypeData == 3) {
                            vm.datacollection.datasets[0].label = trans('account.registrations');
                            vm.chart.data.forEach(el => {
                                vm.datacollection.datasets[0].data.push(el[1].registered + 0);
                            });
                        }
                        if (vm.datacollection.datasets.length > 1) {
                            vm.datacollection.datasets[1].data = [];
                        }
                        if (this.chartCompareData == 2) {
                            vm.datacollection.datasets[1].label = trans('account.views');
                            vm.chart.data.forEach(el => {
                                vm.datacollection.datasets[1].data.push(el[1].views + 0);
                            });
                        } else if (this.chartCompareData == 3) {
                            vm.datacollection.datasets[1].label = trans('account.clicks');
                            vm.chart.data.forEach(el => {
                                vm.datacollection.datasets[1].data.push(el[1].clicks + 0);
                            });
                        } else if (this.chartCompareData == 4) {
                            vm.datacollection.datasets[1].label = trans('account.registrations');
                            vm.chart.data.forEach(el => {
                                vm.datacollection.datasets[1].data.push(el[1].registered + 0);
                            });
                        }
                        if (vm.rendered) {
                            vm.$data._chart.update();
                        } else {
                            this.renderChart(vm.datacollection,
                                vm.options);
                            vm.rendered = true;
                        }
                    }
                    vm.doRender = false;
                })
            },
            switchChart(type = 'line') {
                if (type == 'bar') {
                    this.typeChart = 'bar';
                } else if (type == 'line') {
                    this.typeChart = 'line';
                }
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
            socketConnect() {
                let vm = this;
                if (typeof window.Echo == 'undefined')
                    return;
                window.Echo
                    .channel('chart.data.' + this.partner.id)
                    .listen('NewChartData', (e) => {
                        vm.doRender = true;
                        if (vm.timeType == 'minute') {
                            vm.time = this.$moment(e.counter.updated_at).format('YYYY-MM-DD HH:mm') + ':00';
                        } else if (vm.timeType == 'hour') {
                            vm.time = this.$moment(e.counter.updated_at).format('YYYY-MM-DD HH') + ':00:00';
                        }
                    })
            },
        },
        mounted() {
            this.partner = this.$store.state.partner;
            this.socketConnect();
            this.fetchChartData();
            this.worker();
        },
        watch: {
            chartTypeData: {
                immediate: false,
                handler(value) {
                    this.doRender = true;
                    this.time = null;
                    this.typeChart = value;
                    this.rendered = false;
                    clearInterval(this.workerId);
                    this.fetchChartData();
                    this.worker();
                }
            },
            chartCompareData: {
                immediate: false,
                handler(value) {
                    this.doRender = true;
                    this.time = null;
                    this.typeChart = value;
                    this.rendered = false;
                    if (value > 1 && this.datacollection.datasets.length == 1) {
                        this.datacollection.datasets.push({
                            label: 'Все показы',
                            backgroundColor: '#9C27B0',
                            borderColor: '#9C27B0',
                            borderWidth: 2,
                            data: [],
                            fill: false,
                            lineTension: 0,
                            pointBorderWidth: 4,
                        });
                    } else if (value == 1 && this.datacollection.datasets.length > 1) {
                        this.datacollection.datasets.pop()
                    }
                    clearInterval(this.workerId);
                    this.fetchChartData();
                    this.worker();
                }
            },
            chartTypeTime: {
                immediate: false,
                handler(value) {
                    this.rendered = false;
                    this.timeType = value;
                    this.doRender = true;
                    this.time = null;
                    if (value == 'minute') {
                        this.datacollection.labels = ['- 10 мин.', '- 9 мин.', '- 8 мин.', '- 7 мин.', '- 6 мин.', '- 5 мин.', '- 4 мин.', '- 3 мин.', '- 2 мин.', '- 1 мин.', '0 мин.']
                        this.interval = 1000 * 60;
                    } else if (value == 'hour') {
                        this.datacollection.labels = ['- 10 ч.', '- 9 ч.', '- 8 ч.', '- 7 ч.', '- 6 ч.', '- 5 ч.', '- 4 ч.', '- 3 ч.', '- 2 ч.', '- 1 ч.', '0 ч.']
                        this.interval = 1000 * 60 * 60;
                    }
                    clearInterval(this.workerId);
                    this.fetchChartData();
                    this.worker();
                }
            }
        }
    }
</script>

<style scoped>

</style>
