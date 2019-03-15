<template>
    <section class="section section-list-objects pt-1">
        <div class="container">
            <h1 class="section-title">Купить франшизы в Польше</h1>
        </div>
        <div class="container">
            <form-filter-franchise v-on:change-filter="changeFilter"></form-filter-franchise>
        </div>
        <!--<template v-if="loaderBusinesses">-->
            <!--<div class="loader"></div>-->
        <!--</template>-->
        <div class="container">
            <!-- Cards objects -->
            <div class="columns is-multiline">
                <!--<business-card v-for="business in businesses.data"-->
                <!--:business="business"-->
                <!--v-bind:key="business.id"-->
                <!--&gt;</business-card>-->
                <!-- ToDo: структурно картчока точно такая же, как у бизнеса, только другой контент -->
                <div class="column is-4">
                    <div class="card card-object">
                        <div class="card-image">
                            <figure class="image is-16by9"><img
                                src="https://www.hoteloxford.com/data/jpg/foto-galleria-130.jpg"
                                alt="Placeholder image"></figure>
                            <span class="tag tag-payback"><span class="name">прибыль в месяц</span> <span class="term">$ 25 000</span></span>
                            <!--<span class="info-icon object-promo">-->
                            <!--<img src="/svg/icons/ic_recommended.svg" alt="Recommended">-->
                            <!--</span>-->
                            <!--<span class="info-icon object-sale"><img src="/svg/icons/ic_sale.svg" alt="Sale"></span>-->
                            <a href="#" class="info-icon object-favorite has-tooltip"><img
                                src="/svg/icons/ic_favorites_white.svg" alt="Fav"></a>
                        </div>
                        <div class="card-content">
                            <div class="card-object__header"><h3 class="title">ОАО ИнжВодСтрой</h3>
                                <p class="location"><img src="/svg/icons/ic_location.svg" alt="Fav"><span>Польша, г. Билава
                                </span></p>
                            </div>
                            <div class="content card-object__content">
                                <div class="list-properties">
                                    <div class="list-properties__item"><span>Категория</span> <span>IT-бизнес</span>
                                    </div>
                                    <div class="list-properties__item"><span>Размер инвестиций</span>
                                        <span><b>$48 000</b></span>
                                    </div>
                                    <div class="list-properties__item"><span>Окупаемость</span>
                                        <span><b>1 мес</b></span>
                                    </div>
                                    <div class="list-properties__item"><span>Без роялти</span> <span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-object__footer">
                                <a href="/franchises/single"
                                   class="button is-outlined is-fullwidth has-text-weight-bold is-info">Подробнее
                                    о франшизе</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="card card-object">
                        <div class="card-image">
                            <figure class="image is-16by9"><img
                                src="https://www.hoteloxford.com/data/jpg/foto-galleria-130.jpg"
                                alt="Placeholder image"></figure>
                            <span class="tag tag-payback"><span class="name">прибыль в месяц</span> <span class="term">$ 25 000</span></span>
                            <!--<span class="info-icon object-promo">-->
                            <!--<img src="/svg/icons/ic_recommended.svg" alt="Recommended">-->
                            <!--</span>-->
                            <!--<span class="info-icon object-sale"><img src="/svg/icons/ic_sale.svg" alt="Sale"></span>-->
                            <a href="#" class="info-icon object-favorite has-tooltip"><img
                                src="/svg/icons/ic_favorites_white.svg" alt="Fav"></a>
                        </div>
                        <div class="card-content">
                            <div class="card-object__header"><h3 class="title">ОАО ИнжВодСтрой</h3>
                                <p class="location"><img src="/svg/icons/ic_location.svg" alt="Fav"><span>Польша, г. Билава
                                </span></p>
                            </div>
                            <div class="content card-object__content">
                                <div class="list-properties">
                                    <div class="list-properties__item"><span>Категория</span> <span>IT-бизнес</span>
                                    </div>
                                    <div class="list-properties__item"><span>Размер инвестиций</span>
                                        <span><b>$48 000</b></span>
                                    </div>
                                    <div class="list-properties__item"><span>Окупаемость</span>
                                        <span><b>1 мес</b></span>
                                    </div>
                                    <div class="list-properties__item"><span>Без роялти</span> <span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-object__footer">
                                <a href="/franchises/single"
                                   class="button is-outlined is-fullwidth has-text-weight-bold is-info">Подробнее
                                    о франшизе</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="card card-object">
                        <div class="card-image">
                            <figure class="image is-16by9"><img
                                src="https://www.hoteloxford.com/data/jpg/foto-galleria-130.jpg"
                                alt="Placeholder image"></figure>
                            <span class="tag tag-payback"><span class="name">прибыль в месяц</span> <span class="term">$ 25 000</span></span>
                            <!--<span class="info-icon object-promo">-->
                            <!--<img src="/svg/icons/ic_recommended.svg" alt="Recommended">-->
                            <!--</span>-->
                            <!--<span class="info-icon object-sale"><img src="/svg/icons/ic_sale.svg" alt="Sale"></span>-->
                            <a href="#" class="info-icon object-favorite has-tooltip"><img
                                src="/svg/icons/ic_favorites_white.svg" alt="Fav"></a>
                        </div>
                        <div class="card-content">
                            <div class="card-object__header"><h3 class="title">ОАО ИнжВодСтрой</h3>
                                <p class="location"><img src="/svg/icons/ic_location.svg" alt="Fav"><span>Польша, г. Билава
                                </span></p>
                            </div>
                            <div class="content card-object__content">
                                <div class="list-properties">
                                    <div class="list-properties__item"><span>Категория</span> <span>IT-бизнес</span>
                                    </div>
                                    <div class="list-properties__item"><span>Размер инвестиций</span>
                                        <span><b>$48 000</b></span>
                                    </div>
                                    <div class="list-properties__item"><span>Окупаемость</span>
                                        <span><b>1 мес</b></span>
                                    </div>
                                    <div class="list-properties__item"><span>Без роялти</span> <span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-object__footer">
                                <a href="/franchises/single"
                                   class="button is-outlined is-fullwidth has-text-weight-bold is-info">Подробнее
                                    о франшизе</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="card card-object">
                        <div class="card-image">
                            <figure class="image is-16by9"><img
                                src="https://www.hoteloxford.com/data/jpg/foto-galleria-130.jpg"
                                alt="Placeholder image"></figure>
                            <span class="tag tag-payback"><span class="name">прибыль в месяц</span> <span class="term">$ 25 000</span></span>
                            <!--<span class="info-icon object-promo">-->
                            <!--<img src="/svg/icons/ic_recommended.svg" alt="Recommended">-->
                            <!--</span>-->
                            <!--<span class="info-icon object-sale"><img src="/svg/icons/ic_sale.svg" alt="Sale"></span>-->
                            <a href="#" class="info-icon object-favorite has-tooltip"><img
                                src="/svg/icons/ic_favorites_white.svg" alt="Fav"></a>
                        </div>
                        <div class="card-content">
                            <div class="card-object__header"><h3 class="title">ОАО ИнжВодСтрой</h3>
                                <p class="location"><img src="/svg/icons/ic_location.svg" alt="Fav"><span>Польша, г. Билава
                                </span></p>
                            </div>
                            <div class="content card-object__content">
                                <div class="list-properties">
                                    <div class="list-properties__item"><span>Категория</span> <span>IT-бизнес</span>
                                    </div>
                                    <div class="list-properties__item"><span>Размер инвестиций</span>
                                        <span><b>$48 000</b></span>
                                    </div>
                                    <div class="list-properties__item"><span>Окупаемость</span>
                                        <span><b>1 мес</b></span>
                                    </div>
                                    <div class="list-properties__item"><span>Без роялти</span> <span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-object__footer">
                                <a href="/franchises/single"
                                   class="button is-outlined is-fullwidth has-text-weight-bold is-info">Подробнее
                                    о франшизе</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="card card-object">
                        <div class="card-image">
                            <figure class="image is-16by9"><img
                                src="https://www.hoteloxford.com/data/jpg/foto-galleria-130.jpg"
                                alt="Placeholder image"></figure>
                            <span class="tag tag-payback"><span class="name">прибыль в месяц</span> <span class="term">$ 25 000</span></span>
                            <!--<span class="info-icon object-promo">-->
                            <!--<img src="/svg/icons/ic_recommended.svg" alt="Recommended">-->
                            <!--</span>-->
                            <!--<span class="info-icon object-sale"><img src="/svg/icons/ic_sale.svg" alt="Sale"></span>-->
                            <a href="#" class="info-icon object-favorite has-tooltip"><img
                                src="/svg/icons/ic_favorites_white.svg" alt="Fav"></a>
                        </div>
                        <div class="card-content">
                            <div class="card-object__header"><h3 class="title">ОАО ИнжВодСтрой</h3>
                                <p class="location"><img src="/svg/icons/ic_location.svg" alt="Fav"><span>Польша, г. Билава
                                </span></p>
                            </div>
                            <div class="content card-object__content">
                                <div class="list-properties">
                                    <div class="list-properties__item"><span>Категория</span> <span>IT-бизнес</span>
                                    </div>
                                    <div class="list-properties__item"><span>Размер инвестиций</span>
                                        <span><b>$48 000</b></span>
                                    </div>
                                    <div class="list-properties__item"><span>Окупаемость</span>
                                        <span><b>1 мес</b></span>
                                    </div>
                                    <div class="list-properties__item"><span>Без роялти</span> <span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-object__footer">
                                <a href="/franchises/single"
                                   class="button is-outlined is-fullwidth has-text-weight-bold is-info">Подробнее
                                    о франшизе</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="card card-object">
                        <div class="card-image">
                            <figure class="image is-16by9"><img
                                src="https://www.hoteloxford.com/data/jpg/foto-galleria-130.jpg"
                                alt="Placeholder image"></figure>
                            <span class="tag tag-payback"><span class="name">прибыль в месяц</span> <span class="term">$ 25 000</span></span>
                            <!--<span class="info-icon object-promo">-->
                            <!--<img src="/svg/icons/ic_recommended.svg" alt="Recommended">-->
                            <!--</span>-->
                            <!--<span class="info-icon object-sale"><img src="/svg/icons/ic_sale.svg" alt="Sale"></span>-->
                            <a href="#" class="info-icon object-favorite has-tooltip"><img
                                src="/svg/icons/ic_favorites_white.svg" alt="Fav"></a>
                        </div>
                        <div class="card-content">
                            <div class="card-object__header"><h3 class="title">ОАО ИнжВодСтрой</h3>
                                <p class="location"><img src="/svg/icons/ic_location.svg" alt="Fav"><span>Польша, г. Билава
                                </span></p>
                            </div>
                            <div class="content card-object__content">
                                <div class="list-properties">
                                    <div class="list-properties__item"><span>Категория</span> <span>IT-бизнес</span>
                                    </div>
                                    <div class="list-properties__item"><span>Размер инвестиций</span>
                                        <span><b>$48 000</b></span>
                                    </div>
                                    <div class="list-properties__item"><span>Окупаемость</span>
                                        <span><b>1 мес</b></span>
                                    </div>
                                    <div class="list-properties__item"><span>Без роялти</span> <span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-object__footer">
                                <a href="/franchises/single"
                                   class="button is-outlined is-fullwidth has-text-weight-bold is-info">Подробнее
                                    о франшизе</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pagination -->
            <pagination :data="businesses" :show-disabled="true" @pagination-change-page="fetchBusinesses">
                <a :disabled="prevDisabled" slot="prev-nav" class="pagination-previous  pagination-nav button is-link">
                         <span class="pagination-nav__icon">
                             <img src="/svg/icons/ic_arrow_right.svg" class="svg"/>
                         </span>
                    <span class="pagination-nav__title">Предыдущая страница</span>
                </a>
                <a :disabled="nextDisabled" slot="next-nav" class="pagination-next pagination-nav button is-link">
                    <span class="pagination-nav__title">Следующая страница</span>
                    <span class="pagination-nav__icon">
                             <img src="/svg/icons/ic_arrow_right.svg" class="svg"/></span>
                </a>
            </pagination>

        </div>
    </section>
