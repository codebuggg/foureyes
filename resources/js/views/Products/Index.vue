<template>
  <Page>
    <div>
      <div class="bg-white">
        <div class="py-16 sm:py-24 lg:max-w-7xl lg:mx-auto lg:px-8">
          <div class="px-4 flex items-center justify-between sm:px-6 lg:px-0">
            <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">Products</h2>
          </div>

          <div class="mt-8 relative">
            <div class="relative w-full pb-6 -mb-6 overflow-x-auto">
              <ul role="list" class="mx-4 inline-flex space-x-8 sm:mx-6 lg:mx-0 lg:space-x-0 lg:grid lg:grid-cols-4 lg:gap-x-8">
                <template v-for="product in products">
                  <Product
                    :product="product"
                  />
                </template>
              </ul>
            </div>
          </div>

          <div class="mt-12 flex px-4 sm:hidden">
            <a href="#" class="text-sm font-semibold text-indigo-600 hover:text-indigo-500">See everything<span aria-hidden="true"> &rarr;</span></a>
          </div>
        </div>
      </div>

    </div>
  </Page>
</template>

<script>
  import Page from "../Page";
  import Product from "../../components/Product";

  export default {
      components: {
        Page,
        Product,
      },
      data(){
        return{
          products: [

          ],
        }
      },
      async mounted() {
        const res = await fetch("/api/products");
        if(res.status == 200){
          this.products = await res.json();
        }
      }
  }
</script>
