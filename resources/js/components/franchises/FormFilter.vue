<template>
    <div>
        <form @submit.prevent="submit" class="form form-filter-objects">
            <div class="columns is-multiline">
                <g-g-select-input v-model="form.compositionPack" :label="'Состав паката'" :placeholder="'Выберите'"
                                  :options="compositionPackOptions"></g-g-select-input>
                <g-g-location-select-input v-model="form.country" :type="'country'"></g-g-location-select-input>
                <g-g-location-select-input v-model="form.city" :type="'city'"></g-g-location-select-input>
                <g-g-category-button v-model="form.category" :label="'Категория'">

                </g-g-category-button>
                <g-g-select-input v-model="form.direction" :label="'Направление'" :placeholder="'Выберите'"
                                  :options="directionOptions"></g-g-select-input>
                <g-g-range-slider v-model="form.profit" :adds="profitAdds" :placeholder="'Желаемая прибыль'"
                                  :label="'Чистая прибыль в месяц'"></g-g-range-slider>
                <g-g-range-slider v-model="form.payback" :adds="paybackAdds" :placeholder="'Количество месяцев'"
                                  :label="'Окупаемость в месяцах'" :max="36"></g-g-range-slider>
                <g-g-range-slider v-model="form.price" :adds="priceAdds" :placeholder="'Укажите сумму'"
                                  :label="'Инвестиции'"></g-g-range-slider>
                <g-g-check-box-input  :size="'is-2'" v-model="form.freeRoyalty" :label="'Без роялти'"></g-g-check-box-input>
                <g-g-check-box-input  :size="'is-3'" v-model="form.freeContribution" :label="'Без паушальн. взноса'"></g-g-check-box-input>

                <div class="column is-7">
                    <div class="columns has-justify-content-end form-controls">
                        <div class="column is-4">
                            <button @click="clearFilter" class="button is-fullwidth is-size-875" type="reset">
                                <span>&times;</span>
                                Сбросить поиск
                            </button>
                        </div>
                        <div class="column is-4">
                            <button class="button is-info has-text-weight-bold is-fullwidth" type="submit">Найти
                                франшизы
                            </button>
                        </div>
                        <div class="column is-4">
                            <a class="button is-link has-text-weight-bold is-fullwidth">
                                <span class="icon">+</span>
                                <span>Добавить франшизу</span>
                            </a>
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
    import GGLocationSelectInput from '../form/GGLocationSelectInput'
    import GGSelectInput from '../form/GGSelectInput'
    import GGCheckBoxInput from '../form/GGCheckBoxInput'
    import GGInput from '../form/GGInput'
    import GGRangeSlider from '../form/GGRangeSlider'

    export default {
        name: "FormFilterFranchise",
        components: {
            GGRangeSlider,
            GGInput,
            GGSelectInput,
            GGLocationSelectInput,
            GGCategoryButton,
            GGCheckBoxInput
        },
        data() {
            return {

                compositionPackOptions: [
                    {id: 1, name: 'Item 1'},
                    {id: 2, name: 'Item 2'},
                ],
                directionOptions: [
                    {id: 1, name: 'Item 1'},
                    {id: 2, name: 'Item 2'},
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
                    compositionPack:true,
                    country: 1,
                    city: 1,
                    category: null,
                    direction: null,
                    freeRoyalty:null,
                    freeContribution:null,
                    price: null,
                    profit: null,
                    payback: null,
                },
            }
        },
        methods: {
            submit() {
                this.$emit('change-filter', this.form);
            },
            clearFilter() {
                this.form.compositionPack = null;
                this.form.country = null;
                this.form.city = null;
                this.form.direction = null;
                this.form.price = null;
                this.form.profit = null;
                this.form.payback = null;
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
