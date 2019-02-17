<template>
    <div class="container broker-pa">
        <div class="broker-pa__header">
            <div class="columns is-multiline">
                <div class="column is-8-desktop is-12-tablet">
                    <h1 class="section-title mb-0-5">{{trans('broker.web-offers')}}</h1>
                </div>
                <div class="column is-4-desktop is-12-tablet">
                    <div class="buttons">
                        <button class="button is-outlined is-info is-size-875 has-text-weight-bold h-3 px-1">
                        <span class="icon">
                          <img src="/svg/icons/ic_lifesaver-2.svg" alt="" class="svg">
                        </span>
                            <span>{{trans('broker.help')}}</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <nav class="broker-pa__offers-nav mb-2">
            <ul class="buttons has-addons">
                <li :class="{'is-active':showTab.all}"
                    @click="toggleTab('all')"
                    class="button h-3 is-outlined is-info is-size-875">
                    <span>{{trans('broker.all_offers')}}</span>
                </li>
                <li :class="{'is-active':showTab.active}"
                    @click="toggleTab('active')"
                    class="button h-3 is-outlined is-info is-size-875">
                    <span>{{trans('broker.active_offers')}}</span>
                </li>
                <li :class="{'is-active':showTab.new}"
                    @click="toggleTab('new')"
                    class="button h-3 is-outlined is-info is-size-875">
                    <span>{{trans('broker.new_offers')}}</span>
                </li>
                <li :class="{'is-active':showTab.favorite}"
                    @click="toggleTab('favorite')"
                    class="button h-3 is-outlined is-info is-size-875">
                    <span>{{trans('broker.favorites_offers')}}</span>
                </li>
            </ul>
        </nav>

        <div class="columns is-multiline">
            <div class="column">
                <div class="columns is-multiline">
                    <g-g-input v-model="keyWords"
                               :label="form.keyWords.title"
                               :placeholder="form.keyWords.placeholder">
                    </g-g-input>
                    <g-g-select-input v-model="form.category.selected"
                                      :size="'is-3'"
                                      :placeholder="form.category.placeholder"
                                      :label="form.category.title"
                                      :searchable="true"
                                      :options="formOptions.category.options"
                                      :multiple="true"
                                      :add-class="'multiselect_multiple'"
                                      :close-on-select="false"
                    >
                    </g-g-select-input><g-g-select-input v-model="form.languages.selected"
                                      :size="'is-3'"
                                      :placeholder="form.languages.placeholder"
                                      :label="form.languages.title"
                                      :searchable="true"
                                      :options="formOptions.languages.options"
                                      :multiple="true"
                                      :add-class="'multiselect_multiple'"
                                      :close-on-select="false"
                    >
                    </g-g-select-input>
                    <g-g-select-input v-model="form.typeTraffic.selected"
                                      :size="'is-3'"
                                      :placeholder="form.typeTraffic.placeholder"
                                      :label="form.typeTraffic.title"
                                      :searchable="true"
                                      :options="formOptions.typeTraffic.options"
                                      :multiple="true"
                                      :add-class="'multiselect_multiple'"
                                      :close-on-select="false"
                    >
                    </g-g-select-input>
                </div>
            </div>
            <div class="column is-narrow">
                <div class="is-flex has-align-items-end h-full">
                    <button @click="fetchCampaigns" class="button is-info is-size-875 has-text-weight-bold h-3 px-1">Найти оффер</button>
                </div>
            </div>

        </div>

        <section class="section is-paddingless content">
            <h3>Финансовые показатели</h3>
            <table class="table is-fullwidth is-striped is-size-875">
                <thead>
                <tr>
                    <th style="width: 1rem;"></th>
                    <th>ID</th>
                    <th>Название</th>
                    <th>
                        <span>CPL</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                           <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                        </span>
                    </th>
                    <th>
                        <span>CPA</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                           <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                        </span>
                    </th>
                    <th>
                        <span>apr-Time</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                           <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                        </span>
                    </th>
                    <th>
                        <span>pay-Time</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                           <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                        </span>
                    </th>
                    <th>
                        <span>c-LTV</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                           <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                        </span>
                    </th>
                </tr>
                </thead>
                <tbody class="box is-paddingless">
                <tr v-for="offer in offers">
                    <td><span @click="bookmark(offer)" :class="{'is-active':offer.bookmark}" class="icon icon-1 icon-favorite">
                           <img :src="(offer.bookmark)?'/svg/icons/ic_favorites-3.svg':'/svg/icons/ic_favorites-2.svg'" class="svg" alt="">
                        </span></td>
                    <td>{{offer.id}}</td>
                    <td class="has-vertical-align-middle">
                        <router-link :to="{ path: '/broker/web-offer/'+ offer.id}">
                            <a href="#" class="name-offer">
                                <!--<figure><img src="https://www.hoteloxford.com/data/jpg/foto-galleria-130.jpg" alt="">-->
                                <!--</figure>-->
                                <span>{{offer.name.ru}}</span>
                            </a>
                        </router-link>
                    </td>
                    <td>{{offer.cpl}}</td>
                    <td>{{offer.cps}}</td>
                    <td>{{offer.approve_days}}</td>
                    <td>{{offer.pay_days}}</td>
                    <td>{{offer.clt_days}}</td>
                </tr>
                </tbody>
            </table>
        </section>

    </div>

