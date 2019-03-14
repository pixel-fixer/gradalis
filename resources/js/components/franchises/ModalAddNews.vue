<template>
    <modal v-if="show" @close="$emit('close')">
        <div slot="header">
            <p class="modal-card-title mb-0">Добавить новость</p>
        </div>

        <div slot="body">
            <div class="content">
                <div class="columns is-multiline">
                    <g-g-input :size="'is-12'" v-model="form.name"
                               :label="'Название'"
                               :placeholder="'Заголовок'"></g-g-input>
                    <g-g-date-input :size="'is-6'" v-model="form.date"
                               :label="'Дата публикации'">

                    </g-g-date-input>
                    <g-g-input :size="'is-6'" v-model="form.author"
                               :label="'Автор'"
                               :placeholder="'Автор публикации'"></g-g-input>


                    <g-g-textarea :size="'is-12'" v-model="form.content"
                                  :label="'Контент'"
                                  :placeholder="'Текст новости'"></g-g-textarea>
                    <div class="column is-12">
                        <upload-photo :label="'Фото новости'"></upload-photo>
                    </div>
                </div>
            </div>
        </div>
        <div class="content w-full" slot="footer">
            <div class="columns is-multiline">
                <div class="column is-12">
                    <button
                        class="button is-info is-fullwidth has-text-weight-bold h-3 is-size-875">
                        Добавить новость
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
    import GGDateInput from '../form/GGDateInput';

    import UploadPhoto from './UploadPhoto';

    export default {
        name: "ModalAddObjectFranchise",
        components: {
            Modal, GGInput, GGTextarea, UploadPhoto, GGDateInput
        },
        props: {
            show: {default: false},
        },
        data: () => ({
            form: {
                name: null,
                date: null,
                author: null,
                content: null,
            },
        })
    }
</script>

<style scoped>

</style>
