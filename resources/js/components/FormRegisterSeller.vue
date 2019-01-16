<template>
    <form @submit.prevent="submit">
        <div class="columns is-multiline">
            <div class="column is-6">
                <div class="field">
                    <label for="name"
                           class="label label_req"><span>Ваше имя</span></label>
                    <div class="control">
                        <input type="text"
                               id="name" class="input is-size-875" name="name"
                               value="" placeholder="Введите Ваше имя" required>

                    </div>
                </div>
            </div>
            <div class="column is-6">
                <div class="field">
                    <label for="surname"
                           class="label label_req"><span>Ваша фамилия</span></label>
                    <div class="control">
                        <input type="text"
                               id="surname" class="input is-size-875" name="surname"
                               value="" placeholder="Введите Вашу фамилию" required>

                    </div>
                </div>
            </div>
            <div class="column is-6">
                <div class="field">
                    <label for="email"
                           class="label label_req"><span>Контактный email</span></label>
                    <div class="control">
                        <input id="email" type="email"
                               class="input is-size-875" name="email"
                               value="" placeholder="Введите email" required>

                    </div>
                </div>
            </div>
            <div class="column is-6">
                <div class="field">
                    <label for="tel"
                           class="label label_req"><span>Контактный телефон</span></label>
                    <div class="control has-text-left">
                        <input type="tel"
                               id="tel" class="input is-size-875" name="tel"
                               value="" placeholder="(456) 566-09-23" required>
                        <span class="text is-left is-size-875">+48</span>

                    </div>
                </div>
            </div>
            <div class="column is-6">
                <div class="field">
                    <label class="label label_req"><span>Тематика бизнеса</span></label>
                    <div class="control">
                        <multiselect v-model="form.theme.selected"
                                     :deselect-label="form.theme.deselectLabel"
                                     track-by="name"
                                     label="name"
                                     :placeholder="form.theme.placeholder"
                                     :options="form.theme.options"
                                     :searchable="false"
                                     :allow-empty="false"
                                     :selectLabel="form.theme.selectLabel"
                                     :selectedLabel="form.theme.selectedLabel">
                            <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                        </multiselect>
                    </div>
                </div>
            </div>
            <div class="column is-6">
                <div class="field">
                    <label class="label label_req"><span>Страна</span></label>
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
            <div class="column is-12">
                <div class="field">
                    <div class="control">
                        <label class="checkbox is-warning" for="remember">
                            <input type="checkbox" name="remember"
                                   id="remember" checked>
                            <span>С <a href="#" class="has-text-info is-link">условиями предоставления услуг</a> ознакомлен</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="column is-12">
                <div class="field">
                    <div class="control">
                        <button type="submit"
                                class="button is-warning is-fullwidth has-text-weight-bold">
                            Подтвердить регистрацию продаца
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
    import Multiselect from 'vue-multiselect'

    export default {
        name: "form-register-seller",
        components: {Multiselect},
        data() {
            return {
                selected: null,
                options: ['list', 'of', 'options'],

                form: {
                    theme: {
                        selected: null,
                        placeholder: 'Тематика бизнеса',
                        selectedLabel: 'Выбрано',
                        selectLabel: '',
                        deselectLabel: '',
                        options: [
                            {id: 'theme_1', name: 'Коммерческая недвижимость'},
                            {id: 'theme_2', name: 'Тематика 2'},
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
                }
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
