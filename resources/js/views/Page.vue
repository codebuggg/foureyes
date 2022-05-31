<template>
  <div>
    <div class="bg-white">
      <MobileMenu />
      <Navbar />
      <main class="flex">
        <div class="flex-1">
          <slot></slot>
        </div>
        <Cart v-if="showCart" />
      </main>
      <Footer />
    </div>
  </div>
</template>

<script>
  import Navbar from "../components/Navbar";
  import Footer from "../components/Footer";
  import MobileMenu from "../components/MobileMenu";
  import Cart from "./Cart";
  import { mapState } from 'vuex';

  export default {
    components: {
      Navbar,
      Footer,
      Cart,
      MobileMenu,
    },
    computed: {
      ...mapState({
        currentUser: state => state.currentUser.currentUser,
        showCart: state => state.cart.cart.show,
      })
    },
    provide(){
      return({
        currentUser: this.currentUser,
      })
    },
    async created(){
      this.$store.dispatch("fetchCartItems");
    },
  }
</script>
