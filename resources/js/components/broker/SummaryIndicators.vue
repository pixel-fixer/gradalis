<template>
    <div class="">
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
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect';
    import BarChart from './BarChart.js';
    import LineChart from './LineChart.js';
    import GGSelectInput from '../form/GGSelectInput';

    export default {
        name: "SummaryIndicators",
        components: {
            Multiselect, BarChart, LineChart, GGSelectInput
        },
        data() {
            return {
                form: {
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
