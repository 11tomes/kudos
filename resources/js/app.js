require('./bootstrap');

require('moment');

import Vue from 'vue';

import { InertiaApp } from '@inertiajs/inertia-vue';
import { InertiaForm } from 'laravel-jetstream';
import PortalVue from 'portal-vue';
import VueSplide from '@splidejs/vue-splide';
import NProgress from 'nprogress'
import { Inertia } from '@inertiajs/inertia'
import '@splidejs/splide/dist/css/themes/splide-sea-green.min.css';

Vue.mixin({ methods: { route } });
Vue.use(InertiaApp);
Vue.use(InertiaForm);
Vue.use(PortalVue);
Vue.use( VueSplide );

Inertia.on('start', () => NProgress.start())
Inertia.on('finish', () => NProgress.done())

const app = document.getElementById('app');

new Vue({
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
        }),
}).$mount(app);
