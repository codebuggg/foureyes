<template>
  <div class="min-h-full">
    <DesktopNav
      :hero="hero"
      :shopByCategory="shopByCategory"
      :featuredSection="featuredSection"
      @updateLanding="updateLanding"
    />

    <div class="lg:pl-64 flex flex-col flex-1">
      <HeroSection
        :hero="hero"
      />
      <ShopByCategory
        :shopByCategory="shopByCategory"
      />
      <FeaturedSection
        :featuredSection="featuredSection"
      />
      <FavoritesSection />
    </div>
  </div>

</template>
<script type="text/javascript">
  import MobileNav from "../../components/Admin/MobileNav";
  import DesktopNav from "../../components/Admin/LandingSideBar";
  import Navbar from "../../components/Admin/Navbar";
  import HeroSection from "../../components/HeroSection";
  import ShopByCategory from "../../components/ShopByCategory";
  import FavoritesSection from "../../components/FavouritesSection";
  import Footer from "../../components/Footer";
  import CTA from "../../components/CTA";
  import FeaturedSection from "../../components/FeaturedSection";
  import {data} from "../../data";
import Vue from "vue";

  export default{
    components: {
      MobileNav,
      DesktopNav,
      Navbar,
      HeroSection,
      ShopByCategory,
      FavoritesSection,
      Footer,
      CTA,
      FeaturedSection,
    },
    data(){
      return {
        hero: {

        },
        featuredSection: {

        },
        shopByCategory: {
          
        }
      }
    },
    created(){
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
          Vue.nextTick(function(){
            console.log(that.hero.title);
          });
        }
      },
      async updateLanding(){
        let {
          hero,
          shopByCategory,
          featuredSection,
        } = this;
        console.log(this.hero);
        const res = await authFetch("admin/landing", {
          method: "put",
          body: { 
            hero,
            shopByCategory,
            featuredSection,
          },
        });
      }
    }
  }
</script>
