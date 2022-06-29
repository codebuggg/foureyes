import Vue from "vue";
import Vuex from 'vuex';

Vue.use(Vuex);

const store = new Vuex.Store({
  state: {
    cart: {
      items: [],
      item: null,
      show: false,
    },
    nav: [
      {
        name: "Home",
        path: "/",
        icon: "home"
      },
      {
        name: "Products",
        path: "/products",
        icon: "list"
      },
      {
        name: "Orders",
        path: "/orders",
        icon: "shopping-cart"
      },
      {
        name: "Customers",
        path: "/customers",
        icon: "user"
      },
      {
        name: "Landing Page",
        path: "/edit",
        icon: "palette"
      },
    ]
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
      context.commit('showCart');
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
      context.commit('showCart');
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
    },
    routes: state => state.nav
  },
})

export default store;
