import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

const RealTime = () => import('./components/broker/views/RealTime');
const Balance = () => import('./components/broker/views/Balance');
const Leads = () => import('./components/broker/views/Leads');
const Settings = () => import('./components/broker/views/Settings');
const SummaryIndicators = () => import('./components/broker/views/SummaryIndicators');
const WebOffers = () => import('./components/broker/views/WebOffers');
const WebOffer = () => import('./components/broker/views/WebOffer');


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
        {path: '/broker/', redirect: '/broker/summary'},
        {path: '/broker/realtime', component: RealTime},
        {path: '/broker/balance', component: Balance},
        {path: '/broker/leads', component: Leads},
        {path: '/broker/settings', component: Settings},
        {path: '/broker/summary', component: SummaryIndicators},
        {path: '/broker/web-offers', component: WebOffers},
        {path: '/broker/web-offer/:id', component: WebOffer},
    ]
})
