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
          title: "Summer styles are finally here",
          subtitle: "This year, our new summer collection will shelter you from the harsh elements of a world that doesn't care if you live or die.",
          imgs: [
            "https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-01.jpg",
            "https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-02.jpg",
            "https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-03.jpg",
            "https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-04.jpg",
            "https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-05.jpg",
            "https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-06.jpg",
            "https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-07.jpg",
          ]
        },
        shopByCategory: {
          first: {
            title: "New Arrivals",
            img: "https://tailwindui.com/img/ecommerce-images/home-page-03-featured-category.jpg",
          },
          second: {
            title: "Accessories",
            img: "https://tailwindui.com/img/ecommerce-images/home-page-03-category-01.jpg"
          },
          third: {
            title: "Workspace",
            img: "https://tailwindui.com/img/ecommerce-images/home-page-03-category-02.jpg"
          }
        },
        featuredSection: {
          img: "https://tailwindui.com/img/ecommerce-images/home-page-03-feature-section-full-width.jpg",
          title: "Long-term thinking",
          subtitle: "We're committed to responsible, sustainable, and ethical manufacturing. Our small-scale approach allows us to focus on quality and reduce our impact. We're doing our best to delay the inevitable heat-death of the universe."
        }
      }
    },

    methods: {
    }
  }
</script>
