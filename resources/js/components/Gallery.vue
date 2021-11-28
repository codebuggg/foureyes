<template>
  <div class="flex flex-col-reverse">
    <div class="hidden mt-6 w-full max-w-2xl mx-auto sm:block lg:max-w-none">
      <div class="grid grid-cols-4 gap-6" aria-orientation="horizontal" role="tablist">
        <button v-for="(image, i) in product.images" @click="selectImage(i)" id="tabs-1-tab-1" class="relative h-24 bg-white rounded-md flex items-center justify-center text-sm font-medium uppercase text-gray-900 cursor-pointer hover:bg-gray-50 focus:outline-none focus:ring focus:ring-offset-4 focus:ring-opacity-50" aria-controls="tabs-1-panel-1" role="tab" type="button">
          <span class="sr-only">
            Angled view
          </span>
          <span class="absolute inset-0 rounded-md overflow-hidden">
            <img :src="image.name" alt="" class="w-full h-full object-center object-cover">
          </span>
          <!-- Selected: "ring-indigo-500", Not Selected: "ring-transparent" -->
          <span class="ring-transparent absolute inset-0 rounded-md ring-2 ring-offset-2 pointer-events-none" aria-hidden="true"></span>
        </button>
      </div>
    </div>
    <div class="w-full aspect-w-1 aspect-h-1">
      <!-- Tab panel, show/hide based on tab state. -->
      <div id="tabs-1-panel-1" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
        <img :src="product.images[image].name" alt="Angled front view with bag zipped and handles upright." class="w-full h-full object-center object-cover sm:rounded-lg">
      </div>
      <!-- More images... -->
    </div>
  </div>
</template>
<script>
  export default {
    props: ['product'],
    data(){
      return{
        image: 0,
      }
    },
    methods: {
      selectImage: function(i) { this.image = i}
    },
  }
</script>
