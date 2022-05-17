<template>
  <div class="min-h-full">
    <DesktopNav
      :hero="hero"
      :shopByCategory="shopByCategory"
      :featuredSection="featuredSection"
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
        ...data
      }
    },
    methods: {
    }
  }
</script>
