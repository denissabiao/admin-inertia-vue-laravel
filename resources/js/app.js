import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp, useForm } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import { createStore } from 'vuex'
import axios from 'axios';

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
        form: {},
        testApi: {}
    },
    mutations: {
        changeForm(state, newData) {
            state.form = newData
        },
        changeApi(state, newDataApi) {
            state.testApi = newDataApi
        }
    },
    actions: {
        async getApi() {
            await axios.get('http://suportebh.ddns.net:3355/apiRfonseca/contasPagar/datas/2023-01-01/2023-04-01/obra/183', {
                withCredentials: true
            }).then(resp => {
                console.log(resp.data)
                this.commit('changeApi', resp.data)
            }).catch(error => {
                console.log(error)
            })

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
