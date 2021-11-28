import Vue from "vue";
import VueRouter from "vue-router";
import Vuex from 'vuex';

Vue.use(Vuex);
Vue.use(VueRouter);

import App from "./views/App";
import Home from "./views/Home";
import SignUp from "./views/SignUp";
import SignIn from "./views/SignIn";
import Cart from "./views/Cart";
import Products from "./views/Products/Index";
import ShowProduct from "./views/Products/Show";
import Orders from "./views/Orders/Index";
import NewOrder from "./views/Orders/New";
import Register from "./register";

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

const store = new Vuex.Store({
  state: {
    cart: [

    ],
  },
  mutations: {
    addToCart(id){
      cart.push(id)
    }
  }
})

const app = new Vue({
    el: '#app',
    components: {
      App
    },
    router,
    store,
});

export default app;
