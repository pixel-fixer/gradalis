<template>
    <div class="chat-messages__message__status">
        <simple-svg class="icon" :class="{'animation-spin': message.status == 0}"
                    :filepath="statusIcon"
                    width="16"
                    height="16"></simple-svg>
        <span>{{statusLabel}}</span>
    </div>
</template>

<script>
    import {SimpleSVG} from 'vue-simple-svg'

    export default {
        components: { 'simple-svg': SimpleSVG },
        props: ['message'],
        name: "chat-message-status",
        computed: {
            statusLabel: function () {
                switch (this.message.status){
                    case 0:
                        return 'Отправка'
                    case 1:
                        return 'Доставлено'
                    case 2:
                        return 'Прочитано'
                }
            },
            statusIcon: function () {
                const path = '/svg/icons/chat/';
                switch (this.message.status){
                    case 0:
                        return path + 'ic_status_messages_progress.svg'
                    case 1:
                        return  path + 'ic_status_messages_delivered.svg'
                    case 2:
                        return path + 'ic_status_messages_read.svg'
                }
            }
        }
    }
</script>

<style scoped>
    .chat-messages__message__status{
        line-height: 16px;
        font-size: 10px;
        color: #596C80;
        mix-blend-mode: normal;
        opacity: 0.5;
        margin-top: 4px;
    }
    .icon{
        display: inline-block;
        width: 16px;
        height: 16px;
        vertical-align: middle;
        margin-right: 4px;
    }
    .animation-spin{
        animation: spin 2s infinite linear;
    }

    @keyframes spin {
        from {transform:rotate(0deg);}
        to {transform:rotate(360deg);}
    }
</style>