<template>
  <div>
    <label
      :for="id"
      class="block text-sm font-medium text-gray-700">
      {{ label }}
    </label>
    <div class="mt-1">
      <input
        :id='id'
        v-bind="$attrs"
        :value="value"
        @input="$emit('input', $event.target.value)"
        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
      >
    </div>
  </div>
</template>
<script>
  export default {
    inheritAttrs: false,
    props: [
      'label',
      'id',
      'value',
    ]
  }
</script>
