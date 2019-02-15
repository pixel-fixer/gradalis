<template>
    <div class="chat__list">
        <div class="chat__list__search">
            <img src="/svg/icons/chat/chat_search.svg" alt="">
            <input v-model="search" @input="$emit('search', search)" type="text" placeholder="Поиск чатов">
        </div>
        <transition-group v-if="dialogsMapped.length > 0"
                          tag="div"
                          class="chat__list__items"
                          name="fade">
            <div v-for="dialog in dialogsMapped"
                 @click="$emit('select', dialog.id)"
                 :class="['chat-type--' + dialog.type, { 'active' : dialog.id === selected  }, {'new-message': dialog.notifications > 0}]"
                 class="chat__list__item"
                 :key="dialog.id">
                <div class="chat__list__item__theme">{{ dialog.theme | stripTags }}</div>
                <!-- <div class="chat__list__item__from" v-if="dialog.type == 'support'">Cлужба поддержки</div> -->
                <div class="chat__list__item__from">
                    <img v-if="dialog.user.avatar" :src="dialog.user.avatar" class="chat__list__item__from__avatar">
                    {{dialog.user.full_name}}
                </div>
            </div>
        </transition-group>
        <div v-else-if="search">Диалогов не найдено</div>
        <div v-else-if="!firstLoad">Диалогов нет</div>
        <div class="flex-push"></div>
        <div class="chat__list__settings" ref="chat_list_settings">
            <a href="" @click.prevent="ui.showSettings = !ui.showSettings" :class="{active: ui.showSettings}">
                <img src="/svg/icons/chat/ic_settings.svg" alt="">Настройки чата
            </a>
            <transition name="fade">
                <div class="chat__list__settings__menu" v-if="ui.showSettings">
                    <label>
                        <input type="checkbox" v-model="filter" value="seller">
                        <span class="color-seller">Покупатели</span>
                    </label>
                    <label>
                        <input type="checkbox" v-model="filter" value="buyer">
                        <span class="color-buyer">Продавцы</span>
                    </label>
                    <label>
                        <input type="checkbox" v-model="filter" value="support">
                        <span class="color-support">Служба поддержки</span>
                    </label>
                </div>
            </transition>
        </div>
    </div>
</template>
<script>
    import stripTags from '../../stripTags'

    export default {
        name: "chat-dialogs",
        filters: { stripTags },
        props: ['dialogs', 'selected'],
        data: () => ({
            firstLoad: true,
            ui: {
                showSettings: false
            },
            search: '',
            filter: ['seller', 'buyer', 'support'],

        }),
        computed: {
            dialogsMapped: function () {
                return this.dialogs.map( dialog => {
                    return dialog;
                }).filter( dialog => {
                    return this.filter.includes(dialog.type)
                })
            }
        },
        mounted(){
            this.$refs.chat_list_settings.addEventListener('mouseleave', () => {
                setTimeout(()=>{
                    this.ui.showSettings = false;
                }, 1000)
            });
        },
        watch: {
            dialogs: function () {
                this.socketConnect()
            }
        },
        methods:{
            socketConnect(){
                for(let dialog of this.dialogs){
                    window.Echo
                        .private('Chat.Dialog.' + dialog.id)
                        .listen('NewMessage',  (e) => {
                            this.$emit('new-message', e)
                        })
                }
            },
        }
    }
</script>