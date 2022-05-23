<template>
  <div>
    <button @click="componentProps.onClose()">x</button>
    <form>
      <input
        label="Number of Columns"
        id=""
        :value="cols"
        v-on:change="onSelectSection"
      />
      <select class="" name="">
        <option>cover</option>
        <option>repeat</option>
      </select>
      <input type="file" @change="onChangeImage">
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
        cols: 1,
      }
    },
    methods: {
      onSelectSection(e){
        this.componentProps.onChangeColumns(e.target.value);
      },
      onChangeImage(e){
        this.componentProps.onChangeImage(e);
      }
    }
  }
</script>
