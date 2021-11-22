<template>
  <div>
    Home
  </div>
</template>

<script>
  export default {
    mounted() {
      this.$router.push({ name: 'sign_up' })
    }
  }
</script>
