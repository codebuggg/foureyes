<template>
  <div>
    <div class="bg-white">
      <MobileMenu />
      <Navbar />
      <main>
        <HeroSection
          :hero="hero"
        />
        <ShopByCategory
          :shopByCategory="shopByCategory"
        />
        <FeaturedSection
          :featuredSection="featuredSection"
        />
        <FavoritesSection 
          :products="recent"
        />
      </main>
      <Footer />
    </div>
  </div>
</template>

<script>
  import Navbar from "../components/Navbar";
  import HeroSection from "../components/HeroSection";
  import ShopByCategory from "../components/ShopByCategory";
  import FavoritesSection from "../components/FavouritesSection";
  import Footer from "../components/Footer";
  import CTA from "../components/CTA";
  import FeaturedSection from "../components/FeaturedSection";
  import {data} from "../data";
  import { mapState } from 'vuex';
  import MobileMenu from "../components/MobileMenu";

  export default {
    components: {
      Navbar,
      HeroSection,
      ShopByCategory,
      FavoritesSection,
      Footer,
      CTA,
      FeaturedSection,
      MobileMenu,
    },
    computed: {
      ...mapState({
        currentUser: state => state.currentUser.currentUser,
      })
    },
    provide(){
      return({
        currentUser: this.currentUser,
      })
    },
    data(){
      return{
        ...data,
        recent: []
      };
    },
    async created(){
      const res = await jsonFetch("recent");
      if(res.status == 200){
        const body = await res.json();
        this.recent = body;
      }
    }
  }
</script>
