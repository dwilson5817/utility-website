<template>
    <Head title="Shorten URL" />

    <BreezeLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Shorten URL
            </h2>
        </template>

        <BreezeValidationErrors class="mb-4" />

        <div v-if="short_url" class="font-medium text-green-600">
            <p>Your short URL is {{ short_url }}</p>
        </div>

        <form v-else @submit.prevent="submit">
            <div>
                <BreezeLabel for="full_url" value="Long URL" />
                <BreezeInput id="full_url" type="url" class="mt-1 block w-full" v-model="form.full_url" required autofocus autocomplete="url" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Get Short URL
                </BreezeButton>
            </div>
        </form>
    </BreezeLayout>
</template>

<script>
import BreezeButton from "@/Components/Button";
import BreezeCheckbox from "@/Components/Checkbox";
import BreezeInput from "@/Components/Input";
import BreezeLabel from "@/Components/Label";
import BreezeLayout from "@/Layouts/Breeze";
import BreezeValidationErrors from "@/Components/ValidationErrors";
import { Head, Link } from "@inertiajs/inertia-vue3";

export default {
    name: "ShortenUrl",

    components: {
        BreezeButton,
        BreezeCheckbox,
        BreezeInput,
        BreezeLabel,
        BreezeLayout,
        BreezeValidationErrors,
        Head,
        Link,
    },

    props: {
        short_url: String,
    },

    data() {
        return {
            form: this.$inertia.form({
                full_url: null
            })
        }
    },

    methods: {
        submit() {
            this.form.post(this.route('url.submit'))
        }
    }
}
</script>
