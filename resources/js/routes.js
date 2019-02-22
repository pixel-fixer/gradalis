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
        /* Seller */
        {
            path: '/profile/',
            redirect: '/profile/products',
            name: 'profile',
            meta: { breadcrumb: { label: 'Профиль' }}
        },
        {
            path: '/profile/chat', component: require('./components/profile/views/chat').default,
            meta: { breadcrumb: { label: 'Сообщения', parent: 'profile' }},
            children: [
                {
                    path: 'new-dialog/:user_id',
                    component: require('./components/profile/views/chat').default,
                    name: 'new-dialog'
                }
            ]
        },
        {path: '/profile/settings', component: require('./components/profile/views/settings').default},
        {path: '/profile/products', component: require('./components/profile/views/products').default},
        {
            path: '/profile/purchased-services', 
            component: require('./components/profile/views/purchased-services').default,
            name: 'purchased-services',
            meta: { breadcrumb: { parent: 'profile', label: 'Купленные продукты' }}   
        },
        {
            name: 'purchased-service-detail',
            path: '/profile/purchased-services/:id',
            component: require('./components/profile/views/purchased-service').default,
            meta: { breadcrumb: {  parent: 'purchased-services', label: 'Детальная услуга' }},
        },
        {path: '/profile/favorites', component: require('./components/profile/views/favorites').default, meta: {breadcrumb:{parent: 'profile', label: 'Избранное'}} },
        {path: '/profile/legal', component: require('./components/profile/views/legal').default, meta: {breadcrumb:{parent: 'profile', label: 'Условия договора'}} },
        {path: '/profile/balance', component: require('./components/profile/views/balance').default, meta: {breadcrumb:{parent: 'profile', label: 'Баланс'}} },
        {path: '/profile/objects', component: require('./components/profile/views/objects').default, meta: {breadcrumb:{parent: 'profile', label: 'Ваши объекты'}} },
        {path: '/profile/view-requests', component: require('./components/profile/views/view-requests').default, meta: {breadcrumb:{parent: 'profile', label: 'Запросы на просмотр'}}},

        /* Buyer */
        {path: '/profile/trips', component: require('./components/profile/views/trips').default, meta: { breadcrumb: {  parent: 'profile', label: 'Ваши поездки' }}},
        {path: '/profile/trips/:id', component: require('./components/profile/views/trips-detail').default},

        /* Broker */
        {path: '/broker/', redirect: '/broker/summary'},
        {path: '/broker/realtime', component: RealTime},
        {path: '/broker/balance', component: Balance},
        {path: '/broker/leads', component: Leads},
        {path: '/broker/settings', component: Settings},
        {path: '/broker/summary', component: SummaryIndicators},
        {path: '/broker/web-offers', component: WebOffers},
        {path: '/broker/web-offer/:id', component: WebOffer},

        /* 404 */
        //TODO сделать 404 в SPA роутах
        //{ path: "*", beforeEnter: () => { window.location.pathname = '/404'}  }
    ]
})
