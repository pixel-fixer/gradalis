<template>
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
                    <a href="">Напишите брокеру</a> или напишите в <a href="">техническую поддержку</a>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
    import _ from 'lodash'
    import ChatDialogs from './chat-dialogs';
    import ChatDialog from './chat-dialog';
    import { SimpleSVG } from 'vue-simple-svg'

    export default {
        name: "chat",
        components: { ChatDialogs, ChatDialog, 'simple-svg': SimpleSVG },
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
            sound: new Audio('/chat.mp3')
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
            onNewMessage(e){
                //почему то эта фигня не работает, если не выбран диалог
                let dasfdsf = new Audio('/chat.mp3')
                dasfdsf.play();

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
            }, 1000)
        }
    }
</script>
