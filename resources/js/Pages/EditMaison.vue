<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    title: "",
    price: "0",
    address: "",
    number_of_rooms: "",
    size: "",
    description: "",
    img_path: "",
});

// form.post(route("maison.store"), {
//     preserveScroll: true,
//     onSuccess: () => form.reset(),
// });
</script>

<template>
    <AppLayout title="Edit home">
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Edit Home
                </h2>
            </div>
        </template>

        <form
            @submit.prevent="form.post(route('maisons.store'))"
            class="space-y-4"
        >
            <!-- titre -->
            <input
                type="text"
                v-model="form.title"
                placeholder="Titre"
                class="w-full p-2 border border-gray-300 rounded"
            />
            <div v-if="form.errors.title" class="text-red-500 text-sm">
                {{ form.errors.title }}
            </div>

            <!-- price -->
            <input
                type="text"
                v-model="form.price"
                placeholder="Prix"
                class="w-full p-2 border border-gray-300 rounded"
            />
            <div v-if="form.errors.price" class="text-red-500 text-sm">
                {{ form.errors.price }}
            </div>

            <!-- address -->
            <input
                type="text"
                v-model="form.address"
                placeholder="Adresse"
                class="w-full p-2 border border-gray-300 rounded"
            />
            <div v-if="form.errors.address" class="text-red-500 text-sm">
                {{ form.errors.address }}
            </div>

            <!-- number_of_rooms -->
            <input
                type="number"
                v-model="form.number_of_rooms"
                placeholder="Nombre de chambres"
                class="w-full p-2 border border-gray-300 rounded"
            />
            <div
                v-if="form.errors.number_of_rooms"
                class="text-red-500 text-sm"
            >
                {{ form.errors.number_of_rooms }}
            </div>

            <!-- size -->
            <input
                type="text"
                v-model="form.size"
                placeholder="Taille (m²)"
                class="w-full p-2 border border-gray-300 rounded"
            />
            <div v-if="form.errors.size" class="text-red-500 text-sm">
                {{ form.errors.size }}
            </div>

            <!-- description -->
            <textarea
                v-model="form.description"
                placeholder="Description"
                class="w-full p-2 border border-gray-300 rounded resize-none"
            ></textarea>
            <div v-if="form.errors.description" class="text-red-500 text-sm">
                {{ form.errors.description }}
            </div>

            <!-- img_path -->
            <input
                type="file"
                @change="(e) => (form.img_path = e.target.files[0])"
                class="w-full p-2 border border-gray-300 rounded"
            />
            <div v-if="form.errors.img_path" class="text-red-500 text-sm">
                {{ form.errors.img_path }}
            </div>

            <!-- Submit -->
            <button
                type="submit"
                :disabled="form.processing"
                class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600 transition"
            >
                Créer
            </button>
        </form>
    </AppLayout>
</template>
