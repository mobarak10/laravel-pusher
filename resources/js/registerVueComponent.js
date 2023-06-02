import {createApp} from "vue/dist/vue.esm-bundler.js";
import { createPinia } from 'pinia'
import ChatMessages from './components/ChatMessages.vue'

const vueApp = createApp({})

const pinia = createPinia()

vueApp.component('ChatMessages', ChatMessages)

// mount if exists vueRoot id
vueApp.use(pinia)
if(document.getElementById('root')){
    vueApp.mount('#root')
}
