<template>
    <div class="container broker-pa" v-if="loaded">

        <div class="broker-pa__header">
            <div class="columns is-multiline">
                <div class="column is-8-desktop is-12-tablet">
                    <h1 class="section-title mb-0-5">{{offer.name.ru}}</h1>
                    <div class="broker-pa__id">ID: 2556</div>
                </div>
                <div class="column is-4-desktop is-12-tablet">
                    <div class="buttons">
                        <button class="button is-outlined is-info is-size-875 has-text-weight-bold h-3 px-1">
                        <span class="icon">
                          <img src="/svg/icons/ic_lifesaver-2.svg" alt="" class="svg">
                        </span>
                            <span>Помощь</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <nav class="broker-pa__offers-nav mb-2">
            <ul class="buttons has-addons">
                <li :class="{'is-active':showTab.details}" class="button h-3 is-outlined is-info is-size-875 px-1" @click="toggleTab('details')">Сводная</li>
                <li :class="{'is-active':showTab.payments}" class="button h-3 is-outlined is-info is-size-875 px-1" @click="toggleTab('payments')">Выплаты</li>
                <li :class="{'is-active':showTab.condition}" class="button h-3 is-outlined is-info is-size-875 px-1" @click="toggleTab('condition')">Условия</li>
                <li :class="{'is-active':showTab.instruments}" class="button h-3 is-outlined is-info is-size-875 px-1" @click="toggleTab('instruments')">Инструменты</li>
                <li :class="{'is-active':showTab.instructions}" class="button h-3 is-outlined is-info is-size-875 px-1" @click="toggleTab('instructions')">Инструкции</li>
            </ul>
        </nav>

        <!--details-->
        <section class="section is-paddingless content" v-if="showTab.details">
            <div class="box broker-pa__details">
            <div class="columns is-multiline">
            <div class="column is-3">
                <figure class="broker-pa__details__thumb">
                    <img src="https://photo.hotellook.com/image_v2/crop/2272683466/1200/630.auto" alt="">
                </figure>
                <button class="button is-info h-3 is-size-875 is-fullwidth has-text-weight-bold mb-1"
                        @click="showModal('modal-create-offer-link')">
                            <span class="icon">
                                 <img src="/svg/icons/ic_connect_offer.svg" alt="" class="svg">
                            </span>
                    <span>Подключить оффер</span>
                </button>
                <div class="has-text-grey-light is-size-875 broker-pa__details__add-offer-desc">
                    <i>Кликните, что бы получить доступ к инструментам</i>
                </div>

                <!-- Modal -->
                <broker-offers-modal-create-link></broker-offers-modal-create-link>

            </div>
            <div class="column is-9">
                <h3>Основная информация</h3>
                <div class="broker-pa__details__main-info is-size-875">
                    <div class="broker-pa__details__main-info__item">
                        <span>Статус</span>
                        <span>{{offer.status}}</span>
                    </div>
                    <div class="broker-pa__details__main-info__item">
                        <span>Сайт</span>
                        <span>
                                   <a href="#" class="link-with-icon">
                                       <img src="http://marketplacenew.local/svg/icons/ic_details.svg">
                                       <span class="has-text-decoration-underline">{{offer.site}}</span></a>
                                </span>
                    </div>
                    <div class="broker-pa__details__main-info__item">
                        <span>Время одобрения (в днях):</span>
                        <span>{{offer.approve_days}}</span>
                    </div>
                    <div class="broker-pa__details__main-info__item">
                        <span>Время оплаты (в днях):</span>
                        <span>{{offer.pay_days}}</span>
                    </div>
                    <div class="broker-pa__details__main-info__item">
                        <span>Cookie LTV (дней):</span>
                        <span>{{offer.clt_days}}</span>
                    </div>
                    <div class="broker-pa__details__main-info__item">
                        <span>Страна офиса:</span>
                        <span>{{offer.country.translation.ru}}</span>
                    </div>
                </div>
                <hr>
                <h3>Описание оффера</h3>
                <p>
                    {{offer.description.ru}}
                </p>
            </div>
        </div>
            </div>
        </section>
        <!--condition-->
        <section class="section is-paddingless content" v-if="showTab.condition">
            <h3>Условия</h3>
            <table class="table is-striped is-fullwidth is-size-875">
                <thead>
                <tr>
                    <th>Условия трафика</th>
                    <th width="1rem"></th>
                    <th>Примечание</th>
                </tr>
                </thead>
                <tbody class="box is-paddingless">
                <tr v-for="condition in offer.conditions">
                    <td class="has-text-basic">
                        <span>{{condition.name.ru}}</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                           <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                        </span>
                    </td>
                    <td class="has-text-basic"><span class="icon"><img :src="(condition.pivot.status)?'/svg/icons/ic_unlocked.svg':'/svg/icons/ic_locked.svg'" class="svg" alt=""></span></td>
                    <td class="has-text-basic">{{(condition.description)?condition.description.ru:''}}</td>
                </tr>
                </tbody>
            </table>
        </section>
        <!--instructions-->
        <section class="section is-paddingless content" v-if="showTab.instructions">
            <h3>Инструкции</h3>
            <div class="is-size-875 has-text-basic">
                <p>
                    Готовый бизнес — это компания, которая выжила на рынке и имеет выраженную бизнес-модель. Ее покупка
                    позволяет избежать трудностей, связанных с самостоятельным стартом. Покупатель принимает риски и
                    получает активы, которые уже приносят прибыль. Продавцу достается компенсация за выход из бизнеса,
                    которым он не может или не хочет управлять дальше. Выгода есть для обеих сторон!
                </p>
                <p>
                    Большая часть сделок по готовому бизнесу — это продажа недорогих предприятий. Их стоимость сильно
                    зависит от
                    показателей прибыльности, также на нее влияет размер и цена прилагаемых активов. Как правило, работающий
                    бизнес можно приобрести даже за 250'000 — 300'000 рублей.
                </p>
                <p>
                    Объекты действующего бизнеса очень разные: от интернет-магазинов и маленьких кофеен, которые стоят
                    недорого, до заводов и горнолыжных курортов за миллионы рублей.
                </p>
            </div>
        </section>
        <!--instuments-->
        <section class="section is-paddingless content" v-if="showTab.instruments">
            <h3>Инструменты</h3>
            <div class="is-size-875 has-text-basic">
                <p>
                    Для того, чтобы использовать все возможности нашей высокотехнологичной системы, подключайте
                    разработанные специально для вебмастеров инструменты, которые помогут эффективнее монетизировать Ваш
                    трафик. Каждый инструмент использует систему ретаргетинга, чтобы максимально конвертировать каждого
                    посетителя Вашего сайта в прибыль.
                </p>
            </div>
            <h3>Ссылки <span class="has-text-grey-light has-text-weight-normal">[1]</span></h3>
            <div class="filter-table-offers-links is-size-875">
                <div class="filter-table-offers-links__type is-flex">
                    <div class="filter-table-offers-links__type__title">Категории:</div>
                    <ul>
                        <li><span class="is-active">Все</span></li>
                        <li><span>Лендинг</span></li>
                        <li><span>Баннеры</span></li>
                    </ul>
                </div>
                <div class="filter-table-offers-links__type is-flex">
                    <div class="filter-table-offers-links__type__title">Тип:</div>
                    <ul>
                        <li><span class="is-active">Все</span></li>
                        <li><span>Стандартные</span></li>
                    </ul>
                </div>
            </div>
            <table class="table is-striped is-fullwidth is-size-875">
                <thead>
                <tr>
                    <th>Название ссылки</th>
                    <th>Категории</th>
                    <th>Тип</th>
                    <th>Размер</th>
                    <th>
                        <span>CR</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                           <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                        </span>
                    </th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody class="box is-paddingless">
                <tr v-for="resource in offer.resources">
                    <td>{{(resource.name)?resource.name.ru:'N/A'}}</td>
                    <td>{{resource.type}}</td>
                    <td>{{resource.resource_type}}</td>
                    <td>{{(resource.width)?resource.width+'x'+resource.height:'N/A'}}</td>
                    <td>{{(resource.cr)?resource.cr:'N/A'}}</td>
                    <td>
                        <div class="is-flex">
                            <a href="#" class="link-with-icon mr-1">
                                <img src="/svg/icons/ic_details.svg">
                                <span class="has-text-decoration-underline">Перейти на сайт</span>
                            </a>
                            <a href="#" class="link-with-icon">
                                <img src="/svg/icons/ic_link.svg">
                                <span class="has-text-decoration-underline">Сгенерировать ссылку</span>
                            </a>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </section>
        <!--payments-->
        <section class="section is-paddingless content" v-if="showTab.payments">
            <h3>Выплаты</h3>
            <div class="is-size-875 has-text-basic">
                <p>
                    Цель оффера - это действие, которое будет оплачено рекламодателем. У каждого рекламодателя свои цели
                    при
                    проведении рекламной кампании. В этом разделе представлены и подробно описаны все цели выбранного
                    вами
                    рекламодателя и эквивалентные им денежные вознаграждения, которые он готов заплатить за выполнение
                    вебмастером каждой цели.
                </p>
            </div>
            <table class="table is-striped is-fullwidth is-size-875">
                <thead>
                <tr>
                    <th>Регионы</th>
                    <th>Наименование цели</th>
                    <th>
                        <span>CPL</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                           <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                        </span>
                    </th>
                    <th>
                        <span>CPS</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                           <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                        </span>
                    </th>
                </tr>
                </thead>
                <tbody class="box is-paddingless">
                <tr v-for="target in offer.targets">
                    <td>{{target.country.translation.ru}}</td>
                    <td>{{target.name}}</td>
                    <td>{{target.cpl}}</td>
                    <td>{{target.cps}}</td>
                </tr>
                </tbody>
            </table>
        </section>
    </div>
</template>

<script>

    export default {
        name: "WebOffer",
        props: {id: {default: null}},
        components: {},
        data() {
            return {
                loaded:false,
                showTab: {
                    details: true,
                    condition: false,
                    instructions: false,
                    instruments: false,
                    payments: false,
                },
                offer: {}
            }
        },
        methods: {
            fetchOffer(id) {
                let vm = this;
                axios.get('/offer-get/' + id).then(responce => {
                    console.log(responce.data);
                    vm.offer = responce.data;
                    this.loaded = true;
                })
            },
            toggleTab(tab) {
                for(let el in this.showTab){
                    this.showTab[el] = false;
                }
                this.showTab[tab] = true
            }
        },
        created() {
            this.fetchOffer(this.$route.params.id)
        }
    }
</script>

<style scoped>

</style>
