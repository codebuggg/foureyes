<template>
  <dl class="border-t border-gray-200 py-6 px-4 space-y-6 sm:px-6">
    <div class="flex items-center justify-between">
      <dt class="text-sm">
        Subtotal
      </dt>
      <dd class="text-sm font-medium text-gray-900">
        {{ `$${subtotal}` }}
      </dd>
    </div>
    <div class="flex items-center justify-between">
      <dt class="text-sm">
        Shipping
      </dt>
      <dd class="text-sm font-medium text-gray-900">
        $5.00
      </dd>
    </div>
    <div class="flex items-center justify-between">
      <dt class="text-sm">
        Taxes
      </dt>
      <dd class="text-sm font-medium text-gray-900">
        $5.52
      </dd>
    </div>
    <div class="flex items-center justify-between border-t border-gray-200 pt-6">
      <dt class="text-base font-medium">
        Total
      </dt>
      <dd class="text-base font-medium text-gray-900">
        $75.52
      </dd>
    </div>
  </dl>
</template>
<script>
  export default {
    computed: {
      subtotal(){
        return this.$store.getters.subtotal;
      },
    },
  }
</script>
