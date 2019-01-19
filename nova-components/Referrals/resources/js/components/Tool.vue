<template>
    <div class="px-view py-view mx-auto">
        <h1 class="mb-3 text-90 font-normal text-2xl">Статистика</h1>
        <div class="card relative">
            <div class="max-w-xls flex rounded overflow-hidden">
                <div class="px-4 py-2 m-2">
                    <div class="font-bold text-xl mb-2">Клики</div>
                    <p class="text-grey-darker text-base">
                        Всего кликов за год: {{clickCountYear}}
                    </p>
                    <p class="text-grey-darker text-base">
                        Всего кликов за месяц: {{clickCountMonth}}
                    </p>
                    <p class="text-grey-darker text-base">
                        Всего кликов за неделю: {{clickCountWeek}}
                    </p>
                </div>

                <div class="px-4 py-2 m-2">
                    <div class="font-bold text-xl mb-2">Регистрации</div>
                    <p class="text-grey-darker text-base">
                        Всего регистраций за год: {{regCountYear}}
                    </p>
                    <p class="text-grey-darker text-base">
                        Всего регистраций за месяц: {{regCountMonth}}
                    </p>
                    <p class="text-grey-darker text-base">
                        Всего регистраций за неделю: {{regCountWeek}}
                    </p>
                </div>
            </div>
            <datatable :columns="columns" class="table"></datatable>
        </div>
    </div>
</template>

<script>
    import datatable from './DataTable.vue';
    import Vue from 'vue';
    export default {
        components: {
            datatable
        },
        data() {
            return {
                clickCountYear: 0,
                clickCountMonth: 0,
                clickCountWeek: 0,

                regCountYear: 0,
                regCountMonth: 0,
                regCountWeek: 0,
                columns: [
                    {data: 'name', title: 'Ф.И.О',className:'text-left'},
                    {data: 'reg_date', title: 'Дата регистрации',className:'text-left'},
                    {data: 'clicks', title: 'Всего кликов',className:'text-left'},
                    {data: 'uniq', title: 'Уник. кликов',className:'text-left'},
                    {data: 'regs', title: 'Регистрации',className:'text-left'},
                    {
                        data: null,
                        orderable: false,
                        searchable: false,
                        title: 'Детали',
                        className: 'text-left',
                        createdCell(cell, cellData, rowData) {
                            let DetailButton  = Vue.extend(require('./DetailButton'));
                            let instance = new DetailButton();
                            instance.$mount();
                            $(cell).empty().append(instance.$el);
                        }
                    },
                ]
            }
        },
        mounted() {
            this.getStatistics();
        },
        methods: {
            getStatistics() {
                let vm = this;
                axios.get('/nova-vendor/referrals/statistics').then(
                    responce => {
                        let data = responce.data;
                        vm.clickCountYear = data.clickCountYear;
                        vm.clickCountMonth = data.clickCountMonth;
                        vm.clickCountWeek = data.clickCountWeek;

                        vm.regCountYear = data.regCountYear;
                        vm.regCountMonth = data.regCountMonth;
                        vm.regCountWeek = data.regCountWeek;
                    });
            },

        }
    }
</script>

<style>
    /* Scoped Styles */
</style>
