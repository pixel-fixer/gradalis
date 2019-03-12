<template>
    <transition name="slide-fade" appear>
        <div class="chat-widget" v-show="ui.show">
            <div class="chat-widget__header" @click="(ui.expanded = !ui.expanded)" :class="{'is-expanded': ui.expanded}">                 
                <img src="/svg/icons/ic_messages.svg" class="svg" alt="Messages">
                <span class="aside-nav__item__title has-text-weight-bold">Сообщения</span>
                <!-- <span class="chat-widget__header__count tag is-danger is-rounded tag__count is-flex">12</span>           -->
            </div>
            <transition name="fade">
                <chat v-show="ui.expanded"
                :user="$store.state.user"
                :is-widget="true"></chat>
            </transition>
        </div>
    </transition>
</template>

<script>
import Chat from './chat'

export default {
    componenets: { Chat },
    data: () => ({
        ui: {
            show: false,
            expanded: false
        }
    }),
    mounted(){
        setTimeout(() => {
            this.ui.show = true;
        }, 1000)        
    }
}
</script>

<style>
.slide-fade-enter-active {
  transition: all .3s ease;
}
.slide-fade-leave-active {
  transition: all .3s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to{
  transform: translateY(100%);
}
</style>
