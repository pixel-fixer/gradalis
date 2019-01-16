<template>
    <table class="table w-full">
        <thead>
        <tr>
            <th v-for="column in parameters.columns" v-html="title(column)"></th>
        </tr>
        </thead>
        <tfoot v-if="footer">
        <tr>
            <th v-for="column in parameters.columns" v-html="column.footer"></th>
        </tr>
        </tfoot>
    </table>
</template>

<script>
    window.$ = window.jQuery = require('jquery');
    require('datatables.net');
    require('datatables.net-bs');
    require('datatables.net-buttons');
    require('datatables.net-buttons-bs');
    export default{
        data() {
            return {
                dataTable: {},
            }
        },
        methods: {
            title(column) {
                return column.title || this.titleCase(column.title);
            },
            titleCase(str) {
                return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
            }
        },
        computed: {
            parameters() {
                const vm = this;
                return window.$.extend({
                    serverSide: true,
                    processing: true
                }, {
                    ajax: this.ajax,
                    columns: this.columns,
                    aLengthMenu: [[10, 25, 50, -1], ["10", "25", "50", "All"]],
                    language: {
                        "processing": "Подождите...",
                        "search": "Поиск:",
                        "lengthMenu": "Показать _MENU_ записей",
                        "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
                        "infoEmpty": "Записи с 0 до 0 из 0 записей",
                        "infoFiltered": "(отфильтровано из _MAX_ записей)",
                        "infoPostFix": "",
                        "loadingRecords": "Загрузка записей...",
                        "zeroRecords": "Записи отсутствуют.",
                        "emptyTable": "В таблице отсутствуют данные",
                        "paginate": {
                            "first": "Первая",
                            "previous": "Предыдущая",
                            "next": "Следующая",
                            "last": "Последняя"
                        },
                        "aria": {
                            "sortAscending": ": активировать для сортировки столбца по возрастанию",
                            "sortDescending": ": активировать для сортировки столбца по убыванию"
                        }
                    },
                    createdRow(...args) {
                        vm.$emit('created-row', ...args);
                    },
                    drawCallback(...args) {
                        vm.$emit('draw', ...args);
                    },
                    footerCallback(...args) {
                        vm.$emit('footer', ...args);
                    },
                    formatNumber(...args) {
                        vm.$emit('format', ...args);
                    },
                    headerCallback(...args) {
                        vm.$emit('header', ...args);
                    },
                    infoCallback(...args) {
                        vm.$emit('info', ...args);
                    },
                    initComplete(...args) {
                        vm.$emit('init', ...args);
                    },
                    preDrawCallback(...args) {
                        vm.$emit('pre-draw', ...args);
                    },
                    rowCallback(...args) {
                        vm.$emit('draw-row', ...args);
                    },
                    stateLoadCallback(...args) {
                        vm.$emit('state-load', ...args);
                    },
                    stateLoaded(...args) {
                        vm.$emit('state-loaded', ...args);
                    },
                    stateLoadParams(...args) {
                        vm.$emit('state-load-params', ...args);
                    },
                    stateSaveCallback(...args) {
                        vm.$emit('state-save', ...args);
                    },
                    stateSaveParams(...args) {
                        vm.$emit('state-save-params', ...args);
                    },
                }, this.options);
            }
        },
        props: {
            footer: { default: false },
            columns: { type: Array },
            ajax: { default: '/nova-vendor/referrals/data' },
            options: { }
        },
        mounted() {
            this.dataTable = window.$(this.$el).DataTable(this.parameters);
        },
        destroyed() {
            this.dataTable.destroy();
        }
    }
</script>
