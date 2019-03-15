<template>
    <form @submit.prevent="submit">
        <div class="columns is-multiline">
            <g-g-input :size="'is-6'"
                       v-model="form.name" :label="'Ваше имя'"
                       :placeholder="'Введите Ваше имя'"></g-g-input>
            <g-g-input :size="'is-6'"
                       v-model="form.surname" :label="'Ваша фамилия'"
                       :placeholder="'Введите Вашу фамилию'"></g-g-input>
            <g-g-input :size="'is-6'" :type="'email'"
                       v-model="form.email" :label="'Контактный email'"
                       :placeholder="'Введите email'"></g-g-input>
            <g-g-input :size="'is-6'" :type="'tel'"
                       v-model="form.phone" :label="'Контактный телефон'"
                       :placeholder="'+48 (456) 566-09-23'"></g-g-input>
            <g-g-location-select-input v-model="form.country_id" :type="'country'"  :size="'is-6'"></g-g-location-select-input>
            <g-g-location-select-input v-model="form.city_id" :type="'city'"  :size="'is-6'"></g-g-location-select-input>
            <g-g-select-input v-model="form.legalStatus"
                              :size="'is-6'"
                              :label="'Компания или физ. лицо'"
                              :placeholder="'Выберите'"
                              :options="legalStatusOptions"></g-g-select-input>
            <g-g-input v-if="form.legalStatus === 1" :size="'is-6'"
                       v-model="form.companyName" :label="'Название компании'"
                       :placeholder="'Название'"></g-g-input>

            <g-g-select-input v-model="form.languages"
                              :size="'is-12'"
                              :multiple="true"
                              :close-on-select="false"
                              :label="'Какими языками владеете'"
                              :placeholder="'Выберите'"
                              :options="languagesOptions"></g-g-select-input>

            <g-g-select-input v-model="form.categoryBusiness"
                              :size="'is-12'"
                              :label="'Категория бизнеса в которой вы работаете'"
                              :placeholder="'Выберите'"
                              :options="categoryBusinessOptions"></g-g-select-input>



            <div class="column is-12">
                <div class="field">
                    <div class="control">
                        <label class="checkbox is-link" for="remember">
                            <input type="checkbox" name="remember" v-model="form.access"
                                   id="remember">
                            <span>С <a href="#" class="has-text-info is-link">условиями предоставления услуг</a> ознакомлен</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="column is-12">
                <div class="field">
                    <div class="control">
                        <button type="submit"
                                class="button is-link is-fullwidth has-text-weight-bold h-3">
                            Подтвердить регистрацию
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
    import GGInput from '../form/GGInput';
    import GGSelectInput from '../form/GGSelectInput';
    import GGLocationSelectInput from '../form/GGLocationSelectInput';

    export default {
        name: "form-register-buyer",
        components: {GGInput, GGSelectInput, GGLocationSelectInput},
        data() {
            return {

                form: {
                    name: null,
                    surname: null,
                    email: null,
                    phone: null,
                    country_id: null,
                    city_id: null,
                    legalStatus: null,
                    companyName: null,
                    languages: null,
                    categoryBusiness: null,
                    access: null,
                },
                legalStatusOptions: [
                    {id: 1, name: 'Компания'},
                    {id: 2, name: 'Физическое лицо'},
                ],
                languagesOptions: [
                    {id: 1, name: 'Русский'},
                    {id: 2, name: 'Английский'},
                ],
                categoryBusinessOptions: [
                    {id: 1, name: 'Item 1'},
                    {id: 2, name: 'Item 2'},
                ],

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
