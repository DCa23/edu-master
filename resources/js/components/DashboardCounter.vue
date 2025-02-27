<template>
    <div class="text-center">
        <div class="text-6xl">{{ title }}</div>
        <div class="mt-6 text-6xl">{{ counter }}</div>
    </div>
</template>

<script setup lang="ts">
defineProps({
    title: {
        type: String,
        required: true,
    },
    counter: {
        type: Number,
        required: true,
    }
})
</script>
