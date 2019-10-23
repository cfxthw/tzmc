import Vue from 'vue'
import VueRouter from 'vue-router'
import ElementUI from 'element-ui'
import vueSeamlessScroll   from 'vue-seamless-scroll'
import 'element-ui/lib/theme-chalk/index.css'
import VueI18n from 'vue-i18n'

import axios from 'axios'
Vue.prototype.axios = axios

Vue.use(vueSeamlessScroll)

Vue.use(VueRouter)
Vue.use(ElementUI)
Vue.use(VueI18n)


import App from './views/App'
import Hello from './views/Hello'
import Home from './views/Home'
import Foot from './views/Foot'
import Contactus from './views/contactus'
import New from './views/New'
import Journalism from './views/Journalism'
import Cam from './views/cam'
import Product from './views/Product'
import Productshow from './views/Productshow'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/hello',
            name: 'hello',
            component: Hello,
        },
        {
            path: '/contactus',
            name: 'contactus',
            component: Contactus,
        },{
            path: '/new/:id',
            name: 'new',
            component: New,
        },{
            path: '/journalism',
            name: 'journalism',
            component: Journalism,
        },{
            path: '/cam',
            name: 'Cam',
            component: Cam,
        },{
            path: '/product',
            name: 'product',
            component: Product,
        },{
            path: '/productshow/:id',
            name: 'productshow',
            component: Productshow,
        },
    ],
});

const i18n = new VueI18n({
    locale: localStorage.getItem('locale') || 'zh',
    messages: {
        'zh': require('../common/lang/zh'),
        'en': require('../common/lang/en'),
        'de':require('../common/lang/de')
    },
    silentTranslationWarn: true,
})
const app = new Vue({
    el: '#app',
    i18n,
    components: {App , Foot},
    router,
});

