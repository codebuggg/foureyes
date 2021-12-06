<template>
  <div class="mt-10 border-t border-gray-200 pt-10">
    <h2 class="text-lg font-medium text-gray-900">Delivery Address</h2>

    <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
      <div>
        <BaseInput
          label="First name"
        />
      </div>

      <div>
        <BaseInput
          label="Last name"
        />
      </div>

      <div class="sm:col-span-2">
        <BaseInput
          label="Address"
        />
      </div>

      <div class="sm:col-span-2">
        <BaseInput
          label="Apartment, suite, etc."
        />
      </div>

      <div>
        <BaseInput
          label="City"
        />
      </div>

      <div>
        <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
        <div class="mt-1">
          <select id="country" name="country" autocomplete="country-name" class="block w-full py-2 px-3 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            <option selected>Ghana</option>
          </select>
        </div>
      </div>

    </div>
  </div>

</template>
<script>
  import BaseInput from "./BaseInput";
  export default{
    components: {
      BaseInput,
    },
  }
</script>
