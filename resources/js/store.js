import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
      lang: document.documentElement.lang,
      user: window.user,
      partner: window.partner,
    },
    mutations: {

    },
    actions: {

    }
  })
