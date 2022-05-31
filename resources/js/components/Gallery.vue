<template>
  <div class="flex flex-col-reverse">
    <div class="hidden mt-6 w-full max-w-2xl mx-auto sm:block lg:max-w-none">
      <div class="grid grid-cols-4 gap-6" aria-orientation="horizontal" role="tablist">
        <template v-for="(image, i) in product.images">
          <GalleryItem
            :image="image"
            :i="i"
            :selectedImage="selectedImage"
            :setImage="setImage"
          />
        </template>
      </div>
    </div>
    <div v-if="product.images[selectedImage]" class="w-full aspect-w-1 aspect-h-1">
      <!-- Tab panel, show/hide based on tab state. -->
      <div id="tabs-1-panel-1" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
        <img :src="product.images[selectedImage].path" alt="Angled front view with bag zipped and handles upright." class="w-full h-full object-center object-cover sm:rounded-lg">
      </div>
      <!-- More images... -->
    </div>
  </div>
</template>
<script>
  import GalleryItem from "./GalleryItem";

  export default {
    components: {
      GalleryItem,
    },
    props: ['product'],
    data(){
      return{
        selectedImage: 0,
      }
    },
    methods: {
      setImage(i){
        this.selectedImage = i;
      },
    },
  }
</script>
