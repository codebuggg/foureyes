<template>

      <!-- Static sidebar for desktop -->
      <div class="hidden lg:flex lg:w-64 lg:flex-col lg:fixed lg:inset-y-0">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="flex flex-col flex-grow bg-cyan-700 pt-5 pb-4 overflow-y-auto">
          <div class="flex items-center flex-shrink-0 px-4">
            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/easywire-logo-cyan-300-mark-white-text.svg" alt="Easywire logo">
          </div>
          <nav class="mt-5 flex-1 flex flex-col divide-y divide-cyan-800 overflow-y-auto" aria-label="Sidebar">
            <div class="px-2 space-y-1">
              <template v-for="link in $store.getters.routes">
                <NavLink
                  :link="link"
                />
              </template>
            </div>
          </nav>
        </div>
      </div>

</template>
<script type="text/javascript">
  import NavLink from "./NavLink";

  export default {
    components: {
      NavLink,
    }
  }
</script>
