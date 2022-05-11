<template>
  <div>
    <button @click="componentProps.onClose()">x</button>
    <form>
      <input type="file" @change="onChangeImage">
      <button @click="componentProps.onClose()">Insert Text</button>
    </form>
  </div>
</template>
<script type="text/javascript">
  export default {
    props: [
      "id",
      "componentProps",
    ],
    data(){
      return {
        text: ""
      }
    },
    methods: {
      onChangeImage(e){
        this.componentProps.onChangeImage(e);
      },
      onChangeText(e){
        this.componentProps.onChangeText(e.target.value)
      }
    }
  }
  /*
  column height
background-type color or image

text - element
text align
text color
text font-size

https://vetra.laborasyon.com/demos/default/product-list.html
  */
</script>
