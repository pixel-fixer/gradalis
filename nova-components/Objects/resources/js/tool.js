Nova.booting((Vue, router) => {
    router.addRoutes([
        {
            name: 'objects',
            path: '/objects',
            component: require('./components/Tool'),
        },
    ])
})
