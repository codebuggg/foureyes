import Vue from "vue";
import Vuex from 'vuex';
import navLinks from "./navLinks";
import cartStore from "./cartStore";
import currentUser from "./currentUser";

Vue.use(Vuex);

const store = new Vuex.Store({
  modules: {
    navLinks,
    cart: cartStore,
    currentUser,
  }
})

export default store;
