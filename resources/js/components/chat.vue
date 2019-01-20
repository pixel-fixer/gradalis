<template>
    <div class="chat">
        <chat-dialogs :dialogs="dialogs_list"
                      @search="onDialogsSearch"
                      :selected="dialog_id"
                      @select="getDialog($event)"
                      ></chat-dialogs>
        <transition name="fade" mode="out-in">
            <chat-dialog v-if="dialog"
                         :dialog="dialog"
                         @fresh="getDialog(dialog_id)"
                         :user="user"
                         :key="dialog_id"></chat-dialog>
            <div v-else class="chat__no-dialog">Выберите диалог</div>
        </transition>
    </div>
</template>

<script>
    import _ from 'lodash'
    import ChatDialogs from './chat-dialogs';
    import ChatDialog from './chat-dialog';

    export default {
        name: "chat",
        components: { ChatDialogs, ChatDialog },
        props: ['user'],
        data: () => ({
            dialog_id: null,
            dialog: null,
            dialogs_list: [],
            search:{
                dialogs: '',
                messages: ''
            },
            users: [],
            online_users: []
        }),
        mounted(){
            this.getDialogs()
        },
        methods: {
            getDialogs(search = null){
                axios.get('/chat/dialogs', { params: { search: search } }).then( res => { this.dialogs_list = res.data } )
            },
            getDialog(id){
                this.dialog_id = id;
                axios.get(`/chat/dialog/${id}`,
                    { params: { search: this.search.messages} })
                    .then(res => {
                        this.dialog = res.data
                    })
            },
            onDialogsSearch:  _.debounce(function (search) {
                this.getDialogs(search);
            }, 1000)
        }
    }
</script>

<style>

</style>