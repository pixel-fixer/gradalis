<template>
    <div>
        <heading class="mb-6">Business</heading>

        <card class="bg-90 flex flex-col items-center justify-center" style="min-height: 300px">
            <datatable :columns="columns" class="table"></datatable>
        </card>
    </div>
</template>

<script>
    import datatable from './DataTable.vue';
    import Vue from 'vue';

    export default {
        components: {
            datatable
        },
        mounted() {
            //
        },
        data() {
            return {
                columns: [
                    {data: 'id', title: 'Id Объекта', className: 'text-left', searchable: false},
                    {data: 'name.ru', name: 'name', title: 'Наименование', className: 'text-left', searchable: true},
                    {data: 'status', title: 'Статус', searchable: true, className: 'text-left'},
                    {
                        data: 'price', name: 'price', title: 'Стоимость', className: 'text-left',
                        createdCell(cell, cellData, rowData) {
                            let price = Number(cellData).toLocaleString('ru-RU') + ' р.';
                            $(cell).empty().append(price);
                        }
                    },
                    {data: 'percent', title: 'Процент', className: 'text-left'},
                    {
                        data: 'sale',
                        orderable: false,
                        searchable: false,
                        title: 'Продано',
                        className: 'text-left',
                        createdCell(cell, cellData, rowData) {
                            let SaleButton = Vue.extend(require('./SaleButton'));
                            let instance = new SaleButton({
                                propsData: rowData
                            });
                            instance.$mount();
                            $(cell).empty().append(instance.$el);
                        }
                    },
                    {
                        data: 'edit',
                        orderable: false,
                        searchable: false,
                        className: 'text-left',
                        title: 'Редактировать',
                        createdCell(cell, cellData, rowData) {
                            let EditButton = Vue.extend(require('./EditButton'));
                            let instance = new EditButton({
                                propsData: rowData
                            });
                            instance.$mount();
                            $(cell).empty().append(instance.$el);
                        }
                    },

                ]
            }
        }
    }
</script>

<style>
    .paginate_button:before{
        background: none !important;
    }
</style>
