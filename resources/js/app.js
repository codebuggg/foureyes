import Vue from "vue";
import VueRouter from "vue-router";

//require('./bootstrap');
//window.Vue = require('vue').default;

Vue.use(VueRouter);

import App from "./views/app";
import Home from "./views/home";
import SignUp from "./views/sign_up";

const router = new VueRouter({
  mode: 'history',
  routes: [
    {
      path: "/",
      name: "home",
      component: Home,
    },
    {
      path: "/sign_up",
      name: "sign_up",
      component: SignUp,
    }
  ]
})

const app = new Vue({
    el: '#app',
    components: {
      App
    },
    router,
});

export default app;
