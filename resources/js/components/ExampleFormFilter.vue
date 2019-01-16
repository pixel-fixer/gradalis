<template>
    <div>
        <form @submit.prevent="submit" v-if="show" class="form form-filter-objects">
            <div class="columns is-multiline">
                <div class="column is-3">
                    <div class="field">
                        <label class="label">Тип инвестирования</label>
                        <div class="control">
                            <multiselect v-model="form.type.selected"
                                         :deselect-label="form.type.deselectLabel"
                                         track-by="name"
                                         label="name"
                                         :placeholder="form.type.placeholder"
                                         :options="form.type.options"
                                         :searchable="false"
                                         :allow-empty="false"
                                         :selectLabel="form.type.selectLabel"
                                         :selectedLabel="form.type.selectedLabel">
                                <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                            </multiselect>
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="field">
                        <label class="label">Страна</label>
                        <div class="control">
                            <multiselect v-model="form.country.selected"
                                         :deselect-label="form.country.deselectLabel"
                                         track-by="name"
                                         label="name"
                                         :placeholder="form.country.placeholder"
                                         :options="form.country.options"
                                         :searchable="false"
                                         :allow-empty="false"
                                         :selectLabel="form.country.selectLabel"
                                         :selectedLabel="form.country.selectedLabel">
                                <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                            </multiselect>
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="field">
                        <label class="label">Регион</label>
                        <div class="control">
                            <multiselect v-model="form.region.selected"
                                         :deselect-label="form.region.deselectLabel"
                                         track-by="name"
                                         label="name"
                                         :placeholder="form.region.placeholder"
                                         :options="form.region.options"
                                         :searchable="false"
                                         :allow-empty="false"
                                         :selectLabel="form.region.selectLabel"
                                         :selectedLabel="form.region.selectedLabel">
                                <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                            </multiselect>
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="field">
                        <label class="label">Категория бизнеса</label>
                        <div class="control">
                            <multiselect v-model="form.category.selected"
                                         :deselect-label="form.category.deselectLabel"
                                         track-by="name"
                                         label="name"
                                         :placeholder="form.category.placeholder"
                                         :options="form.category.options"
                                         :searchable="false"
                                         :allow-empty="false"
                                         :selectLabel="form.category.selectLabel"
                                         :selectedLabel="form.category.selectedLabel">
                                <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                            </multiselect>
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="field">
                        <label class="label">Цена</label>
                        <div class="control">
                            <multiselect v-model="form.price.selected"
                                         :deselect-label="form.price.deselectLabel"
                                         track-by="name"
                                         label="name"
                                         :placeholder="form.price.placeholder"
                                         :options="form.price.options"
                                         :searchable="false"
                                         :allow-empty="false"
                                         :selectLabel="form.price.selectLabel"
                                         :selectedLabel="form.price.selectedLabel">
                                <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                            </multiselect>
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="field">
                        <label class="label">Чистая прибыль в месяц</label>
                        <div class="control">
                            <multiselect v-model="form.profit.selected"
                                         :deselect-label="form.profit.deselectLabel"
                                         track-by="name"
                                         label="name"
                                         :placeholder="form.profit.placeholder"
                                         :options="form.profit.options"
                                         :searchable="false"
                                         :allow-empty="false"
                                         :selectLabel="form.profit.selectLabel"
                                         :selectedLabel="form.profit.selectedLabel">
                                <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                            </multiselect>
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="field">
                        <label class="label">Окупаемость в месяц</label>
                        <div class="control">
                            <multiselect v-model="form.payback.selected"
                                         :deselect-label="form.payback.deselectLabel"
                                         track-by="name"
                                         label="name"
                                         :placeholder="form.payback.placeholder"
                                         :options="form.payback.options"
                                         :searchable="false"
                                         :allow-empty="false"
                                         :selectLabel="form.payback.selectLabel"
                                         :selectedLabel="form.payback.selectedLabel">
                                <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                            </multiselect>
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="field">
                        <label class="label">Название или ID</label>
                        <div class="control has-icons-left">
                            <input id="email" type="text"
                                   class="input is-size-875" name="query"
                                   :value="form.query.value"
                                   :placeholder="form.query.placeholder"
                            >
                            <span class="icon is-small is-left">
                                  <img src="/svg/icons/ic_search.svg" alt="">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="column is-full">
                    <div class="columns">
                        <div class="column is-6 has-align-self-center">
                            <div class="columns">
                                <div class="column is-narrow">
                                    <div class="field">
                                        <div class="control">
                                            <label class="checkbox is-size-875 is-marginless" for="check_property">
                                                <input type="checkbox" name="check_property"
                                                       id="check_property" checked>
                                                <span>В собственность</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-narrow">
                                    <div class="field">
                                        <div class="control">
                                            <label class="checkbox is-size-875 is-marginless" for="check_profit">
                                                <input type="checkbox" name="check_profit"
                                                       id="check_profit">
                                                <span>Указана прибыль</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-6">
                            <div class="columns has-justify-content-end form-controls">
                                <div class="column is-narrow">
                                    <button class="button is-fullwidth is-size-875" type="reset">
                                        <span>&times;</span>
                                        Сбросить поиск
                                    </button>
                                </div>
                                <div class="column is-6">
                                    <button class="button is-link has-text-weight-bold is-fullwidth" type="submit">Найти бизнес
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'

    export default {
        name: "ExampleFormFilter",
        components: {Multiselect},
        data() {
            return {
                selected: null,
                options: ['list', 'of', 'options'],

                form: {
                    type: {
                        selected: null,
                        placeholder: 'Выберите тип',
                        selectedLabel: 'Выбрано',
                        selectLabel: '',
                        deselectLabel: '',
                        options: [
                            {id: 'type_1', name: 'Бизнес в продаже'},
                            {id: 'type_2', name: 'Бизнес в аренде'},
                        ]
                    },
                    country: {
                        selected: null,
                        placeholder: 'Страна',
                        selectedLabel: 'Выбрано',
                        selectLabel: '',
                        deselectLabel: '',
                        options: [
                            {id: 'ru', name: 'Россия'},
                            {id: 'pl', name: 'Польша'},
                        ]
                    },
                    region: {
                        selected: null,
                        placeholder: 'Регион',
                        selectedLabel: 'Выбрано',
                        selectLabel: '',
                        deselectLabel: '',
                        options: [
                            {id: '1', name: 'Region 1'},
                            {id: '2', name: 'Region 2'},
                            {id: '3', name: 'Region 3'},
                            {id: '4', name: 'Region 4'}
                        ]
                    },
                    category: {
                        selected: null,
                        placeholder: 'Категория',
                        selectedLabel: 'Выбрано',
                        selectLabel: '',
                        deselectLabel: '',
                        options: [
                            {id: '1', name: 'Cat 1'},
                            {id: '2', name: 'Cat 2'},
                            {id: '3', name: 'Cat 3'},
                            {id: '4', name: 'Cat 4'}
                        ]
                    },
                    price: {
                        selected: null,
                        placeholder: 'Укажите цену',
                        selectedLabel: 'Выбрано',
                        selectLabel: '',
                        deselectLabel: '',
                        options: [
                            {id: '1', name: '1 - 10'},
                            {id: '2', name: '11 - 50'},
                            {id: '3', name: '51 - 100'},
                            {id: '4', name: '100 - 150'}
                        ]
                    },
                    profit: {
                        selected: null,
                        placeholder: 'Желаемая прибыль',
                        selectedLabel: 'Выбрано',
                        selectLabel: '',
                        deselectLabel: '',
                        options: [
                            {id: '1', name: 'profit 1'},
                            {id: '2', name: 'profit 2'},
                            {id: '3', name: 'profit 3'},
                            {id: '4', name: 'profit 4'}
                        ]
                    },
                    payback: {
                        selected: null,
                        placeholder: 'Окупаемость',
                        selectedLabel: 'Выбрано',
                        selectLabel: '',
                        deselectLabel: '',
                        options: [
                            {id: '1', name: 'payback 1'},
                            {id: '2', name: 'payback 2'},
                            {id: '3', name: 'payback 3'},
                            {id: '4', name: 'payback 4'}
                        ]
                    },
                    query: {
                        placeholder: 'Поиск',
                        value: '',
                    }
                },
                show: true,
            }
        },
        methods: {
            submit() {
                console.log('submit!');
            },
        }
    }
</script>

<style scoped>

</style>
