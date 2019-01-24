<template>
    <div class="chat__dialog">
        <div class="chat__dialog__top" ref="dialogTop">
            <transition name="slide-fade"
                        mode="out-in"
                        tag="div"
                        v-on:after-enter="afterDialogSearchTransition">
                <div key="1"
                     v-if="!ui.showDialogSearch"
                     class="flex flex-between flex-center">
                    <div class="chat__dialog__top__theme" v-html="dialog.theme"></div>
                    <div class="chat__dialog__search-btn" @click="ui.showDialogSearch = true">
                        <img src="/svg/icons/chat/chat_search.svg" alt="">
                    </div>
                </div>
                <div v-else key="2"
                     class="chat__dialog__search">
                    <img src="/svg/icons/chat/chat_search.svg" alt="">
                    <input type="text">
                    <button @click="ui.showDialogSearch = false">X</button>
                </div>
            </transition>
        </div>
        <div class="chat-messages" v-if="messagesMapped.length > 0" v-bar>
            <div class="chat-messages__scroll" ref="message_list">

                <!--<div class="chat-messages__wrap">-->

              <div class="chat-messages__stack"
                     v-for="stack in messagesMapped"
                     :class="{yours: user.id == stack.user.id}">
                    <div class="chat-messages__user">
                        <img src="/img/avatar-1.png" alt="">
                    </div>
                    <div class="chat-messages__list">
                        <div class="chat-messages__message"
                             v-for="message in stack.messages"
                             :class="{'status-moderating': message.status == 0 && user.canModerateMessages}">
                            <div class="chat-messages__message__wrap">
                                <span class="chat-messages__message__user">{{user.id == stack.user.id ? 'Вы' : stack.user.full_name}}</span>
                                <span class="chat-messages__message__time">{{getTime(message.created_at)}}</span><br>
                                <div class="chat-messages__message__text">{{message.text}}</div>
                            </div>
                            <chat-message-status
                                    :message="message"
                                    v-if="user.id === stack.user.id"></chat-message-status>
                            <div class="chat-messages__message__mode-btns" v-if="user.canModerateMessages && message.status == 0">
                                <a href="" class="chat-messages__message__accept" @click.prevent="acceptMessage(message.id)">
                                    <img src="/svg/icons/chat/chat_message_ok.svg" alt="">
                                    Одобрить
                                </a>
                                <a href="" class="chat-messages__message__decline" @click.prevent="ui.showDeleteReasonModal = true;delete_message.id = message.id">
                                    <img src="/svg/icons/chat/chat_message_del.svg" alt="">
                                    Удалить
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!--</div>-->

            </div>
        </div>
        <div v-else style="text-align: center;flex: 1 1 0%;  color: #4857CE;  font-size: 17px;  align-items: center;  display: flex; justify-content: center;">Сообщений нет</div>
        <div class="chat__dialog__new-message">
            <form action="" @submit.prevent="sendMessage">
                <a href="" class="chat__dialog__new-message__attach">
                    <img src="/svg/icons/chat/chat_attach.svg" alt="">
                </a>
                <input v-model="message" type="text" placeholder="Начните вводить сообщение">
                <button type="submit">
                    <simple-svg class="icon-send"
                            :filepath="'/svg/icons/chat/chat_send.svg'"
                            height="24" width="24">
                    </simple-svg>
                </button>
            </form>
        </div>
        <modal v-if="ui.showDeleteReasonModal" @close="ui.showDeleteReasonModal = false">
            <div slot="header"><h3>Причина удаления сообщения</h3></div>
            <div slot="body">
                <form action="" @submit.prevent="deleteMessage">
                    <div class="field">
                        <label for="delete_reason" class="label label_req">Укажите причину</label>
                        <textarea v-model="delete_message.reason" id="delete_reason" class="textarea" name="delete_reason" placeholder="Текст причины отказа" required></textarea>
                    </div>
                    <div class="field">
                        <button type="submit" class="button is-link is-fullwidth has-text-weight-bold">Подтвердить</button>
                    </div>
                </form>
            </div>
        </modal>
    </div>
</template>

