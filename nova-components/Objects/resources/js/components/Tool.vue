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
                    {data: 'id',title:'Id Объекта',searchable: false},
                    {data: 'name.ru',name: 'name',title:'Наименование',searchable: true},
                    {
                        data: 'type',
                        orderable: true,
                        searchable: false,
                        title:'Тип'
                    },
                    {data: 'status',title:'Статус',searchable: true},
                    {data: 'price',title:'Стоимость'},
                    {
                        data: 'sale',
                        orderable: false,
                        searchable: false,
                        title:'Продано',
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
                        title:'Редактировать',
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
