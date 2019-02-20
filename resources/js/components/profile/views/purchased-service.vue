<template>
    <section class="section pt-1 px-0" v-if="service">
        <h1 class="section-title mb-1-75">
            <img :src="service.service.icon" alt="">
            <span>{{ $t(service.service.name) }}</span>
        </h1>
        <p>Процесс заказанной услуги</p>
    </section>
</template>

<script>
export default {
    // props: ['service'],
    data:()=> ({
        service: null
    }),
    mounted(){
        this.getService();
    },
    methods:{
        getService(){
            axios.get('/profile/api/purchased_service/' + this.$route.params.id)
            .then( res => {
                this.service = res.data;
            }).catch( e => {
                this.$swal({ type: 'error', title: e.response.status, text: e.response.data.message });
            })
        }
    }
}
</script>

<style>

</style>
