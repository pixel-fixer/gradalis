<template>
    <div class="filter-services">
        <form action="">
            <div class="columns is-multiline">
                <g-g-select-input v-model="form.service_id" :size="'is-2-desktop is-4-tablet'"
                                  :placeholder="'Выберите'"
                                  :label="'Выберите услугу'"
                                  :searchable="true"
                                  :options="servicesOptions">
                </g-g-select-input>
                <g-g-location-select-input v-model="form.country_id" :size="'is-2-desktop is-4-tablet'"></g-g-location-select-input>
                <g-g-select-input v-model="form.region_id" :size="'is-2-desktop is-4-tablet'"
                                  :placeholder="'Выберите'"
                                  :label="'Регион'"
                                  :searchable="true"
                                  :options="regionOptions">
                </g-g-select-input>
                <g-g-select-input v-model="form.city_id" :size="'is-2-desktop is-4-tablet'"
                                  :placeholder="'Выберите'"
                                  :label="'Город'"
                                  :searchable="true"
                                  :options="cityOptions">
                </g-g-select-input>
                <g-g-input :size="'is-2-desktop is-4-tablet'"
                           v-model="form.query"
                           :label="'Ключевое слово'"
                           :placeholder="'Запрос'">
                </g-g-input>

                <div class="column is-2-desktop is-4-tablet has-align-self-end">
                    <button class="button is-info is-size-875 has-text-weight-bold h-3 is-fullwidth">Найти подрядчика</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import GGSelectInput from '../form/GGSelectInput'
    import GGInput from '../form/GGInput'
    import GGLocationSelectInput from '../form/GGLocationSelectInput';

    export default {
        name: "ServicesFilter",
        components: {
            GGInput,
            GGSelectInput,
            GGLocationSelectInput
        },
        data() {
            return {
                servicesOptions: [
                    {id: 1, name: 'Для иностранцев'},
                    {id: 2, name: 'Для веб разработчиков'},
                    {id: 3, name: 'Для того чувака справа'},
                    {id: 4, name: 'Для художника'},
                ],
                regionOptions: [
                    {id: 1, name: 'Region 1'},
                    {id: 2, name: 'Region 2 Very Very long title'},
                    {id: 3, name: 'Region 3'},
                    {id: 4, name: 'Region 4'}
                ],
                cityOptions: [
                    {id: 1, name: 'City 1'},
                    {id: 2, name: 'City 2 Very Very long title'},
                    {id: 3, name: 'City 3'},
                    {id: 4, name: 'City 4'}
                ],
                form: {
                    service_id: null,
                    country_id: null,
                    region_id: null,
                    city_id: null,
                    query: null
                },
            }
        },
        methods: {
            submit() {
                console.log('submit');
            },
        },
    }
</script>

<style scoped>

</style>
