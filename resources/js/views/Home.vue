<template>
  <div>
    <div class="bg-white">
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

  export default {
    components: {
      Navbar,
      HeroSection,
      ShopByCategory,
      FavoritesSection,
      Footer,
      CTA,
      FeaturedSection,
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
      this.fetchLanding();
    },
    methods: {
       async fetchLanding(){
        const res = await authFetch("landing");
        if(res.ok){
          let body = await res.json();
          let that = this;
          body = JSON.parse(body);
          that.hero = body.hero || data.hero;
          that.shopByCategory = body.shopByCategory || data.shopByCategory;
          that.featuredSection = body.featuredSection || data.featuredSection;
        }
      },
    }
  }
</script>
