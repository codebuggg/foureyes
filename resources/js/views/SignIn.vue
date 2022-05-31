<template>
  <div>
    <div class="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8">
      <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <BaseSiteLogo />
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
            Sign in to your account
        </h2>
        <BaseLink
          to="/sign_up"
          class="text-center"
        >
          Create an account
        </BaseLink>
      </div>

      <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
          <form class="space-y-6" action="#" method="POST" v-on:submit.prevent="onSubmit">

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

            <BaseLink
              to="/forgot-password"
            >
              Forgot your password?
            </BaseLink>

            <div>
              <BaseButton>
                  Sign in
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
          email: "",
          password: "",
          rememberMe: false,
        }
      }
    },
    methods: {
      async pushToHome(){
        return this.$router.push({ name: "home" });
      },
      async onSubmit(){
        await Auth.authenticate(this, '/api/login');
      },
    }
  }
</script>
