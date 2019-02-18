<template>
    <modal v-if="show"
           @close="show = false">
        <div slot="header">
            <p class="modal-card-title mb-0">{{title}}</p>
        </div>

        <div slot="body">
            <div class="content">
                <div class="columns is-multiline">
                    <g-g-input :size="'is-6'" v-model="form.name.value"
                               :label="form.name.title"
                               :placeholder="form.name.placeholder"
                               :required="form.name.required"></g-g-input>
                    <g-g-input :size="'is-6'" v-model="form.phone.value"
                               :label="form.phone.title"
                               :placeholder="form.phone.placeholder"
                               :required="form.phone.required"></g-g-input>
                    <g-g-input :size="'is-6'" v-model="form.email.value"
                               :label="form.email.title"
                               :placeholder="form.email.placeholder"
                               :required="form.email.required"></g-g-input>
                    <g-g-input :size="'is-6'" v-model="form.resumeLink.value"
                               :label="form.resumeLink.title"
                               :placeholder="form.resumeLink.placeholder"
                               :required="form.resumeLink.required"></g-g-input>
                    <g-g-textarea :size="'is-12'" v-model="form.comment.value"
                                  :label="form.comment.title"
                                  :placeholder="form.comment.placeholder"
                                  :required="form.comment.required"></g-g-textarea>
                </div>
            </div>
        </div>
        <div class="content w-full" slot="footer">
            <div class="columns is-multiline">
                <div class="column is-12">
                    <button @click="send"
                            class="button is-info is-fullwidth has-text-weight-bold h-3 is-size-875">
                        Откликнуться
                    </button>
                </div>
            </div>
        </div>


    </modal>
</template>

<script>
    import Modal from '../Modal'
    import GGInput from '../form/GGInput'
    import GGTextarea from '../form/GGTextarea'

    export default {
        name: "modalResponceVacancy",
        components: {
            Modal,
            GGTextarea,
            GGInput
        },
        props: {
            value: {default: null},
        },
        data: () => ({
            title: 'Оставить отклик на вакансию',
            form: {
                name: {
                    title: 'Ваше имя',
                    placeholder: 'Введите ваше имя',
                    value: '',
                    required: true
                },
                phone: {
                    title: 'Контактный телефон',
                    placeholder: '+38 (456) 566-09-23',
                    value: '',
                    required: true
                },
                email: {
                    title: 'Контактный email',
                    placeholder: 'Введите ваш email',
                    value: '',
                    required: true
                },
                resumeLink: {
                    title: 'Ссылка на резюме',
                    placeholder: 'Вставте ссылку',
                    value: '',
                    required: true
                },
                comment: {
                    title: 'Комментарий',
                    placeholder: 'Сопроводительный текст',
                    value: '',
                    required: true
                }
            }
        }),
        computed: {
            show: {
                get: function () {
                    return this.value
                },
                set: function (value) {
                    this.$emit('input', value);
                },
            }
        },
        methods: {
            send() {
                console.log('send Response');
            },
        }
    }
</script>

<style scoped>

</style>
