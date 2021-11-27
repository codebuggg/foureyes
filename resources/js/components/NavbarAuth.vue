<template>
  <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
    <template v-if="currentUser">
      <span class="ml-3 block text-sm font-medium">
        {{ `Hi, ${currentUser.name}` }}
      </span>
    </template>
    <template v-else>
      <a href="/sign_in" class="text-sm font-medium text-gray-700 hover:text-gray-800">Sign in</a>
      <span class="h-6 w-px bg-gray-200" aria-hidden="true"></span>
      <a href="/sign_up" class="text-sm font-medium text-gray-700 hover:text-gray-800">Create account</a>
    </template>
  </div>
</template>
<script>
  export default {
    inject: ['currentUser']
  }
</script>
