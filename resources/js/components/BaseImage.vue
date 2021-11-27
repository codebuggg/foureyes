<template>
  <div class="w-44 h-64 rounded-lg overflow-hidden sm:opacity-0 lg:opacity-100">
      <img
        :src="src"
        alt=""
        class="w-full h-full object-center object-cover"
      >
  </div>
</template>
<script>
  export default {
    inheritedAttrs: false,
    props: [
      'src'
    ],
  }
</script>
