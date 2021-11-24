<template>
  <div class="flex items-center">
    <input
      :id="id"
      v-bind="$attrs"
      type="checkbox"
      class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
      v-model='newValue'
    />
    <label
      :for="id"
      class="ml-2 block text-sm text-gray-900"
    >
      {{ label }}
    </label>
  </div>
</template>
<script>
  export default {
    inheritAttrs: false,
    props: [
      'label',
      'id',
      'value',
    ],
    data(){
      return{
        newValue: '',
      }
    },
    watch: {
      newValue(val){
        this.$emit('input', val);
      }
    }
  }
</script>