</template>

<script>
    import GGSelectInput from '../../form/GGSelectInput';
    import GGInput from '../../form/GGInput';

    export default {
        name: "BrokerWebOffers",
        components: {
            GGSelectInput,
            GGInput
        },
        data() {
            return {
                offers: [],
                keyWords:'',
                category:null,
                showTab:{
                    all:true,
                    active:false,
                    new:false,
                    favorite:false,
                },
                categories:[],
                form: {
                    keyWords: {
                        title: 'Ключевые слова',
                        placeholder: 'Выберите',
                    },
                    languages: {
                        selected: null,
                        title: 'Языковая версия',
                        placeholder: 'Выберите',
                    },
                    category: {
                        selected: null,
                        title: 'Категории',
                        placeholder: 'Выберите',
                    },
                    typeTraffic: {
                        selected: null,
                        title: 'Тип трафика',
                        placeholder: 'Выберите',
                    },
                },
                formOptions: {
                    keyWords: {
                        options: [
                            {id: '1', name: 'Item 1'},
                            {id: '2', name: 'Item 2'},
                            {id: '3', name: 'Item 3'},
                            {id: '4', name: 'Item 4'},
                        ],
                    },
                    languages: {
                        options: [
                            {id: '1', name: 'Item 1'},
                            {id: '2', name: 'Item 2'},
                            {id: '3', name: 'Item 3'},
                            {id: '4', name: 'Item 4'},
                        ],
                    },
                    category: {
                        options: [
                            {id: '1', name: 'Item 1'},
                            {id: '2', name: 'Item 2'},
                            {id: '3', name: 'Item 3'},
                            {id: '4', name: 'Item 4'},
                        ],
                    },
                    typeTraffic: {
                        options: [
                            {id: '1', name: 'Item 1'},
                            {id: '2', name: 'Item 2'},
                            {id: '3', name: 'Item 3'},
                            {id: '4', name: 'Item 4'},
                        ],
                    }
                }
            }
        },
        methods: {
            fetchCampaigns() {
                let vm = this;
                let tab = (_.invert(vm.showTab))[true];

                axios.post('/offer-all', {
                    tab: tab,
                    query:this.keyWords
                }).then(responce => {
                    vm.offers = responce.data;
                });

            },
            bookmark(campaign){
                axios.post('/offer-bookmark', {
                    campaign_id: campaign.id
                }).then(responce => {
                    campaign.bookmark = responce.data.bookmark;
                });
            },
            toggleTab(tab) {
                for (let el in this.showTab) {
                    this.showTab[el] = false;
                }
                this.showTab[tab] = true
                this.fetchCampaigns();
            }

        },
        mounted() {
            this.fetchCampaigns();
        }
    }
</script>

<style scoped>

</style>
