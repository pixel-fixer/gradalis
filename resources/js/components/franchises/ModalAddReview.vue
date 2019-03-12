<template>
    <modal v-if="show" @close="$emit('close')">
        <div slot="header">
            <p class="modal-card-title mb-0">Оставить отзыв</p>
        </div>

        <div slot="body">
            <div class="content">
                <div class="columns is-multiline">
                    <g-g-input :size="'is-6'" v-model="form.name"
                               :label="'Ваше имя'"
                               :placeholder="'Введите Ваше имя'"></g-g-input>
                    <g-g-input :size="'is-6'" v-model="form.company"
                               :label="'Компания'"
                               :placeholder="'Название компании'"></g-g-input>
                    <g-g-input :size="'is-6'" v-model="form.email"
                               :label="'Контактный email'"
                               :placeholder="'Введите Ваш Email'"></g-g-input>
                    <g-g-input :size="'is-6'" v-model="form.position"
                               :label="'Ваша должност'"
                               :placeholder="'Введите должность'"></g-g-input>
                    <g-g-textarea :size="'is-12'" v-model="form.comment"
                                  :label="'Опишите ваши впечатления'"
                                  :placeholder="'Текст Вашего отзыва'"></g-g-textarea>
                    <div class="column is-12">
                        <upload-photo></upload-photo>
                    </div>
                    <div class="column is-12">
                        <upload-materials></upload-materials>
                    </div>
                </div>
            </div>
        </div>
        <div class="content w-full" slot="footer">
            <div class="columns is-multiline">
                <div class="column is-12">
                    <button
                        class="button is-info is-fullwidth has-text-weight-bold h-3 is-size-875">
                        Оставить отзыв
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

    import UploadPhoto from './UploadPhoto';
    import UploadMaterials from './UploadMaterials';

    export default {
        name: "ModalAddReviewFranchise",
        components: {
            Modal, GGInput, GGTextarea, UploadPhoto, UploadMaterials
        },
        props: {
            show: {default: false}
        },
        data: () => ({
            form: {
                name: null,
                company: null,
                email: null,
                position: null,
                comment: null,
            },
        })
    }
</script>

<style scoped>

</style>
