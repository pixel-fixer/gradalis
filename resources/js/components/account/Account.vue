<template>
    <router-view></router-view>
</template>

<script>
    export default {
        data: () => ({
            user: null
        }),
        mounted(){

            this.user = this.$store.state.user
        }
    }
</script>

<style>

</style>

