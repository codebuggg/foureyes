<template>
  <div class="bg-white overflow-hidden shadow rounded-lg">
    <div class="p-5">
      <div class="flex items-center">
        <div class="flex-shrink-0">
          <!-- Heroicon name: outline/scale -->
          <i :class="`h-6 w-6 text-gray-400 fa fa-${icon}`"></i>
        </div>
        <div class="ml-5 w-0 flex-1">
          <dl>
            <dt class="text-sm font-medium text-gray-500 truncate">{{ title }}</dt>
            <dd>
              <div class="text-lg font-medium text-gray-900">{{ text }}</div>
            </dd>
          </dl>
        </div>
      </div>
    </div>
    <div v-if="path" class="bg-gray-50 px-5 py-3">
      <div class="text-sm">
        <a href="#" class="font-medium text-cyan-700 hover:text-cyan-900"> View all </a>
      </div>
    </div>
  </div>
</template>
<script type="text/javascript">
  export default {
    props: [
      "title",
      "text",
      "path",
      "icon",
    ]
  }
</script>
