<template>
    <div class="">
        <div class="columns is-multiline">
            <g-g-select-input v-model="form.typeData.selected" :size="'is-4'"
                              :placeholder="form.typeData.placeholder" :label="form.typeData.title"
                              :searchable="true" :options="form.typeData.options"></g-g-select-input>
            <g-g-select-input v-model="form.comparison.selected" :size="'is-4'"
                              :placeholder="form.comparison.placeholder" :label="form.comparison.title"
                              :searchable="true" :options="form.comparison.options"></g-g-select-input>
            <g-g-select-input v-model="form.time.selected" :size="'is-4'"
                              :placeholder="form.time.placeholder" :label="form.time.title"
                              :searchable="true" :options="form.time.options"></g-g-select-input>
        </div>
        <div class="chart-time-zone is-size-875">
            (GMT+03:00) Москва
        </div>

        <div class="mb-2">
            <line-chart :chartdata="datacollection" :height="260"/>
        </div>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect';
    import LineChart from './LineChart.js';
    import GGSelectInput from '../form/GGSelectInput';

    export default {
        name: "BrokerSummaryIndicators",
        components: {
            Multiselect, LineChart, GGSelectInput
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
                    time: {
                        selected: null,
                        title: 'Время',
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
                    labels: ['- 6 мин.', '- 5 мин.', '- 4 мин.', '- 3 мин.', '- 2 мин.', '- 1 мин.', '0 мин.'],
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
                        }
                    ]
                },
            }
        },
    }
</script>

<style scoped>

</style>
