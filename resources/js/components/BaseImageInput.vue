<template>
  <div class="relative mt-5">
    <BaseButton>Select images</BaseButton>
    <input type="file" class="absolute top-0 h-full w-full z-50 opacity-0" @change="handleImageChange" :multiple="multiple" />
  </div>
</template>
<script type="text/javascript">
  export default {
    props: [
      "changeImage",
      "multiple"
    ],
    methods: {
      handleImageChange(e){
        if(e.target.files.length > 1){
          this.changeMultiple(e);
        }else{
          this.changeSingle(e);
        }
      },
      changeSingle(e){
        let file = e.target.files[0];
        let reader = new FileReader();
        let that = this;
        reader.addEventListener("load", function(){
          that.changeImage(reader.result);
        });
        reader.readAsDataURL(file);
      },
      changeMultiple(e){
        let files = e.target.files;
        let srcs = [];
        let that = this;
        for (var i = 0; i < files.length; i++) {
          let file = files[i];
          let reader = new FileReader();
          reader.addEventListener("load", function(){
            srcs.push(reader.result);
          });
          reader.readAsDataURL(file);
        }
        that.changeImage(srcs);
      }
    }
  }
</script>
