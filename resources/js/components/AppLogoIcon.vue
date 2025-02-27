<script setup lang="ts">
import type { HTMLAttributes } from 'vue';

defineOptions({
    inheritAttrs: false,
});

interface Props {
    className?: HTMLAttributes['class'];
}

defineProps<Props>();
</script>

<template>
    <svg
    width="100"
    height="100"
    viewBox="0 0 100 100"
    fill="none"
    xmlns="http://www.w3.org/2000/svg"
>
    <!-- Libro abierto -->
    <path
        d="M20 80V20C20 18 22 15 25 15H45C48 15 50 18 50 20V80"
        stroke="#1E3A8A"
        stroke-width="5"
        fill="none"
        stroke-linecap="round"
        stroke-linejoin="round"
    />
    <path
        d="M50 80V20C50 18 52 15 55 15H75C78 15 80 18 80 20V80"
        stroke="#1E3A8A"
        stroke-width="5"
        fill="none"
        stroke-linecap="round"
        stroke-linejoin="round"
    />
    
    <!-- Páginas abiertas -->
    <path
        d="M50 80C50 70 40 65 30 65C20 65 20 70 20 80"
        stroke="#1E3A8A"
        stroke-width="4"
        fill="none"
        stroke-linecap="round"
        stroke-linejoin="round"
    />
    <path
        d="M50 80C50 70 60 65 70 65C80 65 80 70 80 80"
        stroke="#1E3A8A"
        stroke-width="4"
        fill="none"
        stroke-linecap="round"
        stroke-linejoin="round"
    />

    <!-- Birrete -->
    <polygon
        points="50,10 80,25 50,40 20,25"
        fill="#1E3A8A"
        stroke="#1E3A8A"
        stroke-width="2"
        stroke-linejoin="round"
    />
    <line x1="80" y1="25" x2="80" y2="35" stroke="#1E3A8A" stroke-width="3" stroke-linecap="round" />
</svg>
</template>
