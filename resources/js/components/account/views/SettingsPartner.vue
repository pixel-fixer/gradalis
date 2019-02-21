<template>
    <div class="container broker-pa">

        <div class="columns is-multiline">
            <div class="column is-8">
                <div class="user-setting__header is-flex is-marginless">
                    <figure>
                        <img src="https://image.freepik.com/free-photo/no-translate-detected_23-2147650966.jpg"
                             alt="">
                    </figure>
                    <div class="is-flex has-align-items-center">
                        <h2>Ткаченко Андрей</h2>
                    </div>
                </div>
            </div>
            <div class="column is-4">
                <div class="buttons has-justify-content-end is-flex has-align-items-center h-full">
                    <button class="button is-outlined is-success is-size-875 has-text-weight-bold h-3 px-1">
                        <span class="icon">
                            <img src="/svg/icons/ic_unlock.svg" alt="" class="svg">
                        </span>
                        <span>Разблокировать</span>
                    </button>
                    <button class="button is-outlined is-danger is-size-875 has-text-weight-bold h-3 px-1">
                        <span class="icon">
                            <img src="/svg/icons/ic_delete.svg" alt="" class="svg">
                        </span>
                        <span>Удалить</span>
                    </button>
                </div>
            </div>
        </div>


        <div class="box is-paddingless">

            <div class="p-1-5">
                <h3 class="mb-1">
                    Основная информация
                </h3>
                <div class="columns is-multiline">
                    <div class="column is-6">
                        <div class="columns is-multiline is-size-875 mb-0-5 broker-pa__account-short-info">
                            <div class="column is-6 pb-0">Время регистрации</div>
                            <div class="column is-6 pb-0">27 января 2019 в 14:15</div>
                            <div class="column is-6 pb-0">IP при регистрации</div>
                            <div class="column is-6 pb-0">94.67.207.192</div>
                            <div class="column is-6 pb-0">Статус</div>
                            <div class="column is-6 pb-0"><span class="has-text-success">Активирован 27 января 2019 в 14:25</span>
                            </div>
                            <div class="column is-6 pb-0">Блокировка</div>
                            <div class="column is-6 pb-0"><span class="has-text-danger">Заблокирован 27 января 2019 в 14:25</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="hr-basic is-marginless">
            <form @submit.prevent="submitAccount" @reset.prevent="resetAccount">
                <div class="p-1-5">
                    <h3 class="mb-1">
                        Аккаунт
                    </h3>
                    <div class="columns is-multiline">
                        <g-g-input :size="'is-6'" v-model="formAccount.email"
                                   :label="'Email'"
                                   :placeholder="'Введите Email'"
                                   :required="true"
                                   :type="'email'"></g-g-input>
                        <g-g-input :size="'is-6'" v-model="formAccount.name"
                                   :label="'Имя пользователя'"
                                   :placeholder="'Введите имя пользователя'"
                                   :required="true"></g-g-input>
                        <g-g-input :size="'is-6'" v-model="formAccount.password"
                                   :label="'Новый пароль'"
                                   :placeholder="'Введите новый пароль'"
                                   :required="true"
                                   :type="'password'"></g-g-input>
                        <g-g-input :size="'is-6'" v-model="formAccount.admin_id"
                                   :label="'Admin ID'"
                                   :placeholder="'Введите Admin ID'"
                                   :required="true"></g-g-input>


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

        <div class="box">
            <form @submit.prevent="submitProfile" @reset.prevent="resetProfile">
                <h3 class="mb-1">Профиль</h3>
                <div class="columns is-multiline">
                    <g-g-input :size="'is-6'" v-model="formProfile.name"
                               :label="'Имя'"
                               :placeholder="'Введите имя'"
                               :required="true"></g-g-input>
                    <g-g-input :size="'is-6'" v-model="formProfile.skype"
                               :label="'Skype'"
                               :placeholder="'Skype'"
                               :required="true"></g-g-input>
                    <g-g-input :size="'is-6'" v-model="formProfile.telegram"
                               :label="'Telegram'"
                               :placeholder="'Telegram'"
                               :required="true"></g-g-input>
                    <g-g-input :size="'is-6'" v-model="formProfile.percentage_turnover"
                               :label="'Процент от оборота, %'"
                               :placeholder="'10'"
                               :required="true"
                               :type="'number'"></g-g-input>
                    <g-g-textarea :size="'is-6'"
                                  v-model="formProfile.payment_details"
                                  :label="'Данные для выплат'"
                                  :placeholder="'Укажите данные для выплат'"></g-g-textarea>
                    <g-g-textarea :size="'is-6'"
                                  v-model="formProfile.appruve_screens"
                                  :label="'Аппрув скриншоты из П.П.'"
                                  :placeholder="'Путь к скриншотам из П.П.'"></g-g-textarea>

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
            </form>
        </div>

    </div>
</template>

<script>
    import GGInput from '../../form/GGInput';
    import GGTextarea from '../../form/GGTextarea';

    export default {
        name: "PartnerSettings",
        components: {
            GGInput, GGTextarea
        },
        data() {
            return {
                formAccount: {
                    email: null,
                    name: null,
                    password: null,
                    admin_id: null,
                },
                formProfile: {
                    name: null,
                    skype: null,
                    telegram: null,
                    percentage_turnover: null,
                    payment_details: null,
                    appruve_screens: null,
                },
            }
        },
        methods: {
            submitAccount() {
                console.log('submit!');
            },
            resetAccount() {
                this.formAccount.email = null;
                this.formAccount.name = null;
                this.formAccount.password = null;
                this.formAccount.admin_id = null;
            },
            submitProfile() {
                console.log('submit!');
            },
            resetProfile() {
                this.formProfile.name = null;
                this.formProfile.skype = null;
                this.formProfile.telegram = null;
                this.formProfile.percentage_turnover = null;
                this.formProfile.payment_details = null;
                this.formProfile.appruve_screens = null;
            },
        }
    }
</script>

<style scoped>

</style>
