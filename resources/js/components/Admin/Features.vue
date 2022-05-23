<template>
  <div>
    <h3>
      <!-- Expand/collapse question button -->
      <button type="button" class="group relative w-full py-6 flex justify-between items-center text-left" aria-controls="disclosure-1" aria-expanded="false">
        <!-- Open: "text-indigo-600", Closed: "text-gray-900" -->
        <span class="text-gray-900 text-sm font-medium">
          Select Features
        </span>
        <span class="ml-6 flex items-center" @click="toggleShowFeaturesForm()">
          <svg class="block h-6 w-6 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
          </svg>
        </span>

      </button>
    </h3>
    <div class="pb-6 prose prose-sm">
      <ul role="list">
        <li v-for="(feature, i) in features">
          <div class="flex justify-between my-4">
            <div class="flex items-center">
              <input
                type="checkbox"
                class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                :value="feature.id"
                v-model="sFeatures"
              />
              <label
                class="ml-2 block text-sm text-gray-900"
              >
                {{ feature.name }}
              </label>
            </div>
            <div>
              <i class="fa fa-trash text-gray-300"></i>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <FeatureForm
      :showFeaturesForm="showFeaturesForm"
      :features="features"
      :toggleShowFeaturesForm="toggleShowFeaturesForm"
    />
  </div>
</template>
<script type="text/javascript">
  import FeatureForm from "./FeatureForm";
  export default {
    components: {
      FeatureForm,
    },
    props: [
      "features",
      "selectedFeatures",
    ],
    data(){
      return{
        showFeaturesForm: false,
        sFeatures: [],
      }
    },
    watch: {
      sFeatures(newsFeatures, oldQuestion) {
        this.$emit("onChangeFeatures", newsFeatures);
      }
    },
    methods: {
      toggleShowFeaturesForm(){
        this.showFeaturesForm = !this.showFeaturesForm;
      }
    }
  }
</script>
