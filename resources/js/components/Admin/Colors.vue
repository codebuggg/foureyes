<template>
    <div>
        <div v-for='color in row[header.key]'>
            <span aria-hidden="true" :style="`background-color: ${color.hash}`" class="h-8 w-8 bg-gray-700 border border-black border-opacity-10 rounded-full"></span>
        </div>
    </div>
</template>
<script>
    export default {
        name: "Colors",
        props: [
            "row",
            "header",
        ]
    }
</script>