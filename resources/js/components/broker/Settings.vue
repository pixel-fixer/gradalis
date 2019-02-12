<template>
    <div class="container broker-pa">


        <div class="user-setting__header is-flex">
            <figure>
                <img src="https://image.freepik.com/free-photo/no-translate-detected_23-2147650966.jpg"
                     alt="">
            </figure>
            <div>
                <h2>Ткаченко Андрей</h2>
                <div class="is-flex">
                    <div class="file">
                        <label class="file-label">
                            <input class="file-input" type="file" name="resume">
                            <div class="button is-outlined is-info is-size-875 has-text-weight-bold h-3">
                                Загрузить новую фотографию профиля
                            </div>
                        </label>
                    </div>
                    <div class="help-desc is-size-875">
                        Оптимальный размер 160x160 пикселей, до 2 Мб.
                    </div>
                </div>
            </div>
        </div>

        <div class="box is-paddingless">
            <form @submit.prevent="submit">
                <div class="p-1-5">
                    <h3 class="mb-1">
                        Редактировать профиль
                    </h3>
                    <div class="columns is-multiline">
                        <div class="column is-6">
                            <div class="columns is-multiline is-size-875 mb-0-5 broker-pa__account-short-info">
                                <div class="column is-6 pb-0">Аккаунт</div>
                                <div class="column is-6 pb-0">Продвинутый</div>
                                <div class="column is-6 pb-0">xKay</div>
                                <div class="column is-6 pb-0">W11546B4</div>
                            </div>
                        </div>
                    </div>
                    <div class="columns is-multiline">
                        <g-g-input :size="'is-6'" v-model="form.name.value" :label="form.name.title"
                                   :placeholder="form.name.placeholder" :required="true"></g-g-input>
                        <g-g-input :size="'is-6'" v-model="form.surname.value" :label="form.surname.title"
                                   :placeholder="form.surname.placeholder" :required="true"></g-g-input>
                        <g-g-select-input v-model="form.country.selected"
                                          :size="'is-6'"
                                          :placeholder="form.country.placeholder"
                                          :label="form.country.title"
                                          :searchable="true"
                                          :options="formOptions.country.options"
                                          :required="true">
                        </g-g-select-input>
                        <g-g-select-input v-model="form.city.selected"
                                          :size="'is-6'"
                                          :placeholder="form.city.placeholder"
                                          :label="form.city.title"
                                          :searchable="true"
                                          :options="formOptions.city.options"
                                          :required="true">
                        </g-g-select-input>
                        <g-g-input :size="'is-6'" v-model="form.email.value" :label="form.email.title"
                                   :placeholder="form.email.placeholder" :required="true"></g-g-input>
                        <g-g-input :size="'is-6'" v-model="form.phone.value" :label="form.phone.title"
                                   :placeholder="form.phone.placeholder" :required="true"></g-g-input>
                        <g-g-input :size="'is-6'" v-model="form.skype.value" :label="form.skype.title"
                                   :placeholder="form.skype.placeholder" :required="true"></g-g-input>
                        <g-g-input :size="'is-6'" v-model="form.nickTop20.value" :label="form.nickTop20.title"
                                   :placeholder="form.nickTop20.placeholder" :required="true"></g-g-input>

                        <div class="column is-6">
                            <div class="columns is-multiline">
                                <div class="column">
                                    <div class="field">
                                        <div class="control">
                                            <button type="submit"
                                                    class="button is-info is-fullwidth has-text-weight-bold h-3 is-size-875">
                                                Сохранить изменения профиля
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-narrow">
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
                    </div>
                </div>
            </form>
        </div>

        <section class="section is-paddingless content">
            <h3>Счета для выплат</h3>
            <table class="table is-fullwidth is-striped is-size-875">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Название счета</th>
                    <th>Статус</th>
                    <th>Страна</th>
                    <th>Валюта</th>
                    <th>Ожидает выплаты</th>
                    <th>Зачислено</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody class="box is-paddingless">
                <tr>
                    <td>1</td>
                    <td>Яндекс Деньги</td>
                    <td>Основной</td>
                    <td>Россия</td>
                    <td>Евро</td>
                    <td>€ 11 690</td>
                    <td>€ 900</td>
                    <td>
                        <a href="#" class="link-with-icon icon_grey">
                            <img src="/svg/icons/ic_edit.svg" class="svg">
                            <span class="has-text-decoration-underline">Изменить</span>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Webmoney</td>
                    <td>Дополнительный</td>
                    <td>Россия</td>
                    <td>Евро</td>
                    <td>€ 11 690</td>
                    <td>€ 900</td>
                    <td>
                        <a href="#" class="link-with-icon icon_grey">
                            <img src="/svg/icons/ic_edit.svg" class="svg">
                            <span class="has-text-decoration-underline">Изменить</span>
                        </a>
                    </td>
                </tr>

                </tbody>
            </table>
            <button class="button is-info has-text-weight-bold h-3 is-size-875 px-1-5"
                    @click="showModal = !showModal">
                Добавить счет для выплат
            </button>
        </section>

        <!-- ToDo: Доделать модалку -->
        <!--Modal-->
        <div class="modal" :class="{ 'is-active': showModal }">
            <div class="modal-background" @click="showModal = !showModal"></div>
            <div class="modal-card">
                <header class="modal-card-head modal-card-head_bb">
                    <p class="modal-card-title">Редактировать счет для выплат</p>
                    <button class="delete close-modal" @click="showModal = !showModal"
                            aria-label="close"></button>
                </header>
                <section class="modal-card-body is-paddingless">

                </section>
                <footer class="modal-card-foot">
                    <button class="button is-info is-fullwidth is-size-875 has-text-weight-bold h-3">Сохранить
                        категорию
                    </button>
                </footer>
            </div>
        </div>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'

    import GGInput from '../form/GGInput';
    import GGSelectInput from '../form/GGSelectInput';

    export default {
        name: "BrokerSettings",
        components: {
            Multiselect, GGInput, GGSelectInput
        },
        data() {
            return {
                options: ['list', 'of', 'options'],
                form: {
                    name: {
                        title: 'Ваше имя',
                        placeholder: 'Placeholder',
                        value: 'Андрей',

                    },
                    surname: {
                        title: 'Ваша фамилия',
                        placeholder: 'Placeholder',
                        value: 'Ткаченко',

                    },
                    country: {
                        selected: 1,
                        title: 'Страна',
                        placeholder: 'Выберите',
                    },
                    city: {
                        selected: null,
                        title: 'Город',
                        placeholder: 'Выберите',
                    },
                    email: {
                        title: 'Контактный email',
                        placeholder: 'Placeholder',
                        value: 'example@mail.ru',

                    },
                    phone: {
                        title: 'Контактный телефон',
                        placeholder: 'Placeholder',
                        value: '+74955555555',

                    },
                    skype: {
                        title: 'Skype',
                        placeholder: 'Placeholder',
                        value: '',

                    },
                    nickTop20: {
                        title: 'Ник в Топ-20',
                        placeholder: 'Placeholder',
                        value: '',

                    },


                },
                formOptions: {
                    country: {
                        options: [
                            {id: 1, name: 'Россия'},
                            {id: 2, name: 'Польша'}
                        ]
                    },
                    city: {
                        options: [
                            {id: 1, name: 'Москва'},
                            {id: 2, name: 'Белгород'},
                            {id: 3, name: 'Воронеж'},
                            {id: 4, name: 'Казань'},
                            {id: 5, name: 'Варшава'},
                            {id: 6, name: 'Краков'},
                        ]
                    },
                },
                showModal: false
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
