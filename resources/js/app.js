require('./bootstrap');
import "@fortawesome/fontawesome-free/css/all.min.css";
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import store from './Tools/store'
/**
 * @see https://www.npmjs.com/package/vue-sweetalert2
 */
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';


/**
 * @see https://www.npmjs.com/package/litepie-datepicker
 */
import LitepieDatepicker from 'litepie-datepicker';



const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(VueSweetalert2)
            .use(LitepieDatepicker)
            .use(store)
            .mixin({ methods: { route } })
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });
