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
                    {data: 'id',title:'Id Инвайта'},
                    {data: 'first_name',name: 'users.first_name',title:'Имя приглашенного пользователя'},
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
