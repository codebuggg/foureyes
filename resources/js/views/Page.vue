<template>
  <div>
    <div class="bg-white">
      <MobileMenu />
      <Navbar />
      <main class="flex">
        <div class="flex-1">
          <slot></slot>
        </div>
        <Cart v-if="cart.show" />
      </main>
      <Footer />
    </div>
  </div>
</template>

<script>
  import Navbar from "../components/Navbar";
  import Footer from "../components/Footer";
  import Cart from "./Cart";

  export default {
    components: {
      Navbar,
      Footer,
      Cart,
    },
    computed: {
      cart(){
        return this.$store.state.cart;
      },
    },
    provide: {
      currentUser: JSON.parse(localStorage.getItem("current_user"))
    },
  }
</script>
