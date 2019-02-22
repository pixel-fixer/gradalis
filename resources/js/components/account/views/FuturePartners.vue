<template>

    <div class="container broker-pa">


        <div class="broker-pa__header">
            <div class="columns is-multiline">
                <div class="column is-8-desktop is-12-tablet">
                    <h1 class="section-title mb-0-5">Партнеры</h1>
                </div>
                <div class="column is-4-desktop is-12-tablet">
                    <div class="buttons">
                        <button class="button is-outlined is-info is-size-875 has-text-weight-bold h-3 px-1 mb-0">
                        <span class="icon">
                          <img src="/svg/icons/ic_lifesaver-2.svg" alt="" class="svg">
                        </span>
                            <span>Помощь</span>
                        </button>
                        <button class="button is-outlined is-info is-size-875 has-text-weight-bold h-3 px-1 mb-0">
                        <span class="icon">
                          <img src="/svg/icons/ic_code.svg" alt="" class="svg">
                        </span>
                            <span class="has-text-decoration-underline">Ваша реферальная ссылка</span>
                        </button>
                    </div>
                </div>
                <div class="column is-8-desktop is-12-tablet">
                    <div class="buttons has-addons mb-0 mr-1 has-justify-content-start">
                        <router-link :to="{ path: '/account/partners/'}"
                                     class="button h-3 is-outlined is-info is-size-875 mb-0">
                            <span>Активные партнеры</span>
                        </router-link>
                        <router-link :to="{ path: '/account/partners/future'}"
                                     class="button h-3 is-outlined is-info is-size-875 mb-0 is-active">
                            <span>Будущие партнеры</span>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>


        <section class="section is-paddingless content">
            <table class="table is-fullwidth is-size-875">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя партнера</th>
                    <th>Дата регистрации</th>
                    <th>Страна</th>
                    <th>Skype</th>
                    <th>Telegram</th>
                    <th>Админ</th>
                    <th>Статус</th>
                    <th></th>
                </tr>
                </thead>
                <tbody class="box is-paddingless">
                <tr>
                    <td class="has-vertical-align-middle">2210</td>
                    <td class="has-vertical-align-middle">
                        Димитрий
                    </td>
                    <td class="has-text-basic has-vertical-align-middle">28.09.2018 в 14:15</td>
                    <td class="has-text-basic has-vertical-align-middle">Россия</td>
                    <td class="has-vertical-align-middle">dmitry83</td>
                    <td class="has-vertical-align-middle">@dmitry</td>
                    <td class="has-text-basic has-vertical-align-middle">
                        <a href="#" class="has-text-decoration-underline">
                            Дмитрий
                        </a>
                    </td>
                    <td class="has-text-basic has-vertical-align-middle">Ожидает одобрения</td>
                    <td class="has-vertical-align-middle">
                        <div class="is-flex">
                            <a href="#" class="link-with-icon mr-1">
                                <img src="/svg/icons/ic_details.svg">
                                <span class="has-text-decoration-underline">В аккаунт</span>
                            </a>
                            <a href="#" class="link-with-icon">
                                <img src="/svg/icons/ic_profile_settings.svg">
                                <span class="has-text-decoration-underline">Настройки</span>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="has-vertical-align-middle">2210</td>
                    <td class="has-vertical-align-middle">
                        Димитрий
                    </td>
                    <td class="has-text-basic has-vertical-align-middle">28.09.2018 в 14:15</td>
                    <td class="has-text-basic has-vertical-align-middle">Россия</td>
                    <td class="has-vertical-align-middle">dmitry83</td>
                    <td class="has-vertical-align-middle">@dmitry</td>
                    <td class="has-text-basic has-vertical-align-middle">
                        <a href="#" class="has-text-decoration-underline">
                            Дмитрий
                        </a>
                    </td>
                    <td class="has-text-basic has-vertical-align-middle">
                        <button class="button is-outlined is-danger is-size-875 has-text-weight-bold">Заблокировать</button>
                    </td>
                    <td class="has-vertical-align-middle">
                        <div class="is-flex">
                            <a href="#" class="link-with-icon mr-1">
                                <img src="/svg/icons/ic_details.svg">
                                <span class="has-text-decoration-underline">В аккаунт</span>
                            </a>
                            <a href="#" class="link-with-icon">
                                <img src="/svg/icons/ic_profile_settings.svg">
                                <span class="has-text-decoration-underline">Настройки</span>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="has-vertical-align-middle">2210</td>
                    <td class="has-vertical-align-middle">
                        Димитрий
                    </td>
                    <td class="has-text-basic has-vertical-align-middle">28.09.2018 в 14:15</td>
                    <td class="has-text-basic has-vertical-align-middle">Россия</td>
                    <td class="has-vertical-align-middle">dmitry83</td>
                    <td class="has-vertical-align-middle">@dmitry</td>
                    <td class="has-text-basic has-vertical-align-middle">
                        <a href="#" class="has-text-decoration-underline">
                            Дмитрий
                        </a>
                    </td>
                    <td class="has-text-basic has-vertical-align-middle">
                        <button class="button is-outlined is-success is-size-875 has-text-weight-bold">Разблокировать</button>
                    </td>
                    <td class="has-vertical-align-middle">
                        <div class="is-flex">
                            <a href="#" class="link-with-icon mr-1">
                                <img src="/svg/icons/ic_details.svg">
                                <span class="has-text-decoration-underline">В аккаунт</span>
                            </a>
                            <a href="#" class="link-with-icon">
                                <img src="/svg/icons/ic_profile_settings.svg">
                                <span class="has-text-decoration-underline">Настройки</span>
                            </a>
                        </div>
                    </td>
                </tr>

                </tbody>
            </table>
        </section>
        <section class="section is-paddingless content">
            <h3>Статистика по реферальной ссылке</h3>

            <div class="broker-data-indicator-wrap_partners is-flex">
                <div class="broker-data-indicator">
                    <div class="broker-data-indicator__title">
                        <span class="is-size-875 has-text-basic">Количество показов</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                    </div>
                    <div class="broker-data-indicator__value has-text-weight-bold">
                        12 580
                    </div>
                </div>
                <div class="broker-data-indicator">
                    <div class="broker-data-indicator__title">
                        <span class="is-size-875 has-text-basic">Количество хитов</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                    </div>
                    <div class="broker-data-indicator__value has-text-weight-bold">
                        12 580
                    </div>
                </div>
                <div class="broker-data-indicator">
                    <div class="broker-data-indicator__title">
                        <span class="is-size-875 has-text-basic">Количество кликов</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                    </div>
                    <div class="broker-data-indicator__value has-text-weight-bold">
                        12 580
                    </div>
                </div>
                <div class="broker-data-indicator">
                    <div class="broker-data-indicator__title">
                        <span class="is-size-875 has-text-basic">Количество регистраций</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                    </div>
                    <div class="broker-data-indicator__value has-text-weight-bold">
                        12 580
                    </div>
                </div>
            </div>
        </section>
    </div>

</template>

<script>
    export default {
        name: "AccountPartnersFuture",
        components: {

        },
        data() {
            return {
                partners:null
            }
        },
        created(){
            axios.post('/account-get-partners',
                {}
            ).then(responce => {
                this.partners = responce.data;
            })
        },
    }
</script>

<style scoped>

</style>
