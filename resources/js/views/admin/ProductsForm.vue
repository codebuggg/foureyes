<template>
  <div class="min-h-full">
    <MobileNav />
    <DesktopNav />

    <div class="lg:pl-64 flex flex-col flex-1">
      <Navbar />
      <main class="flex-1 pb-8">
        <div class="max-w-6xl mx-auto mt-8 px-4 sm:px-6 lg:px-8 flex justify-between">
          <h2 class=" text-lg leading-6 font-medium text-gray-900">{{ isEditing ? 'Edit Product' : 'New Product' }}</h2>
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
                    <ColorsProducts 
                      :colors="colors"
                      :selectedColors="selectedColors"
                      :handleSetColor="handleSetColor"
                      :isSelectedColor="isSelectedColor"
                    />
                    <Features
                      :features="features"
                      :selectedFeatures="selectedFeatures"
                      @onChangeFeatures="handleChangeFeatures"
                    />
                    <BaseButton>
                      {{ isEditing ? 'Update' : 'Store'}}
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
  import ColorsProducts from "../../components/Admin/ColorsForm";

  export default{
    components: {
      MobileNav,
      DesktopNav,
      Navbar,
      Cropper,
      Features,
      ColorsProducts,
    },
    created(){
      let path = this.$router.history.current.path;
      if(path.includes("edit")){
        this.fetchEditProduct();
        this.isEditing = true;
      }else this.fetchNewProduct();
    },
    data(){
      return {
        form: {

        },
        img: "",
        canvas: "",
        crop: {

        },
        colors: [

        ],
        features: [],
        selectedFeatures: [],
        selectedColors: [],
        isEditing: false,
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
        let url = this.isEditing ? `admin/products/${this.form.id}` : 'admin/products';
        const res = await authFetch(url, {
          method: this.isEditing ? 'put' : 'post',
          body: JSON.stringify({ 
            ...this.form,
            file: that.getImage(that.canvas),
            features: that.selectedFeatures,
            colors: that.selectedColors,
          }),
        });
        if(res.ok){
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
        const res = await authFetch("admin/products/create");
        if(res.status == 200){
          const body = await res.json();
          that.features = body.features;
          that.colors = body.colors;
        }
      },
      handleChangeFeatures(e){
        this.selectedFeatures = e;
      },
      handleSetColor(index){
        let b = this.selectedColors.filter((color) => color == index);
        if(b.length > 0){
          let i = this.selectedColors.indexOf(b[0]);
          this.selectedColors.splice(i, 1);
        }else{
          this.selectedColors.push(index);
        }
      },
      getSelectedColor(index){
        return this.selectedColors.filter((color) => color == index);
      },
      isSelectedColor(index){
        let b = this.selectedColors.filter((color) => color == index);
        return b.length  > 0;
      },
      handleChangeColors(color){
        this.selectedColors = color;
      },
      async fetchEditProduct(){
        const id = this.$router.history.current.params.id;
        const res = await authFetch(`admin/products/${id}/edit`);
        if(res.status == 200){
          const body = await res.json();
          this.form = body.product;
          this.img = body.product.image.path;
          this.features = body.features;
          this.colors = body.colors;
          this.selectedColors = body.product.colors.map((color) => color.id);
          this.selectedFeatures = body.product.features.map((feature) => feature.id);
        }
      }
    }
  }
</script>
