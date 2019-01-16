Nova.booting((Vue, router) => {
    router.addRoutes([
        {
            name: 'referrals',
            path: '/referrals',
            component: require('./components/Tool'),
        },
    ])
})
