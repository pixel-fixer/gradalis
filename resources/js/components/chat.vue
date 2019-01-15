<template>
    <div class="chat">
        <div class="chat__list">
             <div class="chat__list__search">
                 <img src="/svg/icons/chat/chat_search.svg" alt="">
                 <input type="text" placeholder="Поиск чатов">
             </div>
            <div class="chat__list__items">
                <div class="chat__list__item chat-type--support">
                    <div class="chat__list__item__theme">Системное сообщение</div>
                    <div class="chat__list__item__from">От: Служба поддержки</div>
                </div>
                <div class="chat__list__item chat-type--seller new-message">
                    <div class="chat__list__item__theme">Продажа отеля на берегу Северного моря</div>
                    <div class="chat__list__item__from">От: Дмитрий</div>
                </div>
                <div class="chat__list__item chat-type--customer">
                    <div class="chat__list__item__theme">Продажа отеля на берегу Северного моря</div>
                    <div class="chat__list__item__from">От: Zedech</div>
                </div>
            </div>
            <div class="flex-push"></div>
            <div class="chat__list__settings" ref="chat_list_settings">
                <a href="" @click.prevent="ui.showSettings = !ui.showSettings" :class="{active: ui.showSettings}">
                    <img src="/svg/icons/chat/ic_settings.svg" alt="">Настройки чата
                </a>
                <transition name="fade">
                    <div class="chat__list__settings__menu" v-if="ui.showSettings">
                        <label>
                            <input type="checkbox" v-model="dialogs.filter" value="seller">
                            <span class="color-seller">Покупатели</span>
                        </label>
                        <label>
                            <input type="checkbox" v-model="dialogs.filter" value="buyer">
                            <span class="color-buyer">Продавцы</span>
                        </label>
                        <label>
                            <input type="checkbox" v-model="dialogs.filter" value="support">
                            <span class="color-support">Служба поддержки</span>
                        </label>
                    </div>
                </transition>
            </div>
        </div>
        <div class="chat__dialog">
            <div class="chat__dialog__top" ref="dialogTop">
                <transition name="slide-fade"
                            mode="out-in"
                            tag="div"
                            v-on:after-enter="afterDialogSearchTransition">
                    <div key="1"
                         v-if="!ui.showDialogSearch"
                         class="flex flex-between flex-center">
                        <div class="chat__dialog__top__theme">Оплата услуги "<a href="">Мастер подбора бизнеса</a>"</div>
                        <div class="chat__dialog__search-btn" @click="ui.showDialogSearch = true">
                            <img src="/svg/icons/chat/chat_search.svg" alt="">
                        </div>
                    </div>
                    <div v-else key="2"
                         class="chat__dialog__search">
                        <img src="/svg/icons/chat/chat_search.svg" alt="">
                        <input type="text">
                    </div>
                </transition>
            </div>
            <div class="chat-messages">
                <div class="chat-messages__stack">
                    <div class="chat-messages__user">
                        <img src="/img/avatar-1.png" alt="">
                    </div>
                    <div class="chat-messages__list">
                        <div class="chat-messages__message status-moderating">
                            <div class="chat-messages__message__wrap">
                                <span class="chat-messages__message__user">jojo</span>
                                <span class="chat-messages__message__time">17:39</span><br>
                                <div class="chat-messages__message__text">Добрый день! Получил вашу оплату</div>
                            </div>
                            <div class="chat-messages__message__mode-btns">
                                <a href="" class="chat-messages__message__accept">
                                    <img src="/svg/icons/chat/chat_message_ok.svg" alt="">
                                    Одобрить
                                </a>
                                <a href="" class="chat-messages__message__decline">
                                    <img src="/svg/icons/chat/chat_message_del.svg" alt="">
                                    Удалить
                                </a>
                            </div>
                        </div>
                        <div class="chat-messages__message">
                            <div class="chat-messages__message__wrap">
                                <span class="chat-messages__message__user">jojo</span>
                                <span class="chat-messages__message__time">17:39</span><br>
                                <div class="chat-messages__message__text">Все супер! Спасибо, что оплатили наш продукт!</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chat-messages__stack">
                    <div class="chat-messages__user">
                        <img src="/img/avatar-1.png" alt="">
                    </div>
                    <div class="chat-messages__list">
                        <div class="chat-messages__message">
                            <div class="chat-messages__message__wrap">
                                <span class="chat-messages__message__user">jojo</span>
                                <span class="chat-messages__message__time">17:39</span><br>
                                <div class="chat-messages__message__text">Добрый день! Получил вашу оплату</div>
                            </div>
                        </div>
                        <div class="chat-messages__message">
                            <div class="chat-messages__message__wrap">
                                <span class="chat-messages__message__user">jojo</span>
                                <span class="chat-messages__message__time">17:39</span><br>
                                <div class="chat-messages__message__text">Все супер! Спасибо, что оплатили наш продукт!</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chat-messages__stack yours">
                    <div class="chat-messages__user">
                        <img src="/img/avatar-1.png" alt="">
                    </div>
                    <div class="chat-messages__list">
                        <div class="chat-messages__message">
                            <div class="chat-messages__message__wrap">
                                <span class="chat-messages__message__user">Вы</span>
                                <span class="chat-messages__message__time">17:39</span><br>
                                <div class="chat-messages__message__text">Добрый день! Получил вашу оплату</div>
                            </div>
                        </div>
                        <div class="chat-messages__message">
                            <div class="chat-messages__message__wrap">
                                <span class="chat-messages__message__user">Вы</span>
                                <span class="chat-messages__message__time">17:39</span><br>
                                <div class="chat-messages__message__text">Все супер! Спасибо, что оплатили наш продукт!</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="chat__dialog__new-message">
                <form action="">
                    <a href="" class="chat__dialog__new-message__attach">
                        <img src="/svg/icons/chat/chat_attach.svg" alt="">
                    </a>
                    <input type="text" placeholder="Начните вводить сообщение">
                    <button type="submit">
                        <img src="/svg/icons/chat/chat_send.svg" alt="">
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>

    //import ChatSettingsIcon from '../../../public/svg/icons/chat/ic_settings.svg';

    export default {
        name: "chat",
        data: () => ({
            ui: {
                showSettings: false,
                showDialogSearch: false
            },
            dialog:{
                id: null,
                messages: [],
                message: "",
            },
            dialogs: {
                filter: ['seller', 'buyer', 'support'],
                list: []
            },
            search:{
                dialogs: '',
                messages: ''
            },
            user: null,
            users: [],
            online_users: []
        }),
        mounted(){
            this.$refs.chat_list_settings.addEventListener('mouseleave', () => {
               setTimeout(()=>{
                   this.ui.showSettings = false;
               }, 1000)
            });

        },
        methods: {
            afterDialogSearchTransition(el){
                if(el.querySelector('input'))
                    el.querySelector('input').focus();
            }
        }
    }
</script>

<style>

</style>