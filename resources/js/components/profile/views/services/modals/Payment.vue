<template>
    <modal v-if="show" @close="$emit('close')">
        <div slot="header">
            <p class="modal-card-title mb-0">Оплата услуги</p>
        </div>

        <div slot="body">
            <div class="content">
                <div class="columns is-multiline">
                    <g-g-select-input v-model="formPayment.type" :size="'is-6'"
                                      :label="'Предпочитаемый тип оплаты'" :searchable="true"
                                      :options="typesPayment"
                                      :withImg="true">
                    </g-g-select-input>
                    <g-g-select-input v-model="formPayment.currency" :size="'is-6'"
                                      :placeholder="'Выберите'"
                                      :label="'Валюта счета'" :searchable="true"
                                      :options="typesCurrency">
                    </g-g-select-input>
                </div>
                <hr class="hr-basic">
                <div class="is-size-875 has-text-centered">Общая стоимость</div>
                <div class="has-text-centered has-text-weight-bold is-size-5">€2000</div>
            </div>
        </div>
        <div class="content w-full" slot="footer">
            <div class="columns is-multiline">
                <div class="column is-12">
                    <button
                        class="button is-link is-fullwidth has-text-weight-bold h-3 is-size-875"
                        @click="$emit('success')">
                        Оплатить
                    </button>
                </div>
            </div>
        </div>
    </modal>
</template>

<script>
    import Modal from './../../../../Modal'
    import GGSelectInput from '../../../../form/GGSelectInput'

    export default {
        name: "modalPaymentService",
        components: {
            Modal,
            GGSelectInput
        },
        props: {
            show: {default: false}
        },
        data: () => ({
            formPayment: {
                type: null,
                currency: null,
            },
            typesPayment: [
                {
                    id: 1,
                    name: 'Item 1',
                    img: 'https://vue-multiselect.js.org/static/posters/trading_post.png'
                },
                {
                    id: 2,
                    name: 'Item 2',
                    img: 'https://vue-multiselect.js.org/static/posters/trading_post.png'
                },
                {
                    id: 3,
                    name: 'Item 3',
                    img: 'https://vue-multiselect.js.org/static/posters/trading_post.png'
                },
                {
                    id: 4,
                    name: 'Item 4',
                    img: 'https://vue-multiselect.js.org/static/posters/trading_post.png'
                },
            ],
            typesCurrency: [
                {
                    id: 1,
                    name: 'Item 1',
                },
                {
                    id: 2,
                    name: 'Item 2',
                },
                {
                    id: 3,
                    name: 'Item 3',
                },
                {
                    id: 4,
                    name: 'Item 4',
                },
            ]
        })
    }
</script>

<style scoped>

</style>
