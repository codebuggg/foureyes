<template>
  <Page>
    <div class="bg-gray-50">
      <main class="max-w-7xl mx-auto pt-16 pb-24 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto lg:max-w-none">
          <h1 class="sr-only">Checkout</h1>

          <form method="POST" v-on:submit.prevent="onSubmit" class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16">
            <div>
              <div>
                <h2 class="text-lg font-medium text-gray-900">Contact information</h2>

                <div class="mt-4">
                  <BaseInput
                    label="Phone"
                    v-model="form.phone"
                  />
                </div>
              </div>

              <div class="mt-10 border-t border-gray-200 pt-10">
                <h2 class="text-lg font-medium text-gray-900">Delivery Address</h2>

                <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                  <div>
                    <BaseInput
                      label="First name"
                      v-model="form.first_name"
                    />
                  </div>

                  <div>
                    <BaseInput
                      label="Last name"
                      v-model="form.last_name"
                    />
                  </div>

                  <div class="sm:col-span-2">
                    <BaseInput
                      label="Address"
                      v-model="form.address"
                    />
                  </div>

                  <div class="sm:col-span-2">
                    <BaseInput
                      label="Apartment, suite, etc."
                      v-model="form.street2"
                    />
                  </div>

                  <div class="sm:col-span-2">
                    <BaseInput
                      label="Landmark"
                      v-model="form.landmark"
                    />
                  </div>

                  <div>
                    <BaseInput
                      label="City"
                      v-model="form.city"
                    />
                  </div>

                  <div>
                    <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                    <div class="mt-1">
                      <select
                        id="country"
                        name="country"
                        v-model="form.country"
                        class="block w-full py-2 px-3 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option selected>Ghana</option>
                      </select>
                    </div>
                  </div>

                </div>
              </div>

              <!-- Payment -->
            </div>

            <!-- Order summary -->
            <div class="mt-10 lg:mt-0">
              <h2 class="text-lg font-medium text-gray-900">Order summary</h2>

              <div class="mt-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                <h3 class="sr-only">Items in your cart</h3>
                <ul role="list" class="divide-y divide-gray-200">

                  <template v-for="cartItem in cart">
                    <CartItemProduct
                      :product="cartItem"
                    />

                  </template>

                  <!-- More products... -->
                </ul>
                <Pricing />
                <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                  <button type="submit" class="w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">Confirm order</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </main>
    </div>
  </Page>
</template>

<script>
  import Page from "./Page";
  import CartItemProduct from "../components/CartItemProduct";
  import Pricing from "../components/Pricing";
  import Order from "../api/orders";
  import BaseInput from "../components/BaseInput";

  export default {
    components: {
      Page,
      CartItemProduct,
      Pricing,
      BaseInput,
    },
    data(){
      return{
        form: {
          phone: "",
          first_name: "",
          last_name: "",
          address: "",
          landmark: "",
          street2: "",
          city: "",
          country: "",
        }
      }
    },
    computed: {
      cart(){
        return this.$store.state.cart.items;
      },
    },
    methods: {
      async onSubmit(){
        await Order.checkout(this);
      },
    },
  }
</script>
