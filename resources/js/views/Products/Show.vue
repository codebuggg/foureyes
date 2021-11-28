<template>
  <Page>
    <div>
      <div class="bg-white">
        <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
          <div class="lg:grid lg:grid-cols-2 lg:gap-x-8 lg:items-start">
            <Gallery :product="product" />
            <!-- Product info -->
            <div class="mt-10 px-4 sm:px-0 sm:mt-16 lg:mt-0">
              <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">{{ product.name }}</h1>
              <div class="mt-3">
                <h2 class="sr-only">Product information</h2>
                <p class="text-3xl text-gray-900">{{ `$ ${product.price}` }}</p>
              </div>
              <Reviews :product="product" />
              <div class="mt-6">
                <h3 class="sr-only">Description</h3>
                <div class="text-base text-gray-700 space-y-6">
                  <p>{{ product.description }}</p>
                </div>
              </div>
              <Colors :product="product" />
              <Features />
            </div>
          </div>
        </div>
      </div>
    </div>
  </Page>
</template>

<script>
  import Page from "../Page";
  import Gallery from "../../components/Gallery";
  import Colors from "../../components/Colors";
  import Features from "../../components/Features";
  import Reviews from "../../components/Reviews";

  export default {
    components:{
      Page,
      Gallery,
      Colors,
      Reviews,
      Features,
    },
    data(){
      return {
        product: {

        }
      }
    },
    async created() {
      const id = this.$route.params.id;
      const res = await fetch(`/api/products/${id}`);
      if(res.status == 200){
        const body = await res.json();
        this.product = body;
      }
    },
  }
</script>
