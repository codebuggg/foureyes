<template>
  <form class="mt-6">
    <div>
      <h3 class="text-sm text-gray-600">Color</h3>
      <fieldset class="mt-2">
        <legend class="sr-only">
          Choose a color
        </legend>
        <div class="flex items-center space-x-3">
          <label v-for="color in product.colors" @click="handleSetColor(color)" :class="`${color.id == activeColor.id ? 'ring ring-offset-1' : 'ring-2'} m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer focus:outline-none ring-gray-700`">
            <!-- <input type="radio" name="color-choice" :value="color.id" class="sr-only" aria-labelledby="color-choice-0-label"> -->
            <span aria-hidden="true" :style="`background-color: ${color.hash}`" class="h-8 w-8 bg-gray-700 border border-black border-opacity-10 rounded-full"></span>
          </label>
        </div>
      </fieldset>
      </div>
      <div class="mt-10 flex sm:flex-col1">
        <button @click="addToCart(product)" type="button" class="max-w-xs flex-1 bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500 sm:w-full">Add to bag</button>
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
        activeColor: {}
      }
    },
    watch: {
      product(){
        this.activeColor = this.product.colors[0];
      }
    },
    methods: {
      handleSetColor(i){
        this.activeColor = i;
      },
      async addToCart(product){
        this.$store.dispatch('addToCart', { product, color: this.activeColor });
      },
    },
  }
</script>
