<template>
    <Head title="Dashboard" />

    <BreezeLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <p>You're logged in!</p>
    </BreezeLayout>
</template>

<script>
import BreezeLayout from '@/Layouts/Breeze.vue'
import { Head } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeLayout,
        Head,
    },
}
</script>
