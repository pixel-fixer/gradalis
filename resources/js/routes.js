import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
    scrollBehavior: () => ({y: 0}),
    routes: [
        {
            path: '/',
            component: require('./components/profile/views/index').default
        },
        {
            path: '/chat',
            component: require('./components/profile/views/chat').default
        },
        {
            path: '/settings',
            component: require('./components/profile/views/settings').default
        },
        {
            path: '/products',
            component: require('./components/profile/views/products').default
        },
        {
            path: '/purchased-products',
            component: require('./components/profile/views/purchased-products').default
        },
        {
            path: '/favorites',
            component: require('./components/profile/views/favorites').default
        },
        {
            path: '/legal',
            component: require('./components/profile/views/legal').default
        }
    ]
})
    