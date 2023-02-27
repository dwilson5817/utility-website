<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

const props = defineProps(['appName']);
</script>

<template>
    <AppLayout title="Welcome">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Welcome
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div>
                        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                            <h1 class="text-2xl font-medium text-gray-900">
                                Welcome to {{ appName }}!
                            </h1>

                            <p class="mt-6 text-gray-500 leading-relaxed">
                                This site hosts collection of utilities such as a URL shortening, image hosting and file sharing.
                            </p>
                        </div>

                        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 p-6 lg:p-8">
                            <div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                                    </svg>
                                    <h2 class="ml-3 text-xl font-semibold text-gray-900">
                                        <a href="https://laravel.com/docs">Link Shortening</a>
                                    </h2>
                                </div>

                                <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                                    Enter a long URL and generate a new, shorter URL which redirects to the original.
                                </p>

                                <p class="mt-4 text-sm">
                                    <a :href="route('url.new')" class="inline-flex items-center font-semibold text-indigo-700">
                                        Shorten a URL

                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ml-1 w-5 h-5 fill-indigo-500">
                                            <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </p>
                            </div>

                            <div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                    </svg>
                                    <h2 class="ml-3 text-xl font-semibold text-gray-900">
                                        Image Hosting
                                    </h2>
                                </div>

                                <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                                    Upload an image to generate a URL which can be used for directly including the image online.
                                </p>

                                <p class="mt-4 text-sm">
                                    <span class="bg-blue-100 text-blue-800 font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                        Coming Soon
                                    </span>
                                </p>
                            </div>

                            <div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 13.5l3 3m0 0l3-3m-3 3v-6m1.06-4.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                    </svg>
                                    <h2 class="ml-3 text-xl font-semibold text-gray-900">
                                        File Sharing
                                    </h2>
                                </div>

                                <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                                    Upload any file type and generate a link which can be shared and used to download the file.
                                </p>

                                <p class="mt-4 text-sm">
                                    <span class="bg-blue-100 text-blue-800 font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                        Coming Soon
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style>

</style>
