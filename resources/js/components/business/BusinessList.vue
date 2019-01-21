<template>
    <section class="section section-list-objects pt-1">
        <div class="container">
            <h1 class="section-title">Купить готовый бизнес в Польше</h1>
        </div>
        <div class="container">
            <example-form-filter></example-form-filter>
        </div>
        <div class="container">
            <!-- Cards objects -->
            <div class="columns is-multiline">
                <business-card v-for="business in businesses"
                               :category="business.revenue",
                               :revenue="business.revenue",
                               :profit="business.profit",
                               :profitability="business.profitability"
                               v-bind:key="business.id"
                ></business-card>
            </div>
            <!-- Pagination -->
            <div class="columns is-centered">
                <div class="column is-narrow has-text-centered">
                    <nav class="pagination is-centered" role="navigation" aria-label="pagination">
                        <a class="pagination-previous pagination-nav button" disabled="true">
                            <span class="pagination-nav__icon"><img src="/svg/icons/ic_arrow_right.svg" class="svg"/></span>
                            <span class="pagination-nav__title">Предыдущая страница</span>
                        </a>
                        <a class="pagination-next pagination-nav button is-link">
                            <span class="pagination-nav__title">Следующая страница</span>
                            <span class="pagination-nav__icon"><img src=<img src="/svg/icons/ic_arrow_right.svg" class="svg"/></span></a>
                        <ul class="pagination-list">
                            <li><a class="pagination-link" aria-label="Goto page 1">1</a></li>
                            <li><span class="pagination-ellipsis">&hellip;</span></li>
                            <li><a class="pagination-link" aria-label="Goto page 45">45</a></li>
                            <li><a class="pagination-link is-current" aria-label="Page 46" aria-current="page">46</a>
                            </li>
                            <li><a class="pagination-link" aria-label="Goto page 47">47</a></li>
                            <li><span class="pagination-ellipsis">&hellip;</span></li>
                            <li><a class="pagination-link" aria-label="Goto page 86">86</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import BusinessCard from './BusinessCard';
    import ExampleFormFilter from '../ExampleFormFilter';
    export default {
        comments:{
            'business-card':BusinessCard,
            'example-form-filter':ExampleFormFilter
        },
        data(){
            return{
                businesses:{}
            }
        },
        name: "BusinessList",
        methods: {
            fetchBusinesses(){
                let vm = this;
                axios.get('/get-businesses').then(responce=>{
                    vm.businesses = responce.data
                })
            }
        },
        mounted() {
            this.fetchBusinesses();
        }
    }
</script>

<style scoped>

</style>
