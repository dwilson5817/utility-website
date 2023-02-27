<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <Link :href="'/'">
        <svg
            class="w-16 h-16"
            viewBox="0 0 260 260"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
        >
            <defs>
                <linearGradient id="g1" x1="0" y1="0" x2="200" y2="200" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#f2e747"/>
                    <stop offset="1" stop-color="#eda959"/>
                </linearGradient>
            </defs>
            <path id="Layer" class="s0" d="m0 20c0-11 9-20 20-20h220c11 0 20 9 20 20v220c0 11-9 20-20 20h-220c-11 0-20-9-20-20z"/>
            <path id="UW" class="s1" aria-label="UW"  d="m65.6 121.1q-16.3 0-25-8-8.7-7.9-8.7-22.7v-49.5h16.6v48.2q0 9.3 4.4 14.2 4.5 4.9 13.1 4.9 8.9 0 13.7-5.1 4.8-5.1 4.8-14.6v-47.6h16.5v48.6q0 15.1-9.3 23.4-9.3 8.2-26.1 8.2zm150.9-80.2l-20.5 79.1h-19.6l-10.7-45.8q-2-8.1-3.4-16.9-1.3 7.4-2.1 11.3-0.9 3.8-12 51.4h-19.7l-20.3-79.1h16.8l11.4 51.1 2.6 12.3q1.6-7.8 3-14.8 1.5-7.2 11.3-48.6h18.5l10 42.1q1.2 4.7 4 21.3l1.4-6.5 2.9-12.9 9.6-44z"/>
            <path id="Layer" class="s1" d="m35 210h110v15h-110z"/>
        </svg>
    </Link>
</template>

<style>
.s0 { fill: url(#g1) }
.s1 { fill: #ffffff }
</style>
