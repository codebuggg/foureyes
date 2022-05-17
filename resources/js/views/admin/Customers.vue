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
            'phone',
            'date',
          ]"
          :rows="customers"
        />
      </main>
    </div>
  </div>

</template>
<script type="text/javascript">
  import Vue from "vue";
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
        customers: {
        }
      }
    },
    created(){
      this.fetchCustomers();
    },
    methods: {
      async fetchCustomers(){
        const res = await fetch("/api/admin/customers");
        if(res.status == 200){
          const body = await res.json();
          this.customers = body;
        }
      }
    }
  }
</script>
