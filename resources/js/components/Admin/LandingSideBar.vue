<template>

      <!-- Static sidebar for desktop -->
      <div class="hidden lg:flex lg:w-64 lg:flex-col lg:fixed lg:inset-y-0">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="flex flex-col flex-grow bg-gray-50 pt-5 pb-4 overflow-y-auto">
          <div class="flex items-center flex-shrink-0 px-4">
            <BaseSiteLogo />
          </div>
          <div class="px-4">
            <button
              class="flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
              @click="$emit('updateLanding')"
            >
              Update
            </button>
          </div>
          <nav class="mt-5 flex-1 flex flex-col divide-y divide-cyan-800 overflow-y-auto" aria-label="Sidebar">
            <div class="px-2 space-y-5">
              <Accordion
                title="Hero"
              >
                <BaseInput
                  label="Tile"
                  v-model="hero.title"
                  :multiline="true"
                />
                <BaseInput
                  label="Subtitle"
                  v-model="hero.subtitle"
                  :multiline="true"
                  :rows="6"
                />
                <BaseImageInput
                  :multiple="true"
                  :changeImage="handleChangeMultiple"
                />
              </Accordion>
              <Accordion class="shopByCategory" title="Shop By Category">
                <div class="">
                  <h3 class="">Section 1</h3>
                  <BaseImageInput
                    :changeImage="handleImageChangeFirst"
                  />
                  <BaseInput
                    label="Title"
                    v-model="shopByCategory.first.title"
                  />
                </div>
                <div class="">
                  <h3 class="">Section 2</h3>
                  <BaseImageInput
                    :changeImage="handleImageChange"
                  />
                  <BaseInput
                    label="Title"
                    v-model="shopByCategory.second.title"
                  />
                </div>
                <div class="">
                  <h3 class="">Section 3</h3>
                  <BaseImageInput
                    :changeImage="handleImageChange2"
                  />
                  <BaseInput
                    label="Title"
                    v-model="shopByCategory.third.title"
                  />
                </div>
              </Accordion>
              <Accordion class="featuredSection" title="Featured Section">
                <BaseImageInput
                  :changeImage="handleChangeFeaturedImage"
                />
                <BaseInput
                  label="Title"
                  v-model="featuredSection.title"
                  :multiline="true"
                  :rows="3"
                />
                <BaseInput
                  label="Subtitle"
                  v-model="featuredSection.subtitle"
                  :multiline="true"
                  :rows="6"
                />
              </Accordion>
            </div>
          </nav>
        </div>
      </div>

</template>
<script type="text/javascript">
  import NavLink from "./NavLink";
  import Accordion from "./Accordion.vue";

  export default {
    components: {
    NavLink,
    Accordion
},
    props: [
      "hero",
      "shopByCategory",
      "featuredSection",
    ],
    methods: {
      handleImageChangeFirst(e){
        this.shopByCategory.first.img = e;
      },
      handleImageChange(e){
        this.shopByCategory.second.img = e;
      },
      handleImageChange2(e){
        this.shopByCategory.third.img = e;
      },
      handleChangeMultiple(e){
        this.hero.imgs = e;
      },
      handleChangeFeaturedImage(e){
        this.featuredSection.img = e;
      }
    }
  }
</script>
