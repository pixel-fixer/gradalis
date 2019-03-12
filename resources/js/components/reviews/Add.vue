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
                    <g-g-input :size="'is-6'" v-model="form.company.value"
                               :label="form.company.title"
                               :placeholder="form.company.placeholder"
                               :required="form.company.required"></g-g-input>
                    <g-g-textarea :size="'is-12'" v-model="form.article.value"
                                  :label="form.article.title"
                                  :placeholder="form.article.placeholder"
                                  :required="form.article.required"></g-g-textarea>
                    <div class="column is-12">
                        <FilesUpload ref="filesUpload"></FilesUpload>
                    </div>
                </div>
            </div>
        </div>
        <div class="content w-full" slot="footer">
            <div class="columns is-multiline">
                <div class="column is-12">
                    <button @click="send"
                            class="button is-info is-fullwidth has-text-weight-bold h-3 is-size-875">
                        Оставить отзыв
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
    import FilesUpload from '../FilesUpload'

    export default {
        name: "modalAddReview",
        components: {
            Modal,
            GGTextarea,
            GGInput,
            FilesUpload
        },
        props: {
            value: {default: null},
        },
        data: () => ({
            title: 'Оставить отзыв о нашей работе',
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
                company: {
                    title: 'Название компании',
                    placeholder: 'Введите название',
                    value: '',
                    required: true
                },
                article: {
                    title: 'Опишите ваши впечатления',
                    placeholder: 'Текст вашего отзыва',
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
                let vm = this;
                let form = {
                    'article': vm.form.article.value,
                    'company': vm.form.company.value,
                    'email': vm.form.email.value,
                    'name': vm.form.name.value,
                    'phone': vm.form.phone.value,
                };
                axios.post('/review-add', {
                    review: form,
                    files: vm.$refs['filesUpload'].getAllFiles()
                }).then(response => {
                    vm.show = false;
                    if (response.data.status === 'ok') {
                        this.$swal({ type: 'success', text: 'Отзыв добавлен!' });
                    } else {
                        this.$swal({ type: 'error', text: 'Кажется дроиды что-то напутали, попробуйте позже.' });
                    }
                });
            },
        }
    }
</script>

<style scoped>

</style>
