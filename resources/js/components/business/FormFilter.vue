<template>
    <div>
        <form @submit.prevent="submit" class="form form-filter-objects">
            <div class="columns is-multiline">
                <g-g-select-input v-model="form.type" :label="'Тип инвестирования'" :placeholder="'Выберите тип'"
                                  :options="typeOptions"></g-g-select-input>
                <g-g-select-input v-model="form.country" :label="'Страна'" :placeholder="'Страна'"
                                  :options="countryOptions"></g-g-select-input>
                <g-g-select-input v-model="form.region" :label="'Регион'" :placeholder="'Регион'"
                                  :options="regionOptions"></g-g-select-input>
                <g-g-category-button v-model="form.category">

                </g-g-category-button>
                <g-g-range-slider v-model="form.price" :adds="priceAdds" :placeholder="'Укажите цену'"
                                  :label="'Цена'"></g-g-range-slider>
                <g-g-range-slider v-model="form.profit" :adds="profitAdds" :placeholder="'Желаемая прибыль'"
                                  :label="'Чистая прибыль в месяц'"></g-g-range-slider>
                <g-g-range-slider v-model="form.payback" :adds="paybackAdds" :placeholder="'Количество месяцев'"
                                  :label="'Окупаемость в месяцах'" :max="36"></g-g-range-slider>
                <g-g-text-input :label="'Название или ID'" v-model="form.query"></g-g-text-input>
                <div class="column is-full">
                    <div class="columns">
                        <div class="column is-6 has-align-self-center">

                        </div>
                        <div class="column is-6">
                            <div class="columns has-justify-content-end form-controls">
                                <div class="column is-narrow">
                                    <button @click="clearFilter" class="button is-fullwidth is-size-875" type="reset">
                                        <span>&times;</span>
                                        Сбросить поиск
                                    </button>
                                </div>
                                <div class="column is-6">
                                    <button class="button is-link has-text-weight-bold is-fullwidth" type="submit">Найти
                                        бизнес
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <portal-target name="modals"></portal-target>
            </div>
        </form>

    </div>
</template>

<script>
    import GGCategoryButton from '../form/GGCategoryButton'
    import GGSelectInput from '../form/GGSelectInput'
    import GGTextInput from '../form/GGTextInput'
    import GGRangeSlider from '../form/GGRangeSlider'

    export default {
        name: "ExampleFormFilter",
        components: {
            GGRangeSlider,
            GGTextInput,
            GGSelectInput,
            GGCategoryButton
        },
        data() {
            return {
                typeOptions: [
                    {id: 'type_1', name: 'Бизнес в продаже'},
                    {id: 'type_2', name: 'Бизнес в аренде'},
                ],
                countryOptions: [
                    {id: 1, name: 'Россия'},
                    {id: 2, name: 'Польша'},
                ],
                regionOptions: [
                    {id: 1, name: 'Region 1'},
                    {id: 2, name: 'Region 2'},
                    {id: 3, name: 'Region 3'},
                    {id: 4, name: 'Region 4'}
                ],
                profitAdds: {
                    add1: {
                        text: 'до €500 тыс.',
                        value: [
                            0,
                            500000
                        ]
                    },
                    add2: {
                        text: 'до €1 млн.',
                        value: [
                            0,
                            1000000
                        ]
                    },
                    add3: {
                        text: 'до €2 млн.',
                        value: [
                            0,
                            2000000
                        ]
                    }
                },
                priceAdds: {
                    add1: {
                        text: 'до €500 тыс.',
                        value: [
                            0,
                            500000
                        ]
                    },
                    add2: {
                        text: 'до €1 млн.',
                        value: [
                            0,
                            1000000
                        ]
                    },
                    add3: {
                        text: 'до €2 млн.',
                        value: [
                            0,
                            2000000
                        ]
                    }
                },
                paybackAdds: {
                    add1: {
                        text: 'до 12',
                        value: [
                            0,
                            12
                        ]
                    },
                    add2: {
                        text: 'до 24',
                        value: [
                            0,
                            24
                        ]
                    },
                    add3: {
                        text: 'до 36',
                        value: [
                            0,
                            36
                        ]
                    }
                },
                form: {
                    type: null,
                    country: null,
                    category:null,
                    region: null,
                    price: null,
                    profit: null,
                    payback: null,
                    query: null
                },
            }
        },
        methods: {
            submit() {
                this.$emit('change-filter', this.form);
            },
            clearFilter() {
                this.form.type = null;
                this.form.country = null;
                this.form.region = null;
                this.form.price = null;
                this.form.profit = null;
                this.form.payback = null;
                this.form.query = null;
            },
            toggleModalCategory() {
                this.showModalCategory = true;
                return true;
            }
        },
    }
</script>

<style scoped>

</style>
