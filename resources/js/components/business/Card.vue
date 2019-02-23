<template>
    <div class="column is-4">
        <div class="card card-object" v-bind:class="[(business.weight>0 && business.status == 2)?'card-object_promo':'']">
            <div class="card-image">
                <figure class="image is-16by9">
                    <img src="https://www.hoteloxford.com/data/jpg/foto-galleria-130.jpg"
                         alt="Placeholder image">
                </figure>
                <span class="tag tag-payback">
                            <span class="name">окупаемость</span>
                            <span class="term">{{ business.payback }} месяцев</span>
                        </span>
                <span v-if="(business.weight > 0)" class="info-icon object-promo">
                            <img src="/svg/icons/ic_recommended.svg" alt="Recommended">
                        </span>
                <span v-if="(business.discount && business.status != 3)" class="info-icon object-sale">
                            <img src="/svg/icons/ic_sale.svg" alt="Sale">
                        </span>
                <a v-if="(business.status == 2)" href="#" class="info-icon object-favorite"
                   @click.prevent="toggleFavorite(businessId, 'business')"
                   v-tooltip="'Добавить в избранное'">
                    :class="{active: isFavorite}"
                    <img src="/svg/icons/ic_favorites_white.svg" alt="Fav">
                </a>

                <span v-if="(business.status == 3)" class="tag is-warning tag-object-sold">Продано</span>

            </div>
            <div class="card-content">
                <div class="card-object__header">
                    <h3 class="title">{{business.name}}</h3>
                    <p class="location"><img src="/svg/icons/ic_location.svg"
                                             alt="Fav"><span>{{business.city.country.translation.ru}}, г. {{business.city.translation.ru}}</span>
                    </p>
                </div>

                <div class="content card-object__content">
                    <div class="list-properties">
                        <div class="list-properties__item">
                            <span>Категория</span>
                            <span>{{business.category.translation.ru}}</span>
                        </div>
                        <div class="list-properties__item">
                            <span>Выручка</span>
                            <span><b>{{ formatPrice(business.revenue) }}</b></span>
                        </div>
                        <div class="list-properties__item">
                            <span>Прибыль</span>
                            <span><b>{{formatPrice(business.profit)}}</b></span>
                        </div>
                        <div class="list-properties__item">
                            <span>Доходность</span>
                            <span><b>{{business.profitability}}%</b></span>
                        </div>
                    </div>
                </div>
                <div class="card-object__footer">
                    <div class="price-info">
                        <span v-if="(business.discount && business.status != 3)" class="tag is-danger price-sale">-{{business.discount}}%</span>
                        <div class="price">{{
                            (business.discount)?formatPrice(business.price-business.price*(business.discount/100)):formatPrice(business.price)
                            }}
                        </div>
                        <span v-if="(business.discount && business.status != 3)" class="price-old">{{formatPrice(business.price)}}</span>
                    </div>
                    <a :href="'/business/'+business.id" v-if="(business.status == 2)"
                       class="button is-link is-outlined is-fullwidth has-text-weight-bold"
                       v-bind:class="[(business.weight>0)?'is-success':'is-link']">Подробнее о бизнесе</a>
                    <a :href="'/business/'+business.id" v-if="(business.status == 3)"
                       class="button is-warning is-outlined is-fullwidth has-text-weight-bold">Подробнее о сделке</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "BusinessCard",
        props: {
            business:{default:null}
        },
        components: {},
        data() {
            return {
                //discount:false,
            }
        },
        methods: {
            formatPrice(value) {
                return value.toLocaleString('pl-PL', { style: 'currency', currency: 'PLN' })
            },
            /**
             * @param {integer} id
             * @param {string} type - business или franchise
             */
            toggleFavorite(id, type){
                axios.post('/profile/favorites/' + type + '/' + id)
                    .then( res => {
                        this.$swal({ type: 'success', text: res.data.message });
                        this.$emit('fetch-data');
                    }).catch( e => {
                        this.$swal({ type: 'error', title: e.response.status, text: e.response.data.message });
                    })
            }
        }
    }
</script>
