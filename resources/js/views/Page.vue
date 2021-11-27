<template>
  <div>
    <div class="bg-white">
      <MobileMenu />
      <Navbar />
      <main>
        <slot></slot>
      </main>
      <Footer />
    </div>
  </div>
</template>

<script>
  import Navbar from "../components/Navbar";
  import Footer from "../components/Footer";

  export default {
    components: {
      Navbar,
      Footer,
    },
    provide: {
      currentUser: JSON.parse(localStorage.getItem("current_user"))
    },
  }
</script>
