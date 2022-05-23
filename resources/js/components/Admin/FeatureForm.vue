<template>
  <t-modal
    header="New Feature"
    v-model="showFeaturesForm"
  >
    <BaseInput
      label="Name"
      v-model="form.name"
    />
    <template v-slot:footer>
      <div class="flex justify-end">
        <button
          @click="createFeature()"
          type="button"
          class="flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >
          Create
        </button>
      </div>
    </template>
  </t-modal>
</template>
<script type="text/javascript">
  export default {
    props: [
      "showFeaturesForm",
      "features",
      "toggleShowFeaturesForm",
    ],
    data(){
      return{
        form: {
          name: ""
        }
      }
    },
    methods: {
      async createFeature(){
        let that = this;
        const res = await fetch("/api/admin/features", {
          method: 'post',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({ ...this.form }),
        });
        if(res.status == 201){
          const body = await res.json();
          that.features.push(body);
          that.toggleShowFeaturesForm();
        }
      }
    }
  }
</script>
