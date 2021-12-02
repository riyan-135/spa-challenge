 import Vue from "vue"
 import VueRouter from "vue-router";
 import {router} from "./router"
import Vuesax from 'vuesax'
import 'vuesax/dist/vuesax.css'
 Vue.use(VueRouter)
Vue.use(Vuesax)
 const route=new VueRouter({
     mode:"history",
     routes:[...router]
 })


 const app=new Vue({
    el:"#app",
    router:route
}).$mount("#app");