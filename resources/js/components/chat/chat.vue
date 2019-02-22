<template>
    <div class="chat-container">
        <div class="chat-links">
            <a href="" class="chat-links__link" @click.prevent="openNewDialogModal('Написать в тех. поддержку', 'support')">
                <simple-svg class="chat-links__link__icon"
                            :filepath="'/svg/icons/chat/ic_support.svg'"
                            height="16"
                            width="16">
                </simple-svg><span>Написать в тех. поддержку</span>
            </a>
            <a v-if="userCanWriteToBroker()"
               class="chat-links__link" @click.prevent="openNewDialogModal('Написать брокеру', 'broker')">
                <simple-svg class="chat-links__link__icon"
                            :filepath="'/svg/icons/chat/ic_person.svg'"
                            height="16"
                            width="16">
                </simple-svg><span>Написать брокеру</span>
            </a>
        </div>
        <div class="chat">
            <chat-dialogs :dialogs="dialog_list"
                          @search="onDialogsSearch"
                          :selected="dialog_id"
                          @new-message="onNewMessage($event)"
                          @select="getDialog($event)"
                          ></chat-dialogs>
            <transition name="fade" mode="out-in">
                <chat-dialog v-if="dialog"
                             :dialog="dialog"
                             @fresh="getDialog(dialog_id)"
                             :user="user"
                             :key="dialog_id"></chat-dialog>
                <div v-else class="chat__no-dialog">
                    <simple-svg class="chat__no-dialog__icon" :filepath="'/svg/icons/chat/ic_messages.svg'"
                                height="64" width="64">
                    </simple-svg>
                    <div>
                        <a @click.prevent="openNewDialogModal('Написать брокеру', 'broker')"  href="">Напишите брокеру</a>
                        или напишите в
                        <a @click.prevent="openNewDialogModal('Написать в тех. поддержку', 'support')" href="">техническую поддержку</a>
                    </div>
                </div>
            </transition>
        </div>

        <modal v-if="ui.modal.show" @close="ui.modal.show = false">
            <div slot="header"><h3>{{ui.modal.header}}</h3></div>
            <div slot="body">
                <form action="" @submit.prevent="newDialog">
                    <div class="field">
                        <label for="new_dialog_theme" class="label label_req">Тема</label>
                        <input v-model="newDialogModal.theme" id="new_dialog_theme" class="input" name="new_dialog_theme" placeholder="Тема диалога" required>
                    </div>
                    <div class="field">
                        <label for="new_dialog_message" class="label label_req">Сообщение</label>
                        <textarea v-model="newDialogModal.message" id="new_dialog_message" class="textarea" name="new_dialog_message" placeholder="Текст сообщения" required></textarea>
                    </div>
                    <div class="field">
                        <button type="submit" class="button is-link is-fullwidth has-text-weight-bold">Отправить</button>
                    </div>
                </form>
            </div>
        </modal>
        <!-- <p>Роли пользователя: {{ user.roles.join(', ') }}</p> -->
    </div>
</template>

<script>
    import _ from 'lodash'
    import ChatDialogs from './chat-dialogs';
    import ChatDialog from './chat-dialog';
    import { SimpleSVG } from 'vue-simple-svg'
    import Modal from './../Modal' 

    export default {
        name: "chat",
        components: { ChatDialogs, ChatDialog, 'simple-svg': SimpleSVG, Modal },
        props: ['user'],
        data: () => ({
            dialog_id: null,
            dialog: null,
            dialog_list: [],
            search:{
                dialogs: '',
                messages: ''
            },
            users: [],
            online_users: [],
            sound: new Audio('/chat.mp3'),
            newDialogModal: {
                theme: '',
                message: '',
                type: ''
            },
            ui:{
                modal: {
                    show: false,
                    header: ""
                }
            }
        }),
        mounted(){
            this.getDialogs();
            /*
            window.Echo.join('chat.common')
                .here( users => {
                    console.log('asdasd');
                    this.online_users = users.map( item => {
                        return item.id
                    });
                })
                .joining((user) => {
                    this.online_users.push(user.id)
                })
                .leaving((user) => {
                    _.remove(this.online_users, item => {
                        return item === user.id
                    });
                    this.online_users = this.online_users.slice() //хак, массив не обновляется
                })
*/

        },
        beforeDestroy() {
            //window.Echo.leave('chat.common');
        },
        methods: {
            getDialogs(search = null){
                axios.get('/chat/dialogs', { params: { search: search } })
                    .then( res => {
                        this.dialog_list = res.data
                    })
            },
            getDialog(id){
                this.dialog_id = id;
                axios.get(`/chat/dialog/${id}`,
                    { params: { search: this.search.messages} })
                    .then(res => {
                        this.dialog = res.data
                        this.dialog.messages = this.dialog.messages.slice()
                    })
            },
            newDialog(){
                axios.post('/chat/dialog', this.newDialogModal)
                    .then(res=>{
                        console.log(res);
                        this.dialog_list.push(res.data);
                        this.ui.modal.show = false;
                    }).catch(e => {
                        alert(e.response.data.message);
                    })
            },
            openNewDialogModal(header, type){
                this.ui.modal.header = header
                this.ui.modal.show = true
                this.newDialogModal.type = type
            },
            onNewMessage(e){
                //почему то эта фигня не работает, если не выбран диалог
                new Audio('/chat_message_sent.mp3').play();

                if(e.message.dialog_id == this.dialog_id){
                    this.dialog.messages.push(e.message);
                    // this.dialog.messages = this.dialog.messages.slice()
                }else{
                    let dialog =_.find(this.dialog_list, (item) =>{
                        return item.id == e.message.dialog_id
                    })
                    if(dialog)
                        dialog.notifications++;
                }
            },
            onDialogsSearch:  _.debounce(function (search) {
                this.getDialogs(search);
            }, 1000),
            userCanWriteToBroker(){
                return this.user.roles.find( v => ( v == 'Продавец' || v == 'Покупатель' ) )
            }
        }
    }
</script>
