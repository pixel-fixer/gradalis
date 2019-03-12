<template>
    <a href="" class="link-with-icon mr-1" @click.prevent="openNewDialogModal('Сообщение', 'message')">
        <img src="/svg/icons/ic_messages.svg">
        <span class="has-text-decoration-underline">{{title}}</span>
        <portal to="modals">
            <modal v-if="ui.modal.show" @close="ui.modal.show = false">
                <div slot="header"><h3>{{ui.modal.header}}</h3></div>
                <div slot="body">
                    <form action="" @submit.prevent="newDialog">
                        <div class="field">
                            <label for="new_dialog_theme" class="label label_req">Тема</label>
                            <input v-model="newDialogModal.theme" id="new_dialog_theme" class="input"
                                   name="new_dialog_theme" placeholder="Тема диалога" required>
                        </div>
                        <div class="field">
                            <label for="new_dialog_message" class="label label_req">Сообщение</label>
                            <textarea v-model="newDialogModal.message" id="new_dialog_message" class="textarea"
                                      name="new_dialog_message" placeholder="Текст сообщения" required></textarea>
                        </div>
                        <div class="field">
                            <button type="submit" class="button is-link is-fullwidth has-text-weight-bold">Отправить
                            </button>
                        </div>
                    </form>
                </div>
            </modal>
        </portal>
    </a>
</template>

<script>
    import Modal from './../Modal'

    export default {
        name: "MessageModal",
        components: {Modal},
        props: {
            title: {default: trans('account.message')}
        },
        data() {
            return {
                newDialogModal: {
                    theme: '',
                    message: '',
                    type: ''
                },
                ui: {
                    modal: {
                        show: false,
                        header: ""
                    }
                }
            }
        },
        methods: {
            openNewDialogModal(header, type) {
                this.ui.modal.header = header
                this.ui.modal.show = true
                this.newDialogModal.type = type
            },
            newDialog() {
                axios.post('/chat/dialog', this.newDialogModal)
                    .then(res => {
                        console.log(res);
                        //this.dialog_list.push(res.data);
                        this.ui.modal.show = false;
                    }).catch(e => {
                    alert(e.response.data.message);
                })
            },
        }
    }
</script>

<style scoped>

</style>
