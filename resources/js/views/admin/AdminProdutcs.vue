<template>
  <div class="min-h-full">
    <MobileNav />
    <DesktopNav />

    <div class="lg:pl-64 flex flex-col flex-1">
      <Navbar />
      <main class="flex-1 pb-8">
        <Table
          title="Products"
          :canAdd="true"
          actions
          :headers="[
            { key: 'image', render: 'Im' },
            'name',
            'price',
            { key: 'colors', render: 'Colors' },
          ]"
          :rows="products"
          newPath="/admin/products/create"
          resource="products"
        />
      </main>
    </div>
  </div>

</template>
<script type="text/javascript">
  import LineChart from "../../components/Admin/LineChart";
  import MobileNav from "../../components/Admin/MobileNav";
  import DesktopNav from "../../components/Admin/DesktopNav";
  import Table from "../../components/Admin/Table";
  import Card from "../../components/Admin/Card";
  import Navbar from "../../components/Admin/Navbar";
  import Vue from "vue";

  Vue.component("Im", {
    props: ["row", "header"],
    template: "<img width='100' :src='row[header.key].path' />"
  })

  Vue.component("Colors", {
    props: ["row", "header"],
    template: '<div class="flex"><div v-for="color in row[header.key]" class=" m-0.5 relative p-0.5 rounded-full flex items-center justify-center focus:outline-none ring-gray-700"><span aria-hidden="true" :style="`background-color: ${color.hash}`" class="h-8 w-8 bg-gray-700 border border-black border-opacity-10 rounded-full"></span></div></div>'
  })

  export default{
    components: {
      LineChart,
      MobileNav,
      DesktopNav,
      Table,
      Card,
      Navbar,
    },
    data(){
      return {
        products: {
        }
      }
    },
    created(){
      this.fetchProducts();
    },
    methods: {
      async fetchProducts(){
        const res = await fetch("/api/admin/products");
        if(res.status == 200){
          const body = await res.json();
          this.products = body;
        }
      }
    }
  }
</script>
