<template>
  <!-- Current: "bg-cyan-800 text-white", Default: "text-cyan-100 hover:text-white hover:bg-cyan-600" -->
  <router-link :to="`/admin${link.path}`" class="bg-cyan-800 text-white group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md" aria-current="page">
    <i :class="`mr-4 flex-shrink-0 h-6 w-6 text-cyan-200 fa fa-${link.icon}`"></i>
    {{ link.name }}
  </router-link>
</template>
<script type="text/javascript">
  export default {
    props: [
      "link"
    ]
  }
</script>
