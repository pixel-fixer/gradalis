<template>
    <div class="column is-4">
        <div class="card card-object" v-bind:class="[(weight>0 && status == 2)?'card-object_promo':'']">
            <div class="card-image">
                <figure class="image is-16by9">
                    <img src="https://www.hoteloxford.com/data/jpg/foto-galleria-130.jpg"
                         alt="Placeholder image">
                </figure>
                <span class="tag tag-payback">
                            <span class="name">окупаемость</span>
                            <span class="term">{{ payback }} месяцев</span>
                        </span>
                <span v-if="(weight > 0)" class="info-icon object-promo">
                            <img src="/svg/icons/ic_recommended.svg" alt="Recommended">
                        </span>
                <span v-if="(discount && status != 3)" class="info-icon object-sale">
                            <img src="/svg/icons/ic_sale.svg" alt="Sale">
                        </span>
                <a v-if="(status == 2)" href="#" class="info-icon object-favorite" v-tooltip="'Добавить в избранное'">
                    <img src="/svg/icons/ic_favorites_white.svg" alt="Fav">
                </a>

                <span v-if="(status == 3)" class="tag is-warning tag-object-sold">Продано</span>

            </div>
            <div class="card-content">
                <div class="card-object__header">
                    <h3 class="title">{{name}}</h3>
                    <p class="location"><img src="/svg/icons/ic_location.svg"
                                             alt="Fav"><span>{{country.translation.ru}}, г. {{city.translation.ru}}</span>
                    </p>
                </div>

                <div class="content card-object__content">
                    <div class="list-properties">
                        <div class="list-properties__item">
                            <span>Категория</span>
                            <span>{{category.translation.ru}}</span>
                        </div>
                        <div class="list-properties__item">
                            <span>Выручка</span>
                            <span><b>{{ formatPrice(revenue) }}</b></span>
                        </div>
                        <div class="list-properties__item">
                            <span>Прибыль</span>
                            <span><b>{{formatPrice(profit)}}</b></span>
                        </div>
                        <div class="list-properties__item">
                            <span>Доходность</span>
                            <span><b>{{profitability}}%</b></span>
                        </div>
                    </div>
                </div>
                <div class="card-object__footer">
                    <div class="price-info">
                        <span v-if="(discount && status != 3)" class="tag is-danger price-sale">-{{discount}}%</span>
                        <div class="price">{{ (discount)?formatPrice(price-price*(discount/100)):formatPrice(price) }}</div>
                        <span v-if="(discount && status != 3)" class="price-old">{{formatPrice(price)}}</span>
                    </div>
                    <a :href="'/business/'+businessId" v-if="(status == 2)"
                       class="button is-link is-outlined is-fullwidth has-text-weight-bold"
                       v-bind:class="[(weight>0)?'is-success':'is-link']">Подробнее о бизнесе</a>
                    <a :href="'/business/'+businessId" v-if="(status == 3)"
                       class="button is-warning is-outlined is-fullwidth has-text-weight-bold">Подробнее о сделке</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "BusinessCard",
        props: [
            'businessId',
            'status',
            'name',
            'price',
            'category',
            'revenue',
            'profit',
            'profitability',
            'payback',
            'city',
            'country',
            'weight',
            'discount'
        ],
        components: {},
        data() {
            return {
                //discount:false,
            }
        },
        methods: {
            formatPrice(value) {
                return value.toLocaleString('pl-PL', { style: 'currency', currency: 'PLN' })
            }
        }
    }
</script>

<style scoped>

</style>
