<template>
  <div>
    <div class="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8">
      <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <BaseSiteLogo />
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
          Create an Account
        </h2>
        <BaseLink
          to="/sign_in"
          class="text-center"
        >
          Sign in
        </BaseLink>
      </div>

      <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
          <form class="space-y-6" action="#" method="POST" v-on:submit.prevent="onSubmit">
            <BaseInput
              id="name"
              label="Full Name"
              name="name"
              v-model="form.name"
            />

            <BaseInput
              id="email"
              label="Email"
              name="email"
              type="email"
              autocomplete="email"
              v-model="form.email"
            />

            <BasePasswordInput
              id="password"
              label="Password"
              name="password"
              type="password"
              autocomplete="current-password"
              v-model="form.password"
            />

            <BasePasswordInput
              id="cpassword"
              label="Confirm Password"
              name="cpassword"
              autocomplete="current-password"
              v-model="form.cpassword"
            />

            <div>
              <BaseButton
                type="submit"
              >
                Sign up
              </BaseButton>
            </div>
          </form>

        </div>
      </div>
    </div>

  </div>
</template>

<script>
import * as Auth from "../api/auth";

export default {
  data(){
    return {
      form: {
        name: "",
        email: "",
        password: "",
        cpassword: "",
        rememberMe: false,
      }
    }
  },
  methods: {
    async pushToHome(){
      return this.$router.push({ name: "home" });
    },
    async onSubmit(){
      await Auth.authenticate(this, '/api/register');
    },
  }
}
</script>
