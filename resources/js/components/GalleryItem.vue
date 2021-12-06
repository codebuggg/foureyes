<template>
  <button @click="selectImage(i)" id="tabs-1-tab-1" class="relative h-24 bg-white rounded-md flex items-center justify-center text-sm font-medium uppercase text-gray-900 cursor-pointer hover:bg-gray-50 focus:outline-none focus:ring focus:ring-offset-4 focus:ring-opacity-50" aria-controls="tabs-1-panel-1" role="tab" type="button">
    <span class="sr-only">
      Angled view
    </span>
    <span class="absolute inset-0 rounded-md overflow-hidden">
      <img :src="image.name" alt="" class="w-full h-full object-center object-cover">
    </span>
    <!-- Selected: "ring-indigo-500", Not Selected: "ring-transparent" -->
    <span :class="computedClass" aria-hidden="true"></span>
  </button>
</template>
<script>
  export default {
    props: [
      'image',
      'selectedImage',
      'setImage',
      'i',
    ],
    computed: {
      computedClass(){
        var computedClass = "absolute inset-0 rounded-md ring-2 ring-offset-2 pointer-events-none ", active = "ring-transparent";
        if(this.selectedImage == this.i) active = "ring-indigo-500";
        return computedClass + active;
      }
    },
    methods: {
      selectImage: function(i) { this.setImage(i); }
    },
  }
</script>
