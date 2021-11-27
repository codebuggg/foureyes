<template>
  <!-- Flyout menus -->
  <div class="hidden lg:ml-8 lg:block lg:self-stretch">
    <div class="h-full flex space-x-8">
        <template v-for="(item, index) in links">
          <template v-if="item.flyout != undefined">
            <div class="flex">

              <div class="relative flex">
                <!-- Item active: "border-indigo-600 text-indigo-600", Item inactive: "border-transparent text-gray-700 hover:text-gray-800" -->
                <button type="button" class="border-transparent text-gray-700 hover:text-gray-800 relative z-10 flex items-center transition-colors ease-out duration-200 text-sm font-medium border-b-2 -mb-px pt-px" aria-expanded="false">
                  {{ item.name }}
                </button>
              </div>
              <FlyoutMenu />
            </div>
          </template>
          <template v-else>
            <a href="#" class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">
              {{ item.name }}
            </a>
          </template>
        </template>
      </div>
    </div>
  </div>
</template>
<script>
  import FlyoutMenu from "./FlyoutMenu";

  export default {
    components: {
      FlyoutMenu,
    },
    data(){
      return {
        links: [
          {
            name: "Women",
            flyout: FlyoutMenu,
          },
          {
            name: "Men",
            flyout: FlyoutMenu,
          },
          {
            name: "Company",
          },
          {
            name: "Stores",
          },
        ]
      }
    },
  }
</script>
