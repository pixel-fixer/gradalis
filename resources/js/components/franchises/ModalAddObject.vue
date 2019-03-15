<template>
    <modal v-if="show" @close="$emit('close')">
        <div slot="header">
            <p class="modal-card-title mb-0">Добавить новый объект</p>
        </div>

        <div slot="body">
            <div class="content">
                <div class="columns is-multiline">
                    <g-g-input :size="'is-12'" v-model="form.name"
                               :label="'Название'"
                               :placeholder="'Название объекта'"></g-g-input>
                    <g-g-input :size="'is-6'" v-model="form.phone"
                               :label="'Телефон'"
                               :placeholder="'+48 456 566-09-23'"></g-g-input>
                    <g-g-input :size="'is-6'" v-model="form.email"
                               :label="'Email'"
                               :placeholder="'Email'"></g-g-input>

                    <g-g-input :size="'is-12'" v-model="form.address"
                               :label="'Адреc на Google maps'"
                               :placeholder="'Poland, Warsaw, Zamkowy Square 1/13, 00-262'"></g-g-input>
                    <g-g-textarea :size="'is-12'" v-model="form.comment"
                                  :label="'Описание'"
                                  :placeholder="'Описание'"></g-g-textarea>
                    <div class="column is-12">
                        <upload-photo :label="'Фото объекта'"></upload-photo>
                    </div>
                </div>
            </div>
        </div>
        <div class="content w-full" slot="footer">
            <div class="columns is-multiline">
                <div class="column is-12">
                    <button
                        class="button is-info is-fullwidth has-text-weight-bold h-3 is-size-875">
                        Добавить объект
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

    export default {
        name: "ModalAddObjectFranchise",
        components: {
            Modal, GGInput, GGTextarea, UploadPhoto
        },
        props: {
            show: {default: false},
        },
        data: () => ({
            form: {
                name: null,
                phone: null,
                email: null,
                address: null,
                comment: null,
            },
        })
    }
</script>

<style scoped>

</style>
