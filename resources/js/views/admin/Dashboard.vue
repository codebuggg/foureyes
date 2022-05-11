<template>
  <div class="min-h-full">
    <MobileNav />
    <DesktopNav />

    <div class="lg:pl-64 flex flex-col flex-1">
      <Navbar />
      <main class="flex-1 pb-8">

        <div class="mt-8">
          <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-lg leading-6 font-medium text-gray-900">Overview</h2>
            <div class="mt-2 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
              <!-- Card -->

              <Card
                title="Orders"
                :text="dashboard.ordersSum"
              />
              <Card
                title="Income"
                :text="`GHC ${dashboard.income}`"
              />
              <Card
                title="Customers"
                :text="dashboard.userCount"
              />
              <!-- More items... -->
            </div>
          </div>

          <div class="mt-8">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
              <h2 class="text-lg leading-6 font-medium text-gray-900">Sales</h2>

              <div class="grid grid-cols-1">
                <div class="bg-white overflow-hidden shadow rounded-lg">
                  <div class="p-5">
                    <LineChart />
                  </div>
                </div>

              </div>
            </div>
          </div>


          <Table
            :headers="[
              'user',
              'total',
              'state',
              'date'
            ]"
            :rows="dashboard.orders"
          />
        </div>
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
        dashboard: {
          ordersSum: 0,
        }
      }
    },
    created(){
      this.fetchDashboard();
    },
    methods: {
      async fetchDashboard(){
        const res = await fetch("/api/admin/dashboard");
        if(res.status == 200){
          const body = await res.json();
          this.dashboard = body;
        }
      }
    }
  }
</script>
