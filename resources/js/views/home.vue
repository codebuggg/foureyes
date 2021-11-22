<template>
  <div>
    Home
  </div>
</template>

<script>
  export default {
    async mounted() {
      const headers = localStorage.getItem("headers");
      if (headers) this.validateToken(JSON.parse(headers));
      else await this.pushToSignUp();
    },
    methods: {
      async pushToSignUp(){
        return this.$router.push({ name: "sign_up" });
      },
    }
  }
</script>
