<template>
    <Head title="Dashboard" />

    <BreezeLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Welcome
            </h2>
        </template>

        <p>A link shortening and image hosting site.</p>
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
