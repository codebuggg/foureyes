<template>
  <div :id="id" @click="onSelectSection" @mouseover="onHighlightColumn" @mouseleave="onHighlightColumn"
    :style="`
      height: 300px;
      background-image: url(${backgroundImage});
      background-size: ${cover};
      border: ${highlighted ? 'thin solid blue' : ''};
      `"
  >
    <h1>{{value}}</h1>
  </div>
</template>
<script type="text/javascript">

  export default {
    props: [
      "id",
      "onSetOption",
    ],
    data(){
      return{
        backgroundImage: "",
        cover: "cover",
        highlighted: false,
        value: ""
      }
    },
    methods: {
      onSelectSection(e){
        e.stopPropagation()
        this.onSetOption("ColumnOptions", { onChangeImage: this.onChangeImage, onChangeText: this.onChangeText });
      },
      onChangeImage(e){
        let that = this;
        let file = e.target.files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
          that.backgroundImage = reader.result;
        };
        reader.readAsDataURL(file);
      },
      onHighlightColumn(){
        this.highlighted = !this.highlighted;
      },
      onChangeText(value){
        this.value = value;
      }
    }
  }
</script>
