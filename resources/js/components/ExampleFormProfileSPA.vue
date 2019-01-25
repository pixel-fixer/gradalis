<template>
    <div class="box is-paddingless">
        <form @submit.prevent="submit">
            <div class="p-1-5">
                <h3 class="mb-1">
                    Редактировать профиль
                </h3>
                <div class="columns is-multiline">
                    <div class="column is-6">
                        <div class="field">
                            <label class="label label_req"><span>Ваше имя</span></label>
                            <div class="control">
                                <input id="name" type="text"
                                       class="input is-size-875" name="name"
                                       :value="form.name.value"
                                       :placeholder="form.name.placeholder"
                                >
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label class="label label_req"><span>Ваша фамилия</span></label>
                            <div class="control">
                                <input id="surname" type="text"
                                       class="input is-size-875" name="surname"
                                       :value="form.surname.value"
                                       :placeholder="form.surname.placeholder"
                                >
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label class="label"><span>Страна</span></label>
                            <div class="control">
                                <multiselect v-model="form.country.selected"
                                             :deselect-label="form.country.deselectLabel"
                                             track-by="name"
                                             label="name"
                                             openDirection="bottom"
                                             :placeholder="form.country.placeholder"
                                             :options="form.country.options"
                                             :searchable="true"
                                             :allow-empty="false"
                                             :selectLabel="form.country.selectLabel"
                                             :selectedLabel="form.country.selectedLabel">
                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                                </multiselect>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label class="label"><span>Город</span></label>
                            <div class="control">
                                <multiselect v-model="form.city.selected"
                                             :deselect-label="form.city.deselectLabel"
                                             track-by="name"
                                             label="name"
                                             openDirection="bottom"
                                             :placeholder="form.city.placeholder"
                                             :options="form.city.options"
                                             :searchable="true"
                                             :allow-empty="false"
                                             :selectLabel="form.city.selectLabel"
                                             :selectedLabel="form.city.selectedLabel">
                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                                </multiselect>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label class="label label_req"><span>Контактный email</span></label>
                            <div class="control">
                                <input id="email" type="email"
                                       class="input is-size-875" name="email"
                                       :value="form.email.value"
                                       :placeholder="form.email.placeholder"
                                >
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label class="label label_req"><span>Контактный телефон</span></label>
                            <div class="control">
                                <input id="phone" type="tel"
                                       class="input is-size-875" name="phone"
                                       :value="form.phone.value"
                                       :placeholder="form.phone.placeholder"
                                >
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label class="label label_req"><span>NIP</span></label>
                            <div class="control">
                                <input id="nip" type="text"
                                       class="input is-size-875" name="nip"
                                       :value="form.nip.value"
                                       :placeholder="form.nip.placeholder"
                                >
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label class="label label_req"><span>Pesel</span></label>
                            <div class="control">
                                <input id="pesel" type="text"
                                       class="input is-size-875" name="pesel"
                                       :value="form.pesel.value"
                                       :placeholder="form.pesel.placeholder"
                                >
                            </div>
                        </div>
                    </div>
                    <div class="column is-12">
                        <div class="buttons is-flex has-justify-content-between">
                            <button class="button is-vk is-size-875 has-text-weight-bold h-3 px-1">
                                Подключить Вконтакте
                            </button>
                            <button class="button is-ok is-size-875 has-text-weight-bold h-3 px-1">
                                Подключить Одноклассники
                            </button>
                            <button class="button is-fb is-size-875 has-text-weight-bold h-3 px-1">
                                Подключить Facebook
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="is-marginless">
            <div class="p-1-5">
                <h3 class="mb-1">
                    Настройки уведомлений по Email
                </h3>
                <div class="columns is-multiline">
                    <div class="column is-6">
                        <div class="field">
                            <label class="checkbox-2 is-size-875">
                                <input type="checkbox"/>
                                <div class="checkbox-2__info">
                                    <div class="checkbox-2__title">Платные услуги</div>
                                    <div class="checkbox-2__desc">Изменение статуса подключенных услуг</div>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label class="checkbox-2 is-size-875">
                                <input type="checkbox"/>
                                <div class="checkbox-2__info">
                                    <div class="checkbox-2__title">Сообщения</div>
                                    <div class="checkbox-2__desc">Уведомления о новых сообщениях</div>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label class="checkbox-2 is-size-875">
                                <input type="checkbox"/>
                                <div class="checkbox-2__info">
                                    <div class="checkbox-2__title">Персональные подборки</div>
                                    <div class="checkbox-2__desc">Подборки интересных объявлений и категорий</div>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label class="checkbox-2 is-size-875">
                                <input type="checkbox"/>
                                <div class="checkbox-2__info">
                                    <div class="checkbox-2__title">Акции и предложения</div>
                                    <div class="checkbox-2__desc">Индивидуальные скидки и специальные предложения</div>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <div class="control">
                                <button type="submit"
                                        class="button is-info is-fullwidth has-text-weight-bold h-3">
                                    Сохранить изменения профиля
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <div class="control">
                                <button class="button is-clear is-clear_close is-size-875 h-3" type="reset">
                                    <span class="has-text-decoration-underline">Отменить изменения</span>
                                </button>
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
        name: "ExampleFormProfileSPA",
        components: {Multiselect},
        data() {
            return {
                options: ['list', 'of', 'options'],
                form: {
                    name: {
                        placeholder: 'Placeholder',
                        value: 'Андрей',

                    },
                    surname: {
                        placeholder: 'Placeholder',
                        value: 'Ткаченко',

                    },
                    email: {
                        placeholder: 'Placeholder',
                        value: 'example@mail.ru',

                    },
                    phone: {
                        placeholder: 'Placeholder',
                        value: '+74955555555',

                    },
                    nip: {
                        placeholder: 'Placeholder',
                        value: '56776555645',

                    },
                    pesel: {
                        placeholder: 'Placeholder',
                        value: '554556855',

                    },
                    country: {
                        selected: {id: 1, name: 'Россия'},
                        placeholder: 'Выберите',
                        selectedLabel: '',
                        selectLabel: '',
                        deselectLabel: '',
                        options: [
                            {id: 1, name: 'Россия'},
                            {id: 2, name: 'Польша'}
                        ]
                    },
                    city: {
                        selected: null,
                        placeholder: 'Выберите',
                        selectedLabel: '',
                        selectLabel: '',
                        deselectLabel: '',
                        options: [
                            {id: 1, name: 'Москва'},
                            {id: 2, name: 'Белгород'},
                            {id: 3, name: 'Воронеж'},
                            {id: 4, name: 'Казань'},
                            {id: 5, name: 'Варшава'},
                            {id: 6, name: 'Краков'},
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