<script>
    import {SimpleSVG} from 'vue-simple-svg'
    import Velocity from 'velocity-animate'
    import Modal from './modal';
    import ChatMessageStatus from './chat-message-status'

    export default {
        name: "chat-dialog",
        components: { 'simple-svg': SimpleSVG, Modal, ChatMessageStatus },
        props: ['dialog', 'user'],
        data: () => ({
            ui: {
                showDialogSearch: false,
                showDeleteReasonModal: false
            },
            search: '',
            message: '',
            delete_message: {
                id: null,
                reason: ''
            }
        }),
        mounted(){
            this.scrollToEnd();
        },
        computed: {
            messagesMapped: function () {
                if(this.dialog.messages.length == 0) return [];

                let stack = [];
                let stackEl = {
                    user: this.dialog.messages[0].from,
                    messages: []
                }

                for(let message of this.dialog.messages){
                    if(message.from.id == stackEl.user.id){
                        stackEl.messages.push(message)
                    }else{
                        stack.push(stackEl);
                        stackEl = {
                            user: message.from,
                            messages: []
                        }
                        stackEl.messages.push(message);
                    }
                }
                stack.push(stackEl);

                return stack
            }
        },
        watch: {
            // 'dialog.messages': function () {
            //         this.scrollToEnd()
            // }
        },
        methods: {
            scrollToEnd(animate = false){
                this.$nextTick(() => {
                    let message_list = this.$refs.message_list;
                    if(typeof message_list != 'undefined'){
                        // if(animate) {
                        //     console.dir(Velocity);
                        //     Velocity(message_list, 'scroll', { duration: 400 })
                        // }else{
                            message_list.scrollTop = message_list.scrollHeight;
                        // }

                    }
                })
            },
            sendMessage(){
                if(this.message === '')
                    return
                axios.post('/chat/message', {
                        message: this.message,
                        dialog_id: this.dialog.id
                    })
                    .then(res => {
                            this.message = ''
                           //TODO Добавить сообщение через JS или обновить диалог из базы?
                            this.$emit('fresh')
                            setTimeout(()=>{
                                this.scrollToEnd(true)
                            }, 500) //TODO похоже на костыль
                            //this.messages.push(res.data)
                    }).catch(err => {
                        //TODO Добавлять сообщения, которое не отправлено, или показывать тост с ошибкой?
                    })
            },
            acceptMessage(id){
                axios.patch(`/chat/message/${id}/accept`)
                    .then(res => {
                        this.$emit('fresh');
                    })
                    .catch(err => {
                        console.log(err.data)
                    })
            },
            deleteMessage(){
                axios.delete(`/chat/message/${this.delete_message.id}`, {
                        params: { delete_reason: this.delete_message.reason }
                    })
                    .then(res => {
                        this.ui.showDeleteReasonModal = false
                        this.delete_message.reason = ''
                        this.$emit('fresh');
                    })
                    .catch(err => {
                        console.log(err.data)
                    })
            },
            afterDialogSearchTransition(el){
                if(el.querySelector('input'))
                    el.querySelector('input').focus();
            },
            getTime(mySQLDate){
                var monthNames = [
                    'Январь',
                    'Февраль',
                    'Март',
                    'Апрель',
                    'Май',
                    'Июнь',
                    'Июль',
                    'Август',
                    'Сентябрь',
                    'Ноябрь',
                    'Декабрь',
                ];

                var date =  new Date(Date.parse(mySQLDate.replace('-','/','g')));
                return date.getHours() + ':' + date.getMinutes()
            }
        }
    }
</script>

<style>
    .vb > .vb-dragger {
        z-index: 5;
        width: 12px;
        right: 0;
    }
    .chat-stack__date{
        color: hsla(220,8%,51%,.6);
    }
    .vb > .vb-dragger > .vb-dragger-styler {
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        -webkit-transform: rotate3d(0,0,0,0);
        transform: rotate3d(0,0,0,0);
        -webkit-transition:
                background-color 100ms ease-out,
                margin 100ms ease-out,
                height 100ms ease-out;
        transition:
                background-color 100ms ease-out,
                margin 100ms ease-out,
                height 100ms ease-out;
        background-color: rgba(48, 121, 244,.1);
        margin: 5px 5px 5px 0;
        border-radius: 20px;
        height: calc(100% - 10px);
        display: block;
    }

    .vb.vb-scrolling-phantom > .vb-dragger > .vb-dragger-styler {
        background-color: rgba(48, 121, 244,.3);
    }

    .vb > .vb-dragger:hover > .vb-dragger-styler {
        background-color: rgba(48, 121, 244,.5);
        margin: 0px;
        height: 100%;
    }

    .vb.vb-dragging > .vb-dragger > .vb-dragger-styler {
        background-color: rgba(48, 121, 244,.5);
        margin: 0px;
        height: 100%;
    }

    .vb.vb-dragging-phantom > .vb-dragger > .vb-dragger-styler {
        background-color: rgba(48, 121, 244,.5);
    }
</style>
