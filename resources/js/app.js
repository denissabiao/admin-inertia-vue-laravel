import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp, useForm } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import { createStore } from 'vuex'

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';



const store = createStore({
    state: {
        menu: [
            {
                name: 'Produtos', href: 'dashboard', current: 'dashboard', secondary: [
                    { itemMenu: 'Cadastrar Produtos', current: 'user.index', href: 'dashboard' },
                    { itemMenu: 'Listar Produtos', current: 'user.index', href: 'dashboard' }
                ]
            },
            {
                name: 'Vendas', href: 'dashboard', current: 'dashboard', secondary: [
                    { itemMenu: 'Vendas Atuais', current: 'user.index', href: 'dashboard' },
                    { itemMenu: 'Relatório Vendas', current: 'user.index', href: 'dashboard' }
                ]
            },
            {
                name: 'Usuários', href: 'dashboard', current: 'user.index', secondary: [
                    { itemMenu: 'Cadastrar Usuário', current: 'user.create', href: 'user.create' },
                    { itemMenu: 'Editar Usuário', current: 'user.index', href: 'user.index' }
                ]
            },
        ],
        form: {}
    },
    mutations: {
        changeForm(state, newData) {
            state.form = newData
        }
    }

})

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(store)
            .use(ZiggyVue, Ziggy)
            .mount(el);
    },

    progress: {
        color: '#4B5563',
    },
});
