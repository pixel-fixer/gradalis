<template>
    <div class="columns is-multiline">
        <business-card v-for="business in businesses.data"
                       :businessId="business.id"
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
</template>

<script>
    import BusinessCard from './Card';

    export default {
        name: "MainList",
        components: {
            BusinessCard,
        },
        data() {
            return {
                businesses: {},
            }
        },
        mounted() {
            this.fetchBusinesses();
        },
        methods: {
            fetchBusinesses() {
                let vm = this;
                axios.get('/business-get', {
                    params: {}
                }).then(responce => {
                    vm.businesses = responce.data
                })
            },
        },
    }
</script>

<style scoped>

</style>
