<template>
  <div class="grid grid-cols-12">
    <div class="col-span-2">
      <div class="h-screen" style="background-color: blue; color: #fff;">
        <component :is="option.component" :componentProps="option.componentProps"></component>
      </div>
    </div>
    <div class="col-span-10">
      <div id="page">
        <template v-for="(section, i) in page">
          <component :is="section" :id="i" :onSetOption="onSetOptionContext" />
        </template>
      </div>
    </div>
  </div>
</template>
<script type="text/javascript">
  import Section from "../../components/Admin/Section";
  import SectionOptions from "../../components/Admin/SectionOptions";
  import Default from "../../components/Admin/Default";
  import ColumnOptions from "../../components/Admin/ColumnOptions";

  export default {
    components: {
      Section,
      SectionOptions,
      Default,
      ColumnOptions
    },
    data(){
      return {
        page: [],
        option: {
          component: "Default",
          componentProps: { onAddSection: this.onAddSection, onClose: this.onClose }
        }
      }
    },
    methods: {
      onAddSection(){
        this.page.push("Section");
        this.$nextTick(() => {
          document.getElementById("0").click();
        })
      },
      onClose(){
        this.option = {
          component: "Default",
          componentProps: { onAddSection: this.onAddSection, onClose: this.onClose }
        }
      },
      onSetOptionContext(optionView, componentProps){
        this.option = { component: optionView, componentProps: { onClose: this.onClose, ...componentProps } };
      }
    }
  }
</script>
