Nova.booting((Vue, router, store) => {
    router.addRoutes([
        {
            name: 'chat',
            path: '/chat',
            component: require('./components/Tool'),
        },
    ])
})
