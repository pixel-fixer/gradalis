<template>
    <modal v-if="show" @close="$emit('close')">
        <div slot="header">

        </div>

        <div slot="body">
            <div class="content">
                <div class="has-text-centered has-text-weight-bold">
                    <img src="/svg/icons/notification/ic_thankyou.svg" alt="">
                </div>
                <div class="has-text-centered has-text-weight-bold is-size-4">Успешная оплата</div>
                <div class="is-size-875 has-text-centered has-text-basic">Спасибо, что пользуетесь нашими услугами
                </div>
            </div>
        </div>
        <div slot="footer">

        </div>
    </modal>
</template>

<script>
    import Modal from './../../../../Modal'

    export default {
        name: "modalPaymentServiceSuccess",
        components: {
            Modal
        },
        props: {
            show: {default: false}
        },
        data: () => ({

        })
    }
</script>

<style scoped>

</style>
