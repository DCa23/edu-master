<template>
    <div class="text-center">
        <div class="text-6xl">{{ title }}</div>
        <div class="text-8xl">{{ counter }}</div>
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
