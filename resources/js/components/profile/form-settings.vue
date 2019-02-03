<template>
    <div class="box is-paddingless">
        <form @submit.prevent="submit">
            <div class="p-1-5">
                <h3 class="mb-1">
                    Редактировать профиль
                </h3>
                <form-errors :errors="form.errors.errors"></form-errors>
                <div class="columns is-multiline">
                    <div class="column is-6">
                        <div class="field">
                            <label class="label label_req"><span>Ваше имя</span></label>
                            <div class="control">
                                <input id="name" type="text"
                                       class="input is-size-875" name="name"
                                       v-model="form.first_name"
                                       :placeholder="ui.placeholder.first_name"
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
                                       :value="form.last_name"
                                       :placeholder="ui.placeholder.last_name"
                                >
                            </div>
                        </div>
                    </div>

                    <div class="column is-6">
                        <div class="field">
                            <label class="label"><span>Страна</span></label>
                            <div class="control">
                                <multiselect v-model="ui.country.selected"
                                             :deselect-label="ui.country.deselectLabel"
                                             track-by="name"
                                             label="name"
                                             openDirection="bottom"
                                             :placeholder="ui.country.placeholder"
                                             :options="ui.country.options"
                                             :searchable="true"
                                             :allow-empty="false"
                                             :selectLabel="ui.country.selectLabel"
                                             :selectedLabel="ui.country.selectedLabel">
                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                                </multiselect>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label class="label"><span>Город</span></label>
                            <div class="control">
                                <multiselect v-model="ui.city.selected" @input="form.city_id = $event.id"
                                             :deselect-label="ui.city.deselectLabel"
                                             track-by="name"
                                             label="name"
                                             openDirection="bottom"
                                             :placeholder="ui.city.placeholder"
                                             :options="ui.city.options"
                                             :searchable="true"
                                             :allow-empty="false"
                                             :selectLabel="ui.city.selectLabel"
                                             :selectedLabel="ui.city.selectedLabel">
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
                                       v-model="form.email"
                                       :placeholder="ui.placeholder.email"
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
                                       v-model="form.phone"
                                       :placeholder="ui.placeholder.phone"
                                >
                            </div>
                        </div>
                    </div>
                    <!-- <div class="column is-12">
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
                    </div> -->
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
                                <input v-model="form.subscribes.ordered_service_status" type="checkbox"/>
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
                                <input v-model="form.subscribes.new_message" type="checkbox"/>
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
                                <input v-model="form.subscribes.personal_selection" type="checkbox"/>
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
                                <input v-model="form.subscribes.offer" type="checkbox"/>
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
                    <!-- <div class="column is-6">
                        <div class="field">
                            <div class="control">
                                <button class="button is-clear is-clear_close is-size-875 h-3" type="reset">
                                    <span class="has-text-decoration-underline">Отменить изменения</span>
                                </button>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'
    import { Form } from './../../form'
    import FormErrors from './../form-errors'

    export default {
        name: "form-settings",
        props: ['user'],
        components: { Multiselect, FormErrors },
        mounted() {
            this.getCities()
        },
        watch:{
            'ui.country.selected.id': function(){
                this.getCities();
            }
        },
        data() {
            return {
                options: ['list', 'of', 'options'],
                form: new Form({
                    first_name: this.user.first_name,
                    last_name: this.user.last_name,
                    email: this.user.email,
                    phone: this.user.phone,
                    city_id: this.user.city_id,
                    subscribes: this.user.subscribes
                }),
                ui: {
                    placeholder:{
                        first_name: 'Имя',
                        last_name: 'Фамилия',
                        email: 'E-mail',
                        phone: 'Телефон',
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
            getCities(){
                axios.get('/profile/cities', { params: { country_id: this.ui.country.selected.id } })
                .then(res => {
                    this.ui.city.options = res.data
                    this.ui.city.selected = this.ui.city.options.find(city => {
                        return city.id == this.user.city_id
                    })
                })
                .catch(e => alert(e.response.data.message))
            },
            submit() {
                this.form.post('/profile/update')
            },
        }
    }
</script>