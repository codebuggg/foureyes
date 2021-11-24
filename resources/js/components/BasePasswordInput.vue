<template>
  <BaseInput
    type="password"
    v-bind="$attrs"
    v-model="newValue"
  />
</template>
<script>
  /*
    changing prop value is antipattern in vue,
    so we have to watch data value and emit it as input value
  */
  export default {
    inheritAttrs: false,
    data(){
      return{
        newValue: '',
      }
    },
    props: [
      'value'
    ],
    watch: {
      newValue(val){
        this.$emit('input', val);
      }
    }
  }
</script>
