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
const BrokerChat = () => import('./components/broker/views/Chat');

const AccountPartners = () => import('./components/account/views/Partners');
const AccountPartnersFuture = () => import('./components/account/views/FuturePartners');
const AccountPartnerSettings = () => import('./components/account/views/SettingsPartner');

export default new Router({
    mode: 'history',
    scrollBehavior: () => ({y: 0}),
    routes: [
        /* Seller */
        {
            path: '/profile/',
            redirect: '/profile/products',
            name: 'profile',
            meta: {breadcrumb: {label: 'Профиль'}}
        },
        {
            path: '/profile/chat', component: require('./components/profile/views/chat').default,
            meta: {breadcrumb: {label: 'Сообщения', parent: 'profile'}},
            children: [
                {
                    path: 'new-dialog/:user_id',
                    component: require('./components/profile/views/chat').default,
                    name: 'new-dialog'
                }
            ]
        },
        {
            path: '/profile/settings',
            component: require('./components/profile/views/settings').default,
            meta: {breadcrumb: {parent: 'profile', label: 'Настройки'}}
        },
        {
            path: '/profile/products',
            component: require('./components/profile/views/products').default,
            meta: {breadcrumb: {parent: 'profile', label: 'Продукты'}}
        },
        {
            path: '/profile/purchased-services',
            component: require('./components/profile/views/purchased-services').default,
            name: 'purchased-services',
            meta: {breadcrumb: {parent: 'profile', label: 'Купленные продукты'}}
        },
        {
            name: 'purchased-service-detail',
            path: '/profile/purchased-services/:id',
            component: require('./components/profile/views/purchased-service').default,
            meta: {breadcrumb: {parent: 'purchased-services', label: 'Детальная услуга'}},
        },
        {
            path: '/profile/favorites',
            component: require('./components/profile/views/favorites').default,
            meta: {breadcrumb: {parent: 'profile', label: 'Избранное'}}
        },
        {
            path: '/profile/legal',
            component: require('./components/profile/views/legal').default,
            meta: {breadcrumb: {parent: 'profile', label: 'Условия договора'}}
        },
        {
            path: '/profile/balance',
            component: require('./components/profile/views/balance').default,
            meta: {breadcrumb: {parent: 'profile', label: 'Баланс'}}
        },
        {
            path: '/profile/objects',
            component: require('./components/profile/views/objects').default,
            meta: {breadcrumb: {parent: 'profile', label: 'Ваши объекты'}}
        },
        {
            path: '/profile/object-requests/:type',
            component: require('./components/profile/views/object-requests').default,
            meta: {breadcrumb: {parent: 'profile', label: 'Запросы'}}
        },

        /* Buyer */
        {
            path: '/profile/trips',
            component: require('./components/profile/views/trips').default,
            meta: {breadcrumb: {parent: 'profile', label: 'Ваши поездки'}}
        },
        {path: '/profile/trips/:id', component: require('./components/profile/views/trips-detail').default},

        /* Broker */
        {path: '/broker/', redirect: '/broker/summary'},
        {path: '/broker/realtime', component: RealTime},
        {path: '/broker/balance', component: Balance},
        {path: '/broker/leads', component: Leads},
        {
            path: '/broker/chat', component: BrokerChat,
            meta: {breadcrumb: {label: 'Сообщения', parent: 'broker'}},
            children: [
                {
                    path: 'new-dialog/:user_id',
                    component: BrokerChat,
                    name: 'broker/new-dialog'
                }
            ]
        },
        {path: '/broker/settings', component: Settings},
        {path: '/broker/summary', component: SummaryIndicators},
        {path: '/broker/web-offers', component: WebOffers},
        {path: '/broker/web-offer/:id', component: WebOffer},

        /* Account */
        {path: '/account/', redirect: '/account/partners'},
        {path: '/account/partners', component: AccountPartners},
        {path: '/account/partners/future', component: AccountPartnersFuture},
        {
            path: '/account/partner/:userId/settings',
            component: AccountPartnerSettings,
            props: true,
            name: 'partner-settings'
        },

        /* Custom services */
        {
            path: '/profile/user-service', component: require('./components/profile/views/user_service/user-services').default, 
            meta: {breadcrumb: {parent: 'profile', label: 'Ваши услуги'} }
        },
        {
            path: '/profile/user-service/:id', component: require('./components/profile/views/user_service/user-service').default, 
            meta: {breadcrumb: {parent: 'profile', label: 'Ваша услуга'} },
        },

        /* 404 */
        //TODO сделать 404 в SPA роутах
        //{ path: "*", beforeEnter: () => { window.location.pathname = '/404'}  }
    ]
})
