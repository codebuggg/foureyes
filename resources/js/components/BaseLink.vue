<template>
  <div class="text-sm">
    <router-link
      v-bind="$attrs"
      class="font-medium text-indigo-600 hover:text-indigo-500">
      <slot></slot>
    </router-link>
  </div>
</template>
<script>
  export default{
    inheritAttrs: false,
  }
</script>
