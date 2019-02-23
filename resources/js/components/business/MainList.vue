<template>
    <div class="columns is-multiline">
        <business-card v-for="business in businesses.data"
                       :business="business"
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
