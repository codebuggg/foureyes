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
    cart: {
      items: [],
      item: null,
      show: false,
    },
  },
  mutations: {
    addToCart(context, product){
      const cartItems = context.cart.items;
      const addedToCart = cartItems.filter((cartItem) => {
        return cartItem.product.id == product.id;
      });
      if(addedToCart.length > 0){
        // product is already in cart
        const cartItem = addedToCart[0];
        const i = cartItems.indexOf(cartItem);
        cartItems[i].quantity += 1; // increase the quantity of the product by one
      }else {
        cartItems.push({
          quantity: 1,
          product,
        });
      }
    },
    showCart(context){
      context.cart.show = !context.cart.show;
    },
    setCart(context, cart){
      context.cart.items = cart;
    },
    removeFromCart(context, cart){
      const cartItems = context.cart.items;
      const itemToBeRemoved = cartItems.filter((cartItem) => {
        return cartItem.product.id == cart;
      });
      const cartItem = itemToBeRemoved[0];
      const i = cartItems.indexOf(cartItem);
      if(cartItem.quantity > 1){
        cartItem.quantity -= 1;
      }else {
        cartItems.splice(i, 1);
      }
    },
  },
  actions: {
    async addToCart(context, product){
      context.commit('addToCart', product);
      const cartId = localStorage.getItem('cart-id');
      const res = await fetch(`/api/carts/${cartId}/products`, {
        method: "POST",
        headers: {
          "content-type": "application/json",
          //"Authorization": `Bearer ${localStorage.getItem("token")}`,
        },
        body: JSON.stringify({
          product_id: product.id,
        })
      });
    },
    showCart(context){
      context.commit('showCart');
    },
    setCart(context, cart){
      context.commit('setCart', cart);
    },
    async removeFromCart(context, cart){
      context.commit('removeFromCart', cart);
      const cartId = localStorage.getItem('cart-id');
      fetch(`/api/carts/${cartId}/products/${cart}`, {method: "delete"})
    }
  },
  getters: {
    subtotal: state => {
      var total = 0;
      state.cart.items.forEach(({
        product,
        quantity,
      }) => {
        const {
          price,
        } = product;
        total += (price * quantity);
      });
      return total;
    }
  },
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
