<template>
    <section class="section section-list-objects pt-1">
        <div class="container">
            <h1 class="section-title">{{trans('business.index.title')}}</h1>
        </div>
        <div class="container">
            <example-form-filter v-on:change-filter="changeFilter"></example-form-filter>
        </div>
        <template v-if="loaderBusinesses">
            <div class="loader"></div>
        </template>
        <div class="container">
            <!-- Cards objects -->
            <div class="columns is-multiline">
                <business-card v-for="business in businesses.data"
                               :business="business"
                               v-bind:key="business.id"
                ></business-card>
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
                const params = new URLSearchParams(location.search);
                if (page > 1) {
                    params.set('page', page);
                } else {
                    params.delete('page');
                }

                for (const [key, value] of Object.entries(this.form)) {
                    if (value !== null) {
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
