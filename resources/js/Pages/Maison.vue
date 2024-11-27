<!-- <script setup>
import { Link } from "@inertiajs/inertia-vue3";
</script>

<template>
    <Link :href="route('maisons.index')">Voir toutes les maisons</Link>

</template> -->

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";

defineProps(["maisons"]);
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Maisons
            </h2>
        </template>

        <div class="bg-slate-500">
            <!-- <h1>Maisons</h1> -->
            <ul
                class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-5"
            >
                <li
                    v-for="maison in maisons"
                    :key="maison.id"
                    class="bg-white rounded-lg shadow-md overflow-hidden"
                >
                    <img
                        :src="`/storage/` + maison.img_path"
                        alt="Image de la maison"
                        class="w-full min-h-56 object-cover"
                    />
                    <div class="p-4 space-y-2">
                        <h2 class="text-xl font-bold text-gray-800">
                            {{ maison.title }}
                        </h2>
                        <p class="text-gray-600">
                            Prix :
                            <span class="font-semibold">{{
                                maison.price
                            }}</span>
                            €
                        </p>
                        <p class="text-gray-600">
                            Adresse :
                            <span class="font-semibold">{{
                                maison.address
                            }}</span>
                        </p>
                        <p class="text-gray-600">
                            Chambres :
                            <span class="font-semibold">{{
                                maison.number_of_rooms
                            }}</span>
                        </p>
                        <p class="text-gray-600">
                            Taille :
                            <span class="font-semibold"
                                >{{ maison.size }} m²</span
                            >
                        </p>
                        <p class="text-gray-600">Description :</p>
                        <p class="text-sm text-gray-500 line-clamp-3">
                            {{ maison.description }}
                        </p>
                    </div>
                    <div class="p-4 border-t">
                        <!-- <button
                            class="w-full text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-md transition"
                        >
                            Voir les détails
                        </button> -->
                    </div>
                    <!-- @if ($post->user_id === Auth::id() || Auth::user()->role_id === 1  ) -->
                    <div class="flex space-x-4 mt-2">
                        <Link :href="route('maisons.edit', maison.id)"
                            >Modifier</Link
                        >

                        <!-- <button
                            x-data="{ id: {{ $post->id }} }"
                            x-on:click.prevent="window.selected = id; $dispatch('open-modal', 'confirm-post-deletion');"
                            type="button"
                            class="text-red-400"
                        >
                            <x-heroicon-o-trash class="w-5 h-5" />
                        </button> -->
                    </div>
                    <!-- @endif -->
                </li>
            </ul>
        </div>
    </AppLayout>
</template>
