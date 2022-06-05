<template>
    <div class="px-3">
        <div @click="open = !open" class="flex justify-between cursor-pointer">
            <h2>{{ title }}</h2>
            <div>
                <i :class="`fa fa-${open ? 'minus' : 'plus'}`"></i>
            </div>
        </div>
        <slot v-if="open"></slot>
    </div>
</template>
<script>
    export default {
        data: () => ({
            open: false
        }),
        props: [
            "title"
        ]
    }
</script>