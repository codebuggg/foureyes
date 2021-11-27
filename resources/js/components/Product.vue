<template>
  <a>
    <li class="w-64 inline-flex flex-col text-center lg:w-auto">
      <div class="group relative">
        <div class="w-full bg-gray-200 rounded-md overflow-hidden aspect-w-1 aspect-h-1">
          <img :src="product.image" alt="Black machined steel pen with hexagonal grip and small white logo at top." class="w-full h-full object-center object-cover group-hover:opacity-75">
        </div>
        <div class="mt-6">
          <p class="text-sm text-gray-500">
            {{ product.color }}
          </p>
          <h3 class="mt-1 font-semibold text-gray-900">
            <a href="#">
              <span class="absolute inset-0"></span>
              {{ product.name }}
            </a>
          </h3>
          <p class="mt-1 text-gray-900">
            {{ `$${product.price}` }}
          </p>
        </div>
      </div>

      <h4 class="sr-only">Available colors</h4>
      <ul role="list" class="mt-auto pt-6 flex items-center justify-center space-x-3">
        <li class="w-4 h-4 rounded-full border border-black border-opacity-10" style="background-color: #111827;">
          <span class="sr-only">
          Black
          </span>
        </li>

        <li class="w-4 h-4 rounded-full border border-black border-opacity-10" style="background-color: #fde68a;">
          <span class="sr-only">
          Brass
          </span>
        </li>

        <li class="w-4 h-4 rounded-full border border-black border-opacity-10" style="background-color: #e5e7eb;">
          <span class="sr-only">
          Chrome
          </span>
        </li>
      </ul>
    </li>
  </a>
</template>
<script>
  export default {
    props: ["product"]
  }
</script>
