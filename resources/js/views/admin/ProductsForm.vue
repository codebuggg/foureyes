<template>
  <div class="min-h-full">
    <MobileNav />
    <DesktopNav />

    <div class="lg:pl-64 flex flex-col flex-1">
      <Navbar />
      <main class="flex-1 pb-8">
        <div class="max-w-6xl mx-auto mt-8 px-4 sm:px-6 lg:px-8 flex justify-between">
          <h2 class=" text-lg leading-6 font-medium text-gray-900">New Product</h2>
        </div>
        <!-- Activity table (small breakpoint and up) -->
        <div class="">
          <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col mt-2">
              <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                  <form v-on:submit.prevent="storeProduct">
                    <cropper
                      :src="img"
                      @change="onCrop"
                    />
                    <div class="relative">
                      <BaseButton>
                        Select Image
                      </BaseButton>
                      <input type="file" class="absolute top-0 left-0 right-0 bottom-0 opacity-0" @change="onChangeImage" />
                    </div>
                    <BaseInput
                      label="Name"
                      id="name"
                      v-model="form.name"
                    />
                    <BaseInput
                      label="Description"
                      id="description"
                      v-model="form.description"
                      multiline="true"
                      rows="5"
                    />
                    <BaseInput
                      label="Price"
                      id="price"
                      v-model="form.price"
                    />
                    <fieldset class="mt-2">
                      <legend class="">
                        Select colors
                      </legend>

                      <div class="flex my-4 items-center space-x-3">
                        <label v-for="(color, index) in colors" @click="handleSetColor(index)" :class="`${index == activeColor ? 'ring ring-offset-1' : 'ring-2'} m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer focus:outline-none ring-gray-700`">
                          <input type="radio" name="color-choice" value="Washed Black" class="sr-only" aria-labelledby="color-choice-0-label">
                          <p id="color-choice-0-label" class="sr-only">
                              Washed Black
                          </p>
                          <span aria-hidden="true" :style="`background-color: ${color.hash}`" class="h-8 w-8 bg-gray-700 border border-black border-opacity-10 rounded-full"></span>
                        </label>
                      </div>
                    </fieldset>
                    <Features
                      :features="features"
                      :selectedFeatures="selectedFeatures"
                    />
                    <BaseButton>
                      Store
                    </BaseButton>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

</template>
<script type="text/javascript">
  import MobileNav from "../../components/Admin/MobileNav";
  import DesktopNav from "../../components/Admin/DesktopNav";
  import Navbar from "../../components/Admin/Navbar";
  import { Cropper } from 'vue-advanced-cropper';
  import 'vue-advanced-cropper/dist/style.css';
  import Features from "../../components/Admin/Features";

  export default{
    components: {
      MobileNav,
      DesktopNav,
      Navbar,
      Cropper,
      Features,
    },
    created(){
      this.fetchNewProduct();
    },
    data(){
      return {
        form: {
        },
        img: "",
        canvas: "",
        crop: {

        },
        activeColor: 1,
        colors: [
          {
            hash: "red"
          },
          {
            hash: "blue"
          }
        ],
        features: [],
        selectedFeatures: [],
      }
    },

    methods: {
      getImage(canvas){
        try {
          const base64Image = canvas.toDataURL("image/jpeg", 1);
          return base64Image;
        } catch (e) {
          console.log(e);
        }
      },
      async storeProduct(){
        let that = this;
        console.log(this.selectedFeatures[0]);
        return;
        const res = await fetch("/api/admin/products", {
          method: 'post',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({ ...this.form, file: that.getImage(that.canvas) }),
        });
        if(res.status == 201){
          return this.$router.push({ name: "AdminProducts" });
        }
      },
      onChangeImage(e){
        let file = e.target.files[0];
        let reader = new FileReader();
        let that = this;
        reader.addEventListener("load", function(){
          that.img = reader.result;
        });
        reader.readAsDataURL(file);
      },
      onCrop({coordinates, canvas}){
			   this.crop = coordinates;
         this.canvas = canvas;
      },
      async fetchNewProduct(){
        let that = this;
        const res = await fetch("/api/admin/products/create");
        if(res.status == 200){
          const body = await res.json();
          that.features = body.features;
        }
      }
    }
  }
</script>
