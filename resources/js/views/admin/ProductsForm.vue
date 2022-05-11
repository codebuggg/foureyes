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
                    />
                    <BaseInput
                      label="Price"
                      id="price"
                      v-model="form.price"
                    />
                    <BaseCheckbox
                      id="remember-me"
                      label="Remember me"
                      name="remember-me"
                      v-model="form.rememberMe"
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

  export default{
    components: {
      MobileNav,
      DesktopNav,
      Navbar,
      Cropper
    },
    data(){
      return {
        form: {
        },
        img: "",
        canvas: "",
        crop: {

        },
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
      }
    }
  }
</script>
