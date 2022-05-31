<template>
  <li class="py-6 flex">
      <div class="flex-shrink-0 w-24 h-24 border border-gray-200 rounded-md overflow-hidden">
        <img :src="cartItem.product.images[0].path" alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt." class="w-full h-full object-center object-cover">
      </div>

      <div class="ml-4 flex-1 flex flex-col">
          <div>
              <div class="flex justify-between text-base font-medium text-gray-900">
                <h3>
                  <a href="#">
                    {{ cartItem.product.name }}
                  </a>
                </h3>
                <p class="ml-4">
                  {{ `$${cartItem.product.price}` }}
                </p>
              </div>
              <p class="mt-1 text-sm text-gray-500">
                {{cartItem.color.name}}
              </p>
          </div>
          <div class="flex-1 flex items-end justify-between text-sm">
              <p class="text-gray-500">
                  Qty {{ cartItem.quantity }}
              </p>

              <div class="flex">
                  <button @click="removeFromCart(cartItem)" type="button" class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
              </div>
          </div>
      </div>
  </li>
</template>
<script>
  export default {
    props: [
      'cartItem', 
      'index'
    ],
    methods: {
      async removeFromCart(cartItem){
        this.$store.dispatch('removeFromCart', cartItem.product.id);
      },
    }
  }
</script>
