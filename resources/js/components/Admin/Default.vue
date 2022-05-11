<template>
  <button @click="componentProps.onAddSection()">Add Section</button>
</template>
<script type="text/javascript">
  export default {
    props: [
      "componentProps"
    ]
  }
</script>
