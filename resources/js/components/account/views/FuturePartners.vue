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
                            <span>{{trans('account.help')}}</span>
                        </button>
                        <button class="button is-outlined is-info is-size-875 has-text-weight-bold h-3 px-1 mb-0"
                                @click="showModalRef= true">
                        <span class="icon">
                          <img src="/svg/icons/ic_code.svg" alt="" class="svg">
                        </span>
                            <span class="has-text-decoration-underline">{{trans('account.your_ref_link')}}</span>
                        </button>

                        <modal v-if="showModalRef"
                               @close="showModalRef = false">
                            <div slot="header">
                                <p class="modal-card-title mb-0">Сылка</p>
                            </div>

                            <div slot="body">
                                <a href="#">https://ref.market.local/parner-invitation/4</a>
                            </div>
                            <div slot="footer">

                            </div>
                        </modal>

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
                    <th>{{trans('account.account')}}</th>
                    <th>{{trans('account.reg_date')}}</th>
                    <th>{{trans('account.country')}}</th>
                    <th>Skype</th>
                    <th>Telegram</th>
                    <th>{{trans('account.status')}}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody class="box is-paddingless">
                <tr v-for="partner in partners">
                    <td class="has-vertical-align-middle">{{partner.id}}</td>
                    <td class="has-vertical-align-middle">
                        <div class="name-account">
                            <figure><img :src="(partner.user.avatar)?partner.user.avatar:'/svg/icons/ic_login.svg'"
                                         alt="">
                            </figure>
                            <span>{{partner.user.first_name}}</span>
                        </div>
                    </td>
                    <td class="has-text-basic">{{partner.created_at}}</td>
                    <td class="has-text-basic">{{partner.user.country.translation.ru}}</td>
                    <td class="has-vertical-align-middle">{{(partner.skype)?partner.skype:'-'}}</td>
                    <td class="has-vertical-align-middle">{{(partner.skype)?partner.telegram:'-'}}</td>
                    <!--<td class="has-text-basic has-vertical-align-middle">-->
                    <!--<a href="#" class="has-text-decoration-underline">-->
                    <!--Дмитрий-->
                    <!--</a>-->
                    <!--</td>-->
                    <td class="has-text-basic has-vertical-align-middle">
                        <span v-if="partner.status == 0">{{trans('account.await')}}</span>
                        <button v-if="partner.status == 1"
                                @click="changeStatus('block',partner.id)"
                                class="button is-outlined is-danger is-size-875 has-text-weight-bold">
                            {{trans('account.block')}}
                        </button>
                        <button v-if="partner.status == 2"
                                @click="changeStatus('unblock',partner.id)"
                                class="button is-outlined is-success is-size-875 has-text-weight-bold">
                            {{trans('account.unblock')}}
                        </button>
                    </td>
                    <td>
                        <div class="is-flex">
                            <a href="#" class="link-with-icon mr-1">
                                <img src="/svg/icons/ic_details.svg">
                                <span class="has-text-decoration-underline">{{trans('account.in_account')}}</span>
                            </a>
                            <a href="/account/partners/single/settings" class="link-with-icon">
                                <img src="/svg/icons/ic_profile_settings.svg">
                                <span class="has-text-decoration-underline">{{trans('account.settings')}}</span>
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
                        <span class="is-size-875 has-text-basic">{{trans('account.view_count')}}</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                    </div>
                    <div class="broker-data-indicator__value has-text-weight-bold">
                        {{views}}
                    </div>
                </div>
                <div class="broker-data-indicator">
                    <div class="broker-data-indicator__title">
                        <span class="is-size-875 has-text-basic">{{trans('account.hit_count')}}</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                    </div>
                    <div class="broker-data-indicator__value has-text-weight-bold">
                        {{hits}}
                    </div>
                </div>
                <div class="broker-data-indicator">
                    <div class="broker-data-indicator__title">
                        <span class="is-size-875 has-text-basic">{{trans('account.click_count')}}</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                    </div>
                    <div class="broker-data-indicator__value has-text-weight-bold">
                        {{clicks}}
                    </div>
                </div>
                <div class="broker-data-indicator">
                    <div class="broker-data-indicator__title">
                        <span class="is-size-875 has-text-basic">{{trans('account.reg_count')}}</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                    </div>
                    <div class="broker-data-indicator__value has-text-weight-bold">
                        {{regs}}
                    </div>
                </div>
            </div>
        </section>
    </div>

</template>

<script>
    import Modal from '../../Modal';
    export default {
        name: "AccountPartnersFuture",
        components: {Modal},
        data() {
            return {
                showModalRef: false,
                partners: null,
                partnersIds: [],
                views: null,
                hits: null,
                clicks: null,
                regs: null
            }
        },
        methods: {
            changeStatus(status, partner_id) {
                let vm = this;
                axios.post('/account-partner-status-change', {
                    status: status,
                    partner_id: partner_id
                }).then(responce => {
                    if (responce.data.status == 'ok') {
                        vm.fetchPartners();
                        vm.$swal({type: 'success', title: '', text: trans('account.status_changed_message')})
                    }
                })
            },
            fetchPartners() {
                let vm = this;
                axios.post('/account-get-partners', {
                    await: true,
                    blocked: true,
                    approved: true,
                }).then(responce => {
                    vm.partners = responce.data;
                    responce.data.forEach(partner => {
                        vm.partnersIds.push(partner.id);
                    });
                    this.fetchSummary();
                })
            },
            fetchSummary() {
                let vm = this;
                axios.post('/account-get-summary', {
                    partners: vm.partnersIds
                }).then(responce => {
                    let data = responce.data;
                    vm.views = data.views;
                    vm.hits = data.hits;
                    vm.clicks = data.clicks;
                    vm.regs = data.regs;

                })
            }
        },
        created() {
            this.fetchPartners();
        },
    }
</script>

<style scoped>

</style>
