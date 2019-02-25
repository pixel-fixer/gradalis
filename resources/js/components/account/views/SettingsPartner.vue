<template>
    <div class="container broker-pa">

        <div class="columns is-multiline">
            <div class="column is-8">
                <div class="user-setting__header is-flex is-marginless">
                    <figure>
                        <img :src="(user.avatar)?user.avatar:'/svg/icons/ic_login.svg'"
                             alt="">
                    </figure>
                    <div class="is-flex has-align-items-center">
                        <h2>{{user.full_name}}</h2>
                    </div>
                </div>
            </div>
            <div class="column is-4">
                <div class="buttons has-justify-content-end is-flex has-align-items-center h-full">
                    <button v-if="partner.status == 2"
                            class="button is-outlined is-success is-size-875 has-text-weight-bold h-3 px-1">
                        <span class="icon">
                            <img src="/svg/icons/ic_unlock.svg" alt="" class="svg">
                        </span>
                        <span>{{trans('account.unblock')}}</span>
                    </button>
                    <button v-if="partner.status == 1"
                            class="button is-outlined is-danger is-size-875 has-text-weight-bold h-3 px-1">
                        <span class="icon">
                            <img src="/svg/icons/ic_lock.svg" alt="" class="svg">
                        </span>
                        <span>{{trans('account.block')}}</span>
                    </button>
                    <button class="button is-outlined is-danger is-size-875 has-text-weight-bold h-3 px-1">
                        <span class="icon">
                            <img src="/svg/icons/ic_delete.svg" alt="" class="svg">
                        </span>
                        <span>{{trans('account.delete')}}</span>
                    </button>
                </div>
            </div>
        </div>


        <div class="box is-paddingless">

            <div class="p-1-5">
                <h3 class="mb-1">
                    {{trans('account.main_info')}}
                </h3>
                <div class="columns is-multiline">
                    <div class="column is-6">
                        <div class="columns is-multiline is-size-875 mb-0-5 broker-pa__account-short-info">
                            <div class="column is-6 pb-0">{{trans('account.reg_time')}}</div>
                            <div class="column is-6 pb-0">{{partner.created_at}}</div>
                            <div class="column is-6 pb-0">{{trans('account.reg_ip')}}</div>
                            <div class="column is-6 pb-0">94.67.207.192</div>
                            <div class="column is-6 pb-0">{{trans('account.status')}}</div>
                            <div v-if="partner.status == 1" class="column is-6 pb-0"><span class="has-text-success">{{trans('account.activated')}} {{partner.updated_at}}</span>
                            </div>
                            <div v-if="partner.status == 2" class="column is-6 pb-0">{{trans('account.block_label')}}
                            </div>
                            <div v-if="partner.status == 2" class="column is-6 pb-0"><span class="has-text-danger">{{trans('account.blocked')}} {{partner.updated_at}}</span>
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
                        <g-g-input :size="'is-6'" v-model="formAccount.first_name"
                                   :label="trans('account.first_name.title')"
                                   :placeholder="trans('account.first_name.placeholder')"
                        :required="true"></g-g-input>
                        <g-g-input :size="'is-6'" v-model="formAccount.last_name"
                                   :label="trans('account.last_name.title')"
                                   :placeholder="trans('account.last_name.placeholder')"
                        :required="true"></g-g-input>
                        <g-g-input :size="'is-6'" v-model="formAccount.email"
                                   :label="trans('account.email.title')"
                                   :placeholder="trans('account.email.placeholder')"
                                   :required="true"
                                   :type="'email'"></g-g-input>
                        <g-g-input :size="'is-6'" v-model="formAccount.password"
                                   :label="trans('account.password.title')"
                                   :placeholder="trans('account.password.placeholder')"
                                   :required="true"
                                   :type="'password'"></g-g-input>


                        <div class="column is-6">
                            <div class="columns is-multiline">
                                <div class="column">
                                    <div class="field">
                                        <div class="control">
                                            <button type="submit"
                                                    class="button is-info is-fullwidth has-text-weight-bold h-3 is-size-875">
                                                {{trans('account.save_profile')}}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-narrow">
                                    <div class="field">
                                        <div class="control">
                                            <button class="button is-clear is-clear_close is-size-875 h-3" type="reset">
                                                <span class="has-text-decoration-underline">{{trans('account.cancel_changes')}}</span>
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
                    <g-g-input :size="'is-6'" v-model="formProfile.skype"
                               :label="'Skype'"
                               :placeholder="'Skype'"
                               :required="true"></g-g-input>
                    <g-g-input :size="'is-6'" v-model="formProfile.telegram"
                               :label="'Telegram'"
                               :placeholder="'Telegram'"
                               :required="true"></g-g-input>
                    <!--<g-g-input :size="'is-6'" v-model="formProfile.percentage_turnover"-->
                               <!--:label="'Процент от оборота, %'"-->
                               <!--:placeholder="'10'"-->
                               <!--:required="true"-->
                               <!--:type="'number'"></g-g-input>-->
                    <!--<g-g-textarea :size="'is-6'"-->
                                  <!--v-model="formProfile.payment_details"-->
                                  <!--:label="'Данные для выплат'"-->
                                  <!--:placeholder="'Укажите данные для выплат'"></g-g-textarea>-->
                    <!--<g-g-textarea :size="'is-6'"-->
                                  <!--v-model="formProfile.appruve_screens"-->
                                  <!--:label="'Аппрув скриншоты из П.П.'"-->
                                  <!--:placeholder="'Путь к скриншотам из П.П.'"></g-g-textarea>-->

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
        props: ['userId'],

        data() {
            return {
                user: {},
                partner: {},
                formAccount: {
                    email: null,
                    first_name: null,
                    last_name: null,
                    password: null,
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
        created() {
            this.fetchUser();
        },
        watch: {
            user: {
                immediate: true,
                handler(value) {
                    this.formAccount.first_name = value.first_name;
                    this.formAccount.last_name = value.last_name;
                    this.formAccount.email = value.email;
                },
                deep: true
            },
            partner: {
                immediate: true,
                handler(value) {
                    this.formProfile.skype = value.skype;
                    this.formProfile.telegram = value.telegram;
                },
                deep: true
            }
        },
        methods: {
            fetchUser() {
                let vm = this;
                axios.get('/account-partner/' + this.userId).then(responce => {
                    vm.user = responce.data.user;
                    vm.partner = responce.data.partner;
                })
            },
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
