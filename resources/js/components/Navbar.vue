<template>
  <header class="relative overflow-hidden">
      <!-- Top navigation -->
      <nav aria-label="Top" class="relative z-20 bg-white bg-opacity-90 backdrop-filter backdrop-blur-xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="h-16 flex items-center">
            <!-- Mobile menu toggle, controls the 'mobileMenuOpen' state. -->
            <button type="button" class="bg-white p-2 rounded-md text-gray-400 lg:hidden">
              <span class="sr-only">Open menu</span>
              <!-- Heroicon name: outline/menu -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
            </button>

            <!-- Logo -->
            <div class="ml-4 flex lg:ml-0">
              <a href="/">
                <span class="sr-only">Workflow</span>
                <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark.svg?color=indigo&shade=600" alt="">
              </a>
            </div>

            <NavbarMenus />

              <div class="ml-auto flex items-center">
                  <NavbarAuth />

                  <div class="hidden lg:ml-8 lg:flex">
                    <a href="#" class="text-gray-700 hover:text-gray-800 flex items-center">
                      <img src="https://tailwindui.com/img/flags/flag-ghana.svg" alt="" class="w-5 h-auto block flex-shrink-0">
                      <span class="ml-3 block text-sm font-medium">
                        GHC
                      </span>
                      <span class="sr-only">, change currency</span>
                    </a>
                  </div>

                  <!-- Search -->
                  <div class="flex lg:ml-6">
                    <a href="#" class="p-2 text-gray-400 hover:text-gray-500">
                      <span class="sr-only">Search</span>
                      <!-- Heroicon name: outline/search -->
                      <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                      </svg>
                    </a>
                  </div>

                  <!-- Cart -->
                  <div class="ml-4 flow-root lg:ml-6">
                    <a @click="showCart()" href="#" class="group -m-2 p-2 flex items-center">
                      <!-- Heroicon name: outline/shopping-bag -->
                      <svg class="flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                      </svg>
                      <span class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">{{ cartSize }}</span>
                      <span class="sr-only">items in cart, view bag</span>
                    </a>
                  </div>
              </div>
            </div>
        </div>
      </nav>

  </header>
</template>
<script>
  import HeroSection from "./HeroSection";
  import NavbarAuth from "./NavbarAuth";
  import NavbarMenus from "./NavbarMenus";
  import { mapActions, mapGetters } from "vuex";

  export default {
    components: {
      HeroSection,
      NavbarAuth,
      NavbarMenus,
    },
    computed: {
      ...mapGetters([
        "cartSize",
      ])
    },
    methods: {
      ...mapActions([
        "showCart"
      ])
    }
  }
</script>
