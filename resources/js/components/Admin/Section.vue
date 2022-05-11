<template>
  <section :id="id" @click="onSelectSection()"
    class="pt-16 pb-80 sm:pt-24 sm:pb-40 lg:pt-40 lg:pb-48 h-100vh"
    :style="`
      background-image: url(${backgroundImage});
      background-size: ${cover}
      `"
  >
    <div :class="`grid grid-cols-${cols} h-100`">
      <template v-for="(col) in numberOfCols">
        <component :key="col" is="Column" :onSetOption="onSetOption"></component>
      </template>
    </div>
  </section>
</template>
<script type="text/javascript">
  import Column from "./Column";

  export default {
    components: {
      Column,
    },
    props: [
      "id",
      "onSetOption",
    ],
    data(){
      return{
        cols: 1,
        backgroundImage: "",
        cover: "cover"
      }
    },
    computed: {
      numberOfCols(){
        return new Array(this.cols * 1);
      }
    },
    methods: {
      onSelectSection(){
        this.onSetOption("SectionOptions", { onChangeColumns: this.onChangeColumns, onChangeImage: this.onChangeImage });
      },
      onChangeColumns(cols){
        this.cols = cols;
      },
      onChangeImage(e){
        let that = this;
        let file = e.target.files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
          that.backgroundImage = reader.result;
        };
        reader.readAsDataURL(file);
      }
    }
  }
</script>
