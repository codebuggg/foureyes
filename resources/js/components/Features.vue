<template>
  <section aria-labelledby="details-heading" class="mt-12">
    <h2 id="details-heading" class="sr-only">Additional details</h2>
    <div class="border-t divide-y divide-gray-200">
      <div>
        <h3>
          <!-- Expand/collapse question button -->
          <button type="button" class="group relative w-full py-6 flex justify-between items-center text-left" aria-controls="disclosure-1" aria-expanded="false">
            <!-- Open: "text-indigo-600", Closed: "text-gray-900" -->
            <span class="text-gray-900 text-sm font-medium">
              Features
            </span>
            <span class="ml-6 flex items-center">
              <!--
                Heroicon name: outline/plus-sm

                Open: "hidden", Closed: "block"
              -->
              <svg class="block h-6 w-6 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
              </svg>
              <!--
                Heroicon name: outline/minus-sm

                Open: "block", Closed: "hidden"
              -->
              <svg class="hidden h-6 w-6 text-indigo-400 group-hover:text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
              </svg>
            </span>
                  </button>
              </h3>
              <div class="pb-6 prose prose-sm" id="disclosure-1">
                <ul role="list">
                  <li v-for="feature in product.features">{{ feature.name }}</li>
                </ul>
              </div>
          </div>

          <!-- More sections... -->
      </div>
  </section>
</template>
<script>
  export default {
    props: ['product'],
  }
</script>
