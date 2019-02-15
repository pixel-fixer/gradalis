import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
    mode: 'history',
    scrollBehavior: () => ({y: 0}),
    routes: [
        {path: '/profile/', redirect: '/profile/products'},
        {path: '/profile/chat', component: require('./components/profile/views/chat').default},
        {path: '/profile/settings', component: require('./components/profile/views/settings').default},
        {path: '/profile/products', component: require('./components/profile/views/products').default},
        {
            path: '/profile/purchased-services',
            component: require('./components/profile/views/purchased-services').default
        },
        {path: '/profile/favorites', component: require('./components/profile/views/favorites').default},
        {path: '/profile/legal', component: require('./components/profile/views/legal').default},
        {path: '/profile/balance', component: require('./components/profile/views/balance').default},
        {path: '/profile/objects', component: require('./components/profile/views/objects').default},
        {path: '/profile/view-requests', component: require('./components/profile/views/view-requests').default},

        /* Buyer */
        {path: '/profile/trips', component: require('./components/profile/views/trips').default},
        {path: '/profile/trips-single', component: require('./components/profile/views/tripsDetails').default},

        /* Broker */
        {path: '/broker/', redirect: '/broker/realtime'},
        {path: '/broker/realtime', component: require('./components/broker/views/RealTime').default},
        {path: '/broker/balance', component: require('./components/broker/views/Balance').default},
        {path: '/broker/leads', component: require('./components/broker/views/Leads').default},
        {path: '/broker/settings', component: require('./components/broker/views/Settings').default},
        {path: '/broker/summary', component: require('./components/broker/views/SummaryIndicators').default},
        {path: '/broker/web-offers', component: require('./components/broker/views/WebOffers').default},
    ]
})
