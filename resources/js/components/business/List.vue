<template>
    <section class="section section-list-objects pt-1">
        <div class="container">
            <h1 class="section-title">{{trans('business.index.title')}}</h1>
        </div>
        <div class="container">
            <example-form-filter v-on:change-filter="changeFilter"></example-form-filter>
        </div>
        <div class="container">
            <!-- Cards objects -->
            <div class="columns is-multiline">
                <business-card v-for="business in businesses.data"
                               :status="business.status"
                               :name="business.name"
                               :price="business.price"
                               :category="business.category"
                               :revenue="business.revenue"
                               :profit="business.profit"
                               :payback="business.payback"
                               :profitability="business.profitability"
                               :city="business.city"
                               :country="business.city.country"
                               :weight="business.weight"
                               :discount="business.discount"
                               v-bind:key="business.id"
                ></business-card>
            </div>
            <!-- Pagination -->
            <pagination :data="businesses" @pagination-change-page="fetchBusinesses">
                <span slot="prev-nav">
                     <a class="pagination-previous  pagination-nav button is-link">
                         <span class="pagination-nav__icon">
                             <img src="/svg/icons/ic_arrow_right.svg" class="svg"/>
                         </span>
                        <span class="pagination-nav__title">Предыдущая страница</span>
                     </a>
                </span>
                <span slot="next-nav">
                     <a class="pagination-next pagination-nav button is-link">
                         <span class="pagination-nav__title">Следующая страница</span>
                         <span class="pagination-nav__icon">
                             <img src="/svg/icons/ic_arrow_right.svg" class="svg"/></span>
                     </a>
                </span>
            </pagination>

        </div>
    </section>
</template>

<script>
    import BusinessCard from './Card';
    import Pagination from 'laravel-vue-pagination';
    import ExampleFormFilter from './FormFilter';

    export default {
        components: {
            'business-card': BusinessCard,
            'example-form-filter': ExampleFormFilter,
            'pagination': Pagination
        },
        data() {
            return {
                businesses: {},
                form: {}
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
                axios.get('/business-get?page=' + page, {
                    params: {
                        region: vm.form.region,
                        category: vm.form.category,
                        country: vm.form.country,
                        type: vm.form.type,
                        price: vm.form.price,
                        profit: vm.form.profit,
                        payback: vm.form.payback,
                        query: vm.form.query
                    }
                }).then(responce => {
                    vm.businesses = responce.data
                    vm.changeHisory(page);
                })
            },
            changeHisory(page){
                const params = new URLSearchParams(location.search);
                if (page > 1) {
                    params.set('page', page);
                } else {
                    params.delete('page');
                }

                for (const [key, value] of Object.entries(this.form)) {
                    if( value !== null ) {
                        params.set(key, value);
                    }
                }

                let url = '';
                if ([...params.entries()].length > 0) {
                    url += '?' + params.toString();
                }
                history.pushState(null, null, '/business' + url);
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
