<template>
  <div class="min-h-full">
    <MobileNav />
    <DesktopNav />

    <div class="lg:pl-64 flex flex-col flex-1">
      <Navbar />
      <main class="flex-1 pb-8">
        <Table
          :headers="[
            'user',
            'total',
            'state',
            'date'
          ]"
          :rows="orders"
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
        orders: {
        }
      }
    },
    created(){
      this.fetchProducts();
    },
    methods: {
      async fetchProducts(){
        const res = await fetch("/api/admin/orders");
        if(res.status == 200){
          const body = await res.json();
          this.orders = body;
        }
      }
    }
  }
</script>
