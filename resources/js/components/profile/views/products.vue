<template>
    <section class="section pt-1 px-0">
        <div class="notification-list" v-if="showFlash">
            <transition name="fade">
                <div class="notification is-success">
                    <button class="delete" @click="showFlash = false"></button>
                    <div class="notification__icon">
                        <img src="/svg/icons/notification/ic_thankyou.svg" class="svg" alt="">
                    </div>
                    <div class="notification__content-wrap">
                        <h5 class="notification__title has-text-weight-bold">
                            Спасибо за регистрацию!
                        </h5>
                        <div class="notification__content is-size-875">
                            Добрый день, Андрей. Спасибо за регистрацию на нашем портале. Выбирайте продукты и
                            начинайте продавать свой бизнес или франшизу.
                        </div>
                    </div>
                </div>
            </transition>
        </div>
        <h1 class="section-title mb-1-75">Продукты</h1>
        <div class="buttons buttons-services-list">
            <button v-for="category in categories"
                @click="toggleCategory(category.id)"
                :key="category.id"
                :class="{'is-active': categoriesFilter.indexOf(category.id) >=0}"
                class="button is-outlined is-info is-size-875 has-text-weight-bold">{{ category.name }}</button>
       
        </div>
        <div >
            <transition-group name="fade" class="columns is-multiline">
                <div class="column is-6" v-for="product in productsFiltered" :key="product.id">
                    <div class="card card-service">
                        <div class="card-service__body">
                            <div class="is-flex">
                                <figure class="card-service__icon" v-if="product.icon">
                                    <img :src="product.icon" alt="">
                                </figure>
                                <h4 class="card-service__title">{{ product.name }}</h4>
                            </div>
                            <div class="card-service__info">
                                <div class="card-service__excerpt is-size-875" v-if="product.small_text">{{ $t(product.small_text) }}</div>
                                <div class="card-service__price">€{{product.price_eur}}<template v-if="$t(product.price_for)"> {{ $t(product.price_for) }}</template></div>
                            </div>
                        </div>
                        <div class="card-service__footer">
                            <a class="button is-warning is-outlined is-size-875 h-3">Заказать</a>
                            <!-- <a :href="product.slug" class="button is-clear is-clear_close is-size-875 h-3"><span class="has-text-decoration-underline">Подробнее</span></a> -->
                            <a href="/services-new/single" class="button is-clear is-clear_close is-size-875 h-3"><span class="has-text-decoration-underline">Подробнее</span></a>
                        </div>
                    </div>
                </div>
            </transition-group>
        </div>
    </section>
</template>

<script>
export default {
    data:() => ({
        products: [],
        categoriesFilter: [],
        showFlash: true
    }),
    mounted(){
        this.getData()
    },
    computed:{
        categories(){
            return _.uniqBy(this.products.map(item => {
                return item.category
            }), 'id')
        },
        productsFiltered(){
            if(this.categoriesFilter.length > 0){
                return this.products.filter( item => {
                    return this.categoriesFilter.indexOf(item.category_id) >= 0
                })
            }else{
                return this.products;
            }
        }
    },
    methods: {
        getData(){
            axios.get('/services/list').then( res => {
                this.products = res.data
            }).catch(e => {
                alert(e.response.data.message)
            })
        },
        toggleCategory(id){
            if(this.categoriesFilter.indexOf(id) >=0){
                this.categoriesFilter.splice(this.categoriesFilter.indexOf(id), 1)
            }else{
                this.categoriesFilter.push(id)
            }
            this.categoriesFilter = this.categoriesFilter.slice(0);
        }
    }
}
</script>

<style>

</style>
