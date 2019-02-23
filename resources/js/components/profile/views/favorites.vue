<template>
     <section class="section pt-1 px-0">

<!-- <button @click="addTofavorites(2, 'business')">Добавить бизнес с id=2 в избранное</button> -->
<!-- <button @click="toggleFavorite(3, 'franchise')">Добавить франшизу с id=3 в избранное</button> -->

                    <h1 class="section-title mb-1-75">Избранное</h1>
                    <div v-if="firstLoad">...</div>
                    <div class="columns is-multiline" v-else-if='favoritesMapped.length > 0'>
                        <div class="column is-6" v-for="favorite in favoritesMapped">
                            <div class="card card-object">
                                <div class="card-image">
                                    <figure class="image is-16by9">
                                        <img
                                            src="https://www.hoteloxford.com/data/jpg/foto-galleria-130.jpg"
                                            alt="Placeholder image">
                                    </figure>
                                    <span class="tag tag-payback">
                                        <span class="name">окупаемость</span>
                                        <span class="term">{{favorite.profitability}} месяцев</span>
                                    </span>

                                    <a href="#" @click.prevent="toggleFavorite(favorite.id)" class="info-icon object-favorite active" v-tooltip="'Удалить из избранного'">
                                        <img src="/svg/icons/ic_favorites_white.svg" alt="Fav">
                                    </a>
                                </div>
                                <div class="card-content">
                                    <div class="card-object__header">
                                        <h3 class="title">{{ favorite.name }}</h3>
                                        <p class="location"><img src="/svg/icons/ic_location.svg"
                                                                 alt="Fav"><span>Россия, г. Санкт-Петербург</span>
                                        </p>
                                    </div>

                                    <div class="content card-object__content">
                                        <div class="list-properties">
                                            <div class="list-properties__item">
                                                <span>Категория</span>
                                                <span>{{ $t(favorite.category.translation) }}</span>
                                            </div>
                                            <div class="list-properties__item">
                                                <span>Выручка</span>
                                                <span><b>$48 000</b></span>
                                            </div>
                                            <div class="list-properties__item">
                                                <span>Прибыль</span>
                                                <span><b>$23 000</b></span>
                                            </div>
                                            <div class="list-properties__item">
                                                <span>Доходность</span>
                                                <span><b>{{ favorite.percent }}%</b></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-object__footer">
                                        <div class="price-info" v-if="$t(favorite.price)">
                                            <div class="price">{{ $t(favorite.price) }}</div>
                                        </div>
                                        <!-- ToDo: Для seller -->
                                        <a :href="(favorite.type =='business' ? '/business/' + favorite.id : '/franchise/' + favorite.id)" class="button is-link is-outlined is-fullwidth has-text-weight-bold">
                                            <template v-if="favorite.type =='business'">
                                                Подробнее о бизнесе
                                            </template>
                                            <template v-else>
                                                Подробнее о франшизе
                                            </template>
                                        </a>
                                        <!-- ToDo: Для buyer -->
                                        <!--<div class="columns is-multiline">-->
                                            <!--<div class="column is-6">-->
                                                <!--<div class="dropdown is-flex is-full">-->
                                                    <!--<div class="dropdown-trigger">-->
                                                        <!--<button class="button is-link is-size-875 h-3 is-fullwidth has-text-weight-bold p-0"-->
                                                                <!--aria-haspopup="true"-->
                                                                <!--aria-controls="dropdown-services-1">-->
                                                            <!--<span>Услуги</span>-->
                                                            <!--<div class="multiselect__select has-text-white"></div>-->
                                                        <!--</button>-->
                                                    <!--</div>-->
                                                    <!--<div class="dropdown-menu" id="dropdown-services-1" role="menu">-->
                                                        <!--<div class="dropdown-content is-paddingless">-->
                                                            <!--<a class="dropdown-item" href="#">Item</a>-->
                                                            <!--<hr class="dropdown-divider is-marginless">-->
                                                            <!--<a class="dropdown-item" href="#">Item</a>-->
                                                            <!--<hr class="dropdown-divider is-marginless">-->
                                                            <!--<a class="dropdown-item" href="#">Item</a>-->
                                                        <!--</div>-->
                                                    <!--</div>-->
                                                <!--</div>-->
                                            <!--</div>-->
                                            <!--<div class="column is-6"><a class="button is-link is-outlined is-fullwidth has-text-weight-bold">Подробнее</a></div>-->
                                        <!--</div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div v-else>Список избранного пуст</div>
                </section>
</template>

<script>
export default {
    data: () =>({
        favorites: [],
        firstLoad: true
    }),
    mounted(){
        this.getData()
    },
    computed:{
        favoritesMapped(){
            return this.favorites.map( item => {
                return item.favoriteable
            })
        }
    },
    methods:{
        getData(){
            axios.get('/profile/favorite')
                .then( res =>{
                    this.favorites = res.data
                    this.firstLoad = false;
                })
                .catch(e => alert(e.response.data.message))
        },
        toggleFavorite(id, type){
            axios.post('/profile/favorites/' + type + '/' + id).then( res => {
                this.$swal({ type: 'success', text: res.data.message });
                this.getData()
            }).catch( e => {
                this.$swal({ type: 'error', title: e.response.status, text: e.response.data.message });
            })
        }
    }
}
</script>
