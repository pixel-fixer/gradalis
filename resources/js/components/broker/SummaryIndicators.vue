<template>
    <div class="">
        <div class="columns is-multiline">
            <div class="column">
                <div class="columns is-multiline">
                    <div class="column is-4">
                        <div class="field">
                            <label
                                class="label"><span>{{form.typeData.title}}</span></label>
                            <div class="control">
                                <multiselect
                                    v-model="form.typeData.selected"
                                    :deselect-label="form.typeData.deselectLabel"
                                    track-by="name"
                                    label="name"
                                    openDirection="bottom"
                                    :placeholder="form.typeData.placeholder"
                                    :options="form.typeData.options"
                                    :searchable="true"
                                    :allow-empty="false"
                                    :selectLabel="form.typeData.selectLabel"
                                    :selectedLabel="form.typeData.selectedLabel">
                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name
                                        }}
                                    </template>
                                </multiselect>
                            </div>
                        </div>
                    </div>
                    <div class="column is-4">
                        <div class="field">
                            <label
                                class="label"><span>{{form.comparison.title}}</span></label>
                            <div class="control">
                                <multiselect
                                    v-model="form.comparison.selected"
                                    :deselect-label="form.comparison.deselectLabel"
                                    track-by="name"
                                    label="name"
                                    openDirection="bottom"
                                    :placeholder="form.comparison.placeholder"
                                    :options="form.comparison.options"
                                    :searchable="true"
                                    :allow-empty="false"
                                    :selectLabel="form.comparison.selectLabel"
                                    :selectedLabel="form.comparison.selectedLabel">
                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name
                                        }}
                                    </template>
                                </multiselect>
                            </div>
                        </div>
                    </div>
                    <div class="column is-4">
                        <div class="field">
                            <label
                                class="label"><span>{{form.sorting.title}}</span></label>
                            <div class="control">
                                <multiselect
                                    v-model="form.sorting.selected"
                                    :deselect-label="form.sorting.deselectLabel"
                                    track-by="name"
                                    label="name"
                                    openDirection="bottom"
                                    :placeholder="form.sorting.placeholder"
                                    :options="form.sorting.options"
                                    :searchable="true"
                                    :allow-empty="false"
                                    :selectLabel="form.sorting.selectLabel"
                                    :selectedLabel="form.sorting.selectedLabel">
                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name
                                        }}
                                    </template>
                                </multiselect>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="column is-narrow">
                <div class="is-flex has-align-items-end h-full">
                    <div class="buttons mb-0 mr-1">
                        <button class="button h-3 is-outlined is-info is-size-875 px-1 mb-0">
                            <span class="icon icon-1 is-small"><img src="/svg/icons/ic_reload.svg" alt="" class="svg"></span>
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
                        <button class="button h-3 is-outlined is-info is-size-875 is-medium mb-0 is-active">
                            <span class="icon is-medium"><img src="/svg/icons/ic_line-chart.svg" alt="" class="svg"></span>
                        </button>
                        <button class="button h-3 is-outlined is-size-875 is-info is-medium mb-0">
                            <span class="icon is-medium"><img src="/svg/icons/ic_analytics-2.svg" alt="" class="svg"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <broker-ex-chart></broker-ex-chart>

    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect';

    export default {
        name: "SummaryIndicators",
        components: {
            Multiselect
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


                }
            }
        },
    }
</script>

<style scoped>

</style>
