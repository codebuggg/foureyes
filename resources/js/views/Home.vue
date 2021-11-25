<template>
  <div>
    <div class="bg-white">
      <MobileMenu />
      <Navbar />
      <main>
        <ShopByCategory />
        <FeaturedSection />
        <FavoritesSection />
        <CTA />
      </main>
      <Footer />
    </div>
  </div>
</template>

<script>
  import Navbar from "../components/Navbar";
  import ShopByCategory from "../components/ShopByCategory";
  import FavoritesSection from "../components/FavouritesSection";
  import Footer from "../components/Footer";
  import CTA from "../components/CTA";
  import FeaturedSection from "../components/FeaturedSection";

  export default {
    components: {
      Navbar,
      ShopByCategory,
      FavoritesSection,
      Footer,
      CTA,
      FeaturedSection,
    },
    provide: {
      currentUser: JSON.parse(localStorage.getItem("current_user"))
    },
  }
</script>
