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
              <div class="chat-messages__stack"
                     v-for="stack in messagesMapped"
                     :class="{yours: user.id == stack.user.id}">
                    <div class="chat-messages__user">
                        <img src="/img/avatar-1.png" alt="">
                    </div>
                    <div class="chat-messages__list">
                        <div class="chat-messages__message"
                             v-for="message in stack.messages"
                             :class="{'status-moderating': message.status == 0}">
                            <div class="chat-messages__message__wrap">
                                <span class="chat-messages__message__user">{{user.id == stack.user.id ? 'Вы' : stack.user.full_name}}</span>
                                <span class="chat-messages__message__time">{{getTime(message.created_at)}}</span><br>
                                <div class="chat-messages__message__text">{{message.text}}</div>
                            </div>
                            <div class="chat-messages__message__mode-btns" v-if="message.status == 0">
                                <a href="" class="chat-messages__message__accept" @click.prevent="acceptMessage(message.id)">
                                    <img src="/svg/icons/chat/chat_message_ok.svg" alt="">
                                    Одобрить
                                </a>
                                <a href="" class="chat-messages__message__decline" @click.prevent="deleteMessage(message.id)">
                                    <img src="/svg/icons/chat/chat_message_del.svg" alt="">
                                    Удалить
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
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
                    <img src="/svg/icons/chat/chat_send.svg" alt="">
                </button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "chat-dialog",
        props: ['dialog', 'user'],
        data: () => ({
            ui: {
                showDialogSearch: false
            },
            search: '',
            message: ''
        }),
        mounted(){
            this.scrollToEnd();
        },
        computed: {
            messagesMapped: function () {
                if(this.dialog.messages.length == 0) return [];

                var stack = [];
                var stackEl = {
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
                //if one user
                if(stackEl.messages.length > 0 && stack.length == 0)
                    stack.push(stackEl);

                return stack
            }
        },
        watch: {
            'dialog.messages': function () {
                this.$nextTick(() => {
                    this.scrollToEnd()
                })
            }
        },
        methods: {
            scrollToEnd(){
                let message_list = this.$refs.message_list;
                message_list.scrollTop = message_list.scrollHeight;
            },
            sendMessage(){
                if(this.message == '')
                    return
                axios.post('/chat/message', {
                    message: this.message,
                    dialog_id: this.dialog.id
                }).then(res => {
                        this.message = ''
                       //TODO Добавить сообщение через JS или обновить диалог из базы?
                        this.$emit('fresh');
                        //this.messages.push(res.data)
                }).catch(err => {
                    //TODO эвент для добавления сообщения, которое не отправлено?
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
            deleteMessage(id){
                axios.delete(`/chat/message/${id}`)
                    .then(res => {
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
