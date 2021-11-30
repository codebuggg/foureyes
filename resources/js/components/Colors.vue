<template>
  <form class="mt-6">
      <!-- Colors -->
    <div>
      <h3 class="text-sm text-gray-600">Color</h3>

      <fieldset class="mt-2">
        <legend class="sr-only">
          Choose a color
        </legend>
        <div class="flex items-center space-x-3">
            <!--
              Active and Checked: "ring ring-offset-1"
              Not Active and Checked: "ring-2"
            -->
          <label v-for="(color, index) in product.colors" @click="handleSetColor(index)" :class="`${index == activeColor ? 'ring ring-offset-1' : 'ring-2'} m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer focus:outline-none ring-gray-700`">
            <input type="radio" name="color-choice" value="Washed Black" class="sr-only" aria-labelledby="color-choice-0-label">
            <p id="color-choice-0-label" class="sr-only">
                Washed Black
            </p>
            <span aria-hidden="true" :style="`background-color: ${color.hash}`" class="h-8 w-8 bg-gray-700 border border-black border-opacity-10 rounded-full"></span>
          </label>

        </div>
      </fieldset>
      </div>

      <div class="mt-10 flex sm:flex-col1">
        <button @click="addToCart(product.id)" type="button" class="max-w-xs flex-1 bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500 sm:w-full">Add to bag</button>

        <button type="button" class="ml-4 py-3 px-3 rounded-md flex items-center justify-center text-gray-400 hover:bg-gray-100 hover:text-gray-500">
          <!-- Heroicon name: outline/heart -->
          <svg class="h-6 w-6 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
          </svg>
          <span class="sr-only">Add to favorites</span>
        </button>
      </div>
  </form>
</template>
<script>
  export default {
    props: [
      'product',
    ],
    data(){
      return{
        activeColor: 0,
      }
    },
    computed: {
      cart(){
        return this.$store.state.cart.item;
      },
    },
    methods: {
      handleSetColor(i){
        this.activeColor = i;
      },
      async addToCart(id){
        this.$store.dispatch('addToCart', { id });
        /*const res = await fetch("/api/carts", {
          method: "POST",
          headers: {
            "content-type": "application/json",
            "Authorization": `Bearer ${localStorage.getItem("token")}`,
          },
          body: JSON.stringify({
            product_id: id,
          })
        })
        */

      },
    },
  }
</script>
