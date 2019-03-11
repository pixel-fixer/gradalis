<template>
    <modal v-if="show" @close="$emit('close')">
        <div slot="header">
            <p class="modal-card-title mb-0">Купить франшизу</p>
        </div>

        <div slot="body">
            <div class="content">
                <div class="columns is-multiline">
                    <g-g-input :size="'is-6'" v-model="form.name"
                               :label="'Ваше имя'"
                               :placeholder="'Введите Ваше имя'"></g-g-input>
                    <g-g-input :size="'is-6'" v-model="form.phone"
                               :label="'Контактный телефон'"
                               :placeholder="'+48 (456) 566-09-23'"></g-g-input>
                    <g-g-input :size="'is-12'" v-model="form.email"
                               :label="'Контактный email'"
                               :placeholder="'Введите Ваш Email'"></g-g-input>
                    <g-g-textarea :size="'is-12'" v-model="form.comment"
                                  :label="'Комментарий'"
                                  :placeholder="'Сопроводительный текст'"></g-g-textarea>
                </div>
            </div>
        </div>
        <div class="content w-full" slot="footer">
            <div class="columns is-multiline">
                <div class="column is-12">
                    <button
                        class="button is-link is-fullwidth has-text-weight-bold h-3 is-size-875">
                        Откликнуться
                    </button>
                </div>
            </div>
        </div>
    </modal>
</template>

<script>
    import Modal from './../Modal';
    import GGInput from '../form/GGInput';
    import GGTextarea from '../form/GGTextarea';

    export default {
        name: "ModalBuyFranchise",
        components: {
            Modal, GGInput, GGTextarea
        },
        props: {
            show: {default: false}
        },
        data: () => ({
            form: {
                name: null,
                phone: null,
                email: null,
                comment: null,
            },
        })
    }
</script>

<style scoped>

</style>
