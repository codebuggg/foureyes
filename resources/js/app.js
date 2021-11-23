import Vue from "vue";
import VueRouter from "vue-router";

//require('./bootstrap');
//window.Vue = require('vue').default;

Vue.use(VueRouter);

import App from "./views/app";
import Home from "./views/home";
import SignUp from "./views/sign_up";
import SignIn from "./views/sign_in";
import Cart from "./views/cart";
import Products from "./views/products";
import ShowProduct from "./views/products/show";
import Orders from "./views/orders";
import NewOrder from "./views/orders/new";

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
    },
    {
      path: '/sign_in',
      name: 'sign_in',
      component: SignIn,
    },
    {
      path: '/cart',
      name: 'cart',
      component: Cart,
    },
    {
      path: '/products',
      name: 'products',
      component: Products,
    },
    {
      path: '/products/:id',
      name: 'products.show',
      component: ShowProduct,
    },
    {
      path: '/orders',
      name: 'orders',
      component: Orders,
    },
    {
      path: '/checkout',
      name: 'orders.new',
      component: NewOrder,
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
