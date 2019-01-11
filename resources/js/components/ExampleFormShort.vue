<template>
    <div>
        <form @submit.prevent="submit" v-if="show" class="form-inline">
            <div class="columns">
                <div class="column">
                    <multiselect v-model="form.city.selected"
                                 :deselect-label="form.city.deselectLabel"
                                 track-by="name"
                                 label="name"
                                 :placeholder="form.city.placeholder"
                                 :options="form.city.options"
                                 :searchable="false"
                                 :allow-empty="false"
                                 :selectLabel="form.city.selectLabel"
                                 :selectedLabel="form.city.selectedLabel">
                        <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                    </multiselect>
                </div>
                <div class="column">
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
                <div class="column">
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
                <div class="column">
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
                <div class="column">
                    <div class="button-wrap">
                        <button class="button is-link has-text-weight-bold is-fullwidth" type="submit">Найти бизнес</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'

    export default {
        name: "ExampleFormShort",
        components: {Multiselect},
        data() {
            return {
                selected: null,
                options: ['list', 'of', 'options'],

                form: {
                    city: {
                        selected: null,
                        placeholder: 'Город',
                        selectedLabel: 'Выбрано',
                        selectLabel: '',
                        deselectLabel: '',
                        options: [
                            {id: 'moscow', name: 'Москва'},
                            {id: 'belgorod', name: 'Белгород'},
                            {id: 'kazan', name: 'Казань'},
                            {id: 'voronezh', name: 'Воронеж'}
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
                        placeholder: 'Категория бизнеса',
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
                    payback: {
                        selected: null,
                        placeholder: 'Окупаемость',
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
