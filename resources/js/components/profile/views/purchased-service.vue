<template>
    <section class="section pt-1 px-0">
        <h1 class="section-title mb-1-75">
            <img src="/svg/icons/services/ic_spy.svg" alt="">
            <span>{{service.name}}</span>
        </h1>
    </section>
</template>

<script>
export default {
    props: ['service'],
    mounted(){
        console.log(this.$route)
    },
    getService(){
        ax
    }
}
</script>

<style>

</style>
