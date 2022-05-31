<template>
  <div>
    <div class="pl-10 max-w-full h-full flex">
                  <!--
                    Slide-over panel, show/hide based on slide-over state.

                    Entering: "transform transition ease-in-out duration-500 sm:duration-700"
                      From: "translate-x-full"
                      To: "translate-x-0"
                    Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
                      From: "translate-x-0"
                      To: "translate-x-full"
                  -->
        <div class="w-screen max-w-md">
            <div class="h-full flex flex-col bg-white overflow-y-scroll">
                <div class="flex-1 py-6 overflow-y-auto px-4 sm:px-6">
                    <div class="flex items-start justify-between">
                        <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">
                            Shopping cart
                        </h2>
                        <div class="ml-3 h-7 flex items-center">
                            <button @click="showCart" type="button" class="-m-2 p-2 text-gray-400 hover:text-gray-500">
                                <span class="sr-only">Close panel</span>
                                <!-- Heroicon name: outline/x -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="mt-8">
                        <div class="flow-root">
                            <ul role="list" class="-my-6 divide-y divide-gray-200">

                              <template v-for="(cartItem, index) in cart">
                                <CartItem
                                  :cartItem="cartItem"
                                  :index="index"
                                />
                              </template>

                                <!-- More products... -->
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                    <div class="flex justify-between text-base font-medium text-gray-900">
                        <p>Subtotal</p>
                        <p>{{ `$${subtotal}`  }}</p>
                    </div>
                    <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
                    <div class="mt-6">
                        <router-link to="/checkout" class="flex justify-center items-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">Checkout</router-link>
                    </div>
                    <div class="mt-6 flex justify-center text-sm text-center text-gray-500">
                        <p>
                            or <button @click="showCart" type="button" class="text-indigo-600 font-medium hover:text-indigo-500">Continue Shopping<span aria-hidden="true"> &rarr;</span></button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
  import CartItem from "../components/CartItem";
  import { mapActions, mapGetters, mapState } from "vuex";

  export default {
    components: {
      CartItem,
    },
    computed: {
      ...mapState({
        cart: state => state.cart.cart.items,
      }),
      ...mapGetters([
        "subtotal"
      ])
    },
    methods: {
      ...mapActions([
        "showCart"
      ])
    },
  }
</script>
