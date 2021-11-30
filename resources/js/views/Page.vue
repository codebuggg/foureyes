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
    async created(){
      var cartId = localStorage.getItem('cart-id');
      if(!cartId){
        var res = await fetch("/api/carts", {
          method: "POST"
        });
        if(res.status == 201){
          const body = await res.json();
          localStorage.setItem('cart-id', body.id);
          cartId = body.id;
        }
      }
      res = await fetch(`/api/carts/${cartId}/products`);
      if(res.status == 200){
        const body = await res.json();
        this.$store.dispatch('setCart', body);
      }
    },
  }
</script>
