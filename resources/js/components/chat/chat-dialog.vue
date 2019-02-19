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
                     v-for="(stack, i) in messagesMapped"
                     :class="{yours: user.id == stack.user.id}"
                     :key="i">
                    <div class="chat-messages__user">
                        <img src="/img/avatar-1.png" alt="">
                    </div>
                    <div class="chat-messages__list">
                        <div class="chat-messages__message"
                             v-for="message in stack.messages"
                             :class="{'status-moderating': message.status == 0 && user.canModerateMessages}"
                             :key="message.id">
                            <div class="chat-messages__message__wrap">
                                <span class="chat-messages__message__user">{{user.id == stack.user.id ? 'Вы' : stack.user.full_name}}</span>
                                <span class="chat-messages__message__time">{{getTime(message.created_at)}}</span><br>
                                <div v-for="video in getYouTubeVideos(message.text)" v-html="video"></div>
                                <div class="chat-messages__message__text">{{message.text}}</div>
                                <div class="chat-messages__message__files">
                                    <a :href="file.url.origin"
                                       v-for="file in message.media_links"
                                       target="_blank">
                                        <img v-if="file.mime_type.indexOf('image') >= 0" :src="file.url.thumb" alt="">
                                        <span v-else>{{file.file_name}}</span>
                                    </a>
                                </div>
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
                <chat-preloader v-if="isSendingMessage"></chat-preloader>

                <!--</div>-->

            </div>
        </div>
        <div v-else style="text-align: center;flex: 1 1 0%;  color: #4857CE;  font-size: 17px;  align-items: center;  display: flex; justify-content: center;">Сообщений нет</div>
        <div class="chat__dialog__new-message">
            <div v-if="attachment.base64" class="chat__dialog__new-message__files">
                <img v-if="ifFileIsImage(attachment.mime)" :src="attachment.base64">
                <div>{{uploadedFileName}}</div>
                <button @click="clearFile">удалить</button>
            </div>
            <form action="" @submit.prevent="sendMessage">
                <label for="chat_file_attachment" class="chat__dialog__new-message__attach">
                    <img src="/svg/icons/chat/chat_attach.svg" alt="">
                    <input id="chat_file_attachment" type="file" ref="file" @change="handleFileUpload">
                </label>
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
    import Modal from './../Modal';
    import ChatMessageStatus from './chat-message-status'
    import ChatPreloader from './chat-preloader'

    export default {
        name: "chat-dialog",
        components: { 'simple-svg': SimpleSVG, Modal, ChatMessageStatus, ChatPreloader },
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
            },
            isSendingMessage: false,
            attachment: {
                file: null,
                status: null,
                base64: null
            }
        }),
        mounted(){
            this.scrollToEnd(true);
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
                    this.getYouTubeVideos(message.text);
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
            },
            uploadedFileName(){
                return this.attachment.file ? this.$refs.file.value.split(/(\\|\/)/g).pop() : false
            }
        },
        watch: {
            // 'dialog.messages': function () {
            //         this.scrollToEnd()
            // }
        },
        methods: {
            scrollToEnd(initial = false){
                this.$nextTick(() => {

                    let message_list = this.$refs.message_list;

                    if(typeof message_list != 'undefined'){
                        //TODO Добавить опцию анимации?

                        //Ждем загрузки всех картинок, если диалог только открылся
                        if(initial) {
                            let images = message_list.querySelectorAll('img');
                            let counter = 0;
                            images.forEach((image) => {
                                image.addEventListener('load', () => {
                                    counter++
                                    if (images.length === counter)
                                        message_list.scrollTop = message_list.scrollHeight;
                                })
                            })
                        }else{
                            message_list.scrollTop = message_list.scrollHeight;
                        }
                    }
                })
            },
            sendMessage(){
                if(this.message === '' && !this.attachment.file)
                    return

                this.isSendingMessage = true;
                this.scrollToEnd()

                let formData = new FormData()

                formData.append('text', this.message);
                formData.append('dialog_id', this.dialog.id);

                if(this.attachment.file)
                    formData.append('file', this.attachment.file)

                axios.post('/chat/message',
                    formData,
                    {
                        headers: { 'Content-Type': 'multipart/form-data' }
                    })
                    .then(res => {
                            this.message = ''
                            this.isSendingMessage = false;

                           //TODO Добавить сообщение через JS или обновить диалог из базы?
                            this.$emit('fresh')
                            this.clearFile()

                            setTimeout(()=>{
                                this.scrollToEnd()
                            }, 700) //TODO похоже на костыль

                             new Audio('/chat_message_sent.mp3').play()
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
            },
            handleFileUpload(){
                this.attachment.file = this.$refs.file.files[0]
                this.getFile(this.attachment.file)
            },
            getFile(file) {
                return new Promise((resolve, reject) => {
                    const fReader = new FileReader();
                    const img = document.createElement('img');

                    fReader.onload = () => {
                        file = fReader.result;
                        console.log(file);
                        //Определить mime
                        this.attachment.mime = this.getFileMimeType(fReader.result)
                        this.attachment.base64 = fReader.result
                        resolve();
                    }

                    fReader.readAsDataURL(file);
                })
            },
            getFileMimeType(base64){
                return base64.substring("data:".length, base64.indexOf(";base64"))
            },
            canAcceptFile(){

            },
            ifFileIsImage(mime){
                return mime.indexOf('image') >= 0 ? true : false
            },
            clearFile(){
                this.attachment.base64 = null
                this.attachment.file = null
                this.$refs.file.value = ''
            },
            getYouTubeVideos(message){
                let parsedVideos = [];
                let links = message.match(/(www)?\.youtube\.com(\S+)\s?/gi) //TODO доработать парсинг для разных случаев как тут? https://gist.github.com/takien/4077195 
                if(links){
                    for(let link of links){
                        parsedVideos.push(`<iframe width="100%" height="200" src="https://www.youtube.com/embed/${this.getYouTubeID(link)}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`)
                    }
                }
                return parsedVideos;
            },
            getYouTubeID(url){
                var ID = '';
                url = url.replace(/(>|<)/gi,'').split(/(vi\/|v=|\/v\/|youtu\.be\/|\/embed\/)/);
                if(url[2] !== undefined) {
                    ID = url[2].split(/[^0-9a-z_\-]/i);
                    ID = ID[0];
                }
                else {
                    ID = url;
                }
                return ID;
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
