<template>
    <div>
        <heading class="mb-6">Objects</heading>
        <datatable :columns="columns" class="table"></datatable>
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
                    {data: 'id',title:'Id Объекта'},
                    {data: 'name.ru',name: 'name',title:'Наименование'},
                    {
                        data: 'type',
                        orderable: false,
                        searchable: false,
                        title:'Тип'
                    },
                    {data: 'status',title:'Статус'},
                    {data: 'price',title:'Стоимость'},
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
