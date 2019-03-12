import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
      lang: document.documentElement.lang,
      user: window.user,
      partner: window.partner,
      languages: ['ru', 'pl', 'en'],
      notifications: window.user && window.user.notifications.length > 0 ? window.user.notifications : []
    },
    mutations: {
      add_notification(state, notification) {
        state.notifications.push(notification)
      }
    },
    actions: { 

    }
  })
