Nova.booting((Vue, router, store) => {
    window.trans = (string) => _.get(Nova.config.i18n, string);
    window.lang = document.documentElement.lang;
    window.locales = Nova.config.locales;
    window.view_locales = Nova.config.view_locales;
    Vue.prototype.trans = (string, args) => {
        let value = _.get(Nova.config.i18n, string);

        _.eachRight(args, (paramVal, paramKey) => {
            value = _.replace(value, `:${paramKey}`, paramVal);
        });
        return value;
    };

    router.addRoutes([
        {
            name: 'business-index',
            path: '/business',
            component: require('./components/Index'),
        },
        {
            name: 'business-create',
            path: '/business/create',
            component: require('./components/Create'),
        },
        {
            name: 'business-edit',
            path: '/business/:id/edit',
            props: true,
            component: require('./components/edit'),
        },
    ])
})
