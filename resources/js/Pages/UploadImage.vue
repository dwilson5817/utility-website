<script setup>
import { useForm } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

defineProps({
    status: String,
});

const form = useForm({
    image: '',
});

const submit = () => {
    form.transform(data => ({
        ...data,
    })).post(route('image.submit'));
};

function handleFileUpload( e ){
    form.image = e.target.files[0];
}
</script>

<template>
    <AppLayout title="Upload Image">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Upload Image
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div>
                        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                            <form @submit.prevent="submit">
                                <div>
                                    <InputLabel for="image" value="Upload Image" class="mb-2" />
                                    <input
                                        @change="handleFileUpload( $event )"
                                        ref="image"
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        aria-describedby="file_input_help"
                                        id="image"
                                        type="file"
                                        required
                                        autofocus />
                                    <InputError class="mt-2" :message="form.errors.image" />
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                        Upload Image
                                    </PrimaryButton>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>

</style>
