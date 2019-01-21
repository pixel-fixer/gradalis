<template>
    <div class="px-view py-view mx-auto">
        <h1 class="mb-3 text-90 font-normal text-2xl">Объекты</h1>
        <div class="card relative">
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
                columns: [
                    {data: 'id', title: 'Id Объекта', className: 'text-left', searchable: false},
                    {data: 'name.ru', name: 'name', title: 'Наименование', className: 'text-left', searchable: true},
                    {
                        data: 'type',
                        orderable: true,
                        searchable: false,
                        title: 'Тип',
                        className: 'text-left'

                    },
                    {data: 'status', title: 'Статус', searchable: true, className: 'text-left'},
                    {data: 'price.ru',name:'price', title: 'Стоимость', className: 'text-left',
                        createdCell(cell, cellData, rowData) {
                            let price = Number(cellData).toLocaleString('ru-RU')+' р.';
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
    /* Scoped Styles */
</style>
