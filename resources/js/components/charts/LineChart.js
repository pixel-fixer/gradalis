import {Line} from 'vue-chartjs'

export default {
    extends: Line,
    props: {
        chartdata: {
            type: Object,
            default: null
        },
        options: {
            type: Object,
            default: function () {
                return {
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
                }
            }
        }
    },
    mounted() {
        this.renderChart(this.chartdata, this.options)
    },
    methods: {

    }
}
