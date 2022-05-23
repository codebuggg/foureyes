<template>
  <!-- Featured section -->
  <section aria-labelledby="cause-heading">
    <div class="relative bg-gray-800 py-32 px-6 sm:py-40 sm:px-12 lg:px-16">
      <div class="absolute inset-0 overflow-hidden">
        <img :src="featuredSection.img" alt="" class="w-full h-full object-center object-cover">
      </div>
      <div aria-hidden="true" class="absolute inset-0 bg-gray-900 bg-opacity-50"></div>
      <div class="relative max-w-3xl mx-auto flex flex-col items-center text-center">
        <h2 id="cause-heading" class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">{{featuredSection.title}}</h2>
        <p class="mt-3 text-xl text-white">{{featuredSection.subtitle}}</p>
        <a href="#" class="mt-8 w-full block bg-white border border-transparent rounded-md py-3 px-8 text-base font-medium text-gray-900 hover:bg-gray-100 sm:w-auto">Read our story</a>
      </div>
    </div>
  </section>
</template>
<script>
  export default {
    props: [
      "featuredSection"
    ]
  }
</script>
