<template>
    <div class="">
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
            <g-g-select-input v-model="time" :size="'is-4'"
                              :placeholder="trans('account.time.placeholder')"
                              :label="trans('account.time.title')"
                              :searchable="true" :options="trans('account.time.options')"></g-g-select-input>
        </div>
        <div class="chart-time-zone is-size-875">
            (GMT+03:00) Москва
        </div>
        <real-time-chart :chartCompareData="chartCompare" :chartTypeTime="chartTypeTime" :chartTypeData="chartType"/>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect';
    import LineChart from '../charts/LineChart.js';
    import GGSelectInput from '../form/GGSelectInput';
    import RealTimeChart from '../RealTimeChart'

    export default {
        name: "BrokerRealTimeIndicators",
        components: {
            Multiselect, LineChart, GGSelectInput, RealTimeChart
        },

        data() {
            return {
                typeData: 1,
                time: 1,
                comparison: 1,
            }
        },
        computed:{
            chartType: {
                get: function () {
                    return this.typeData
                },
            },
            chartCompare: {
                get: function () {
                    return this.comparison
                },
            },
            chartTypeTime: {
                get: function () {
                    if(this.time == 1){
                        return 'minute'
                    }else if(this.time == 2){
                        return 'hour'
                    }
                },
            }
        },
    }
</script>

<style scoped>

</style>