</template>

<script>
    import BusinessCard from '../business/Card';
    import Pagination from 'laravel-vue-pagination';
    import FormFilterFranchise from './FormFilter';

    export default {
        components: {
            'business-card': BusinessCard,
            'form-filter-franchise': FormFilterFranchise,
            'pagination': Pagination
        },
        data() {
            return {
                businesses: {},
                form: {
                    saled: true,
                    type: null,
                    country: 1,
                    category: null,
                    region: 1,
                    city: 1,
                    price: null,
                    profit: null,
                    payback: null,
                    query: null
                },
                loaderBusinesses: false,
                prevDisabled: false,
                nextDisabled: false
            }
        },
        name: "BusinessList",
        methods: {
            changeFilter(data) {
                this.form = data;
                this.fetchBusinesses();
            },
            fetchBusinesses(page = 1) {
                let vm = this;
                vm.loaderBusinesses = true;
                console.log(vm.form);
                axios.get('/business-get?page=' + page, {params: vm.form}).then(responce => {
                    if (page == 1) {
                        vm.prevDisabled = true;
                    } else {
                        vm.prevDisabled = false;
                    }
                    if (page == responce.data.last_page) {
                        vm.nextDisabled = true;
                    } else {
                        vm.nextDisabled = false;
                    }
                    vm.loaderBusinesses = false;
                    vm.businesses = responce.data
                    vm.changeHisory(page);
                })
            },
            changeHisory(page) {
                // const params = new URLSearchParams(location.search);
                // if (page > 1) {
                //     params.set('page', page);
                // } else {
                //     params.delete('page');
                // }
                //
                // for (const [key, value] of Object.entries(this.form)) {
                //     if (value !== null) {
                //         params.set(key, value);
                //     }
                // }
                //
                // let url = '';
                // if ([...params.entries()].length > 0) {
                //     url += '?' + params.toString();
                // }
                // history.pushState(null, null, '/business' + url);
            }
        },
        created() {
            const params = new URLSearchParams(location.search);
            let page = 1;
            if (params.has('page')) {
                page = params.get('page');
            }
            for (const [key, value] of Object.entries(this.form)) {
                if (params.has(key)) {
                    this.form[key] = value;
                }
            }
            this.fetchBusinesses(page);
        }
    }
</script>

<style scoped>

</style>
