<template>
  <div class="pt-16 pb-80 sm:pt-24 sm:pb-40 lg:pt-40 lg:pb-48">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 sm:static">
      <div class="sm:max-w-lg">
        <h1 class="text-4xl font font-extrabold tracking-tight text-gray-900 sm:text-6xl">
          {{hero.title}}
        </h1>
        <p class="mt-4 text-xl text-gray-500">{{hero.subtitle}}</p>
      </div>
      <div>
        <div class="mt-10">
          <div aria-hidden="true" class="pointer-events-none lg:absolute lg:inset-y-0 lg:max-w-7xl lg:mx-auto lg:w-full">
            <div class="absolute transform sm:left-1/2 sm:top-0 sm:translate-x-8 lg:left-1/2 lg:top-1/2 lg:-translate-y-1/2 lg:translate-x-8">
              <div class="flex items-center space-x-6 lg:space-x-8">
                <div class="flex-shrink-0 grid grid-cols-1 gap-y-6 lg:gap-y-8">
                  <template v-for="(image) in hero.imgs.slice(0, 2)">
                    <BaseImage
                      :src="image"
                    />
                  </template>
                </div>
                <div class="flex-shrink-0 grid grid-cols-1 gap-y-6 lg:gap-y-8">
                  <template v-for="(image) in hero.imgs.slice(2, 5)">
                    <BaseImage
                      :src="image"
                    />
                  </template>
                </div>
                <div class="flex-shrink-0 grid grid-cols-1 gap-y-6 lg:gap-y-8">
                  <template v-for="(image) in hero.imgs.slice(5, 7)">
                    <BaseImage
                      :src="image"
                    />
                  </template>
                </div>
              </div>
            </div>
          </div>
          <a href="#" class="inline-block text-center bg-indigo-600 border border-transparent rounded-md py-3 px-8 font-medium text-white hover:bg-indigo-700">Shop Collection</a>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  import BaseImage from "./BaseImage";

  export default {
    components: {
      BaseImage,
    },
    props: [
      "hero"
    ]
  }
</script>
