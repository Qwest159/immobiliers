<!-- <script setup>
import { Link } from "@inertiajs/inertia-vue3";
</script>

<template>
    <Link :href="route('maisons.index')">Voir toutes les maisons</Link>

</template> -->

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
defineProps(["maisons"]);
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Maison
            </h2>
        </template>

        <div>
            <h1>Maisons</h1>
            <ul>
                <li v-for="maison in maisons" :key="maison.id">
                    <p>Titre : {{ maison.title }}</p>
                    <p>Prix : {{ maison.price }}</p>
                    <p>Adress : {{ maison.address }}</p>
                    <p>Nombre de chambres : {{ maison.number_of_rooms }}</p>
                    <p>Taille : {{ maison.size }}</p>
                    <p>Descirption{{ maison.description }}</p>

                    <!-- ATTENTION POUR IMAGE, CHANGER DANS .env LARAGON EN NOM DE FICHIER + STORAGE DANS LE CHEMIN -->
                    <img :src="`${/storage/}` + maison.img_path" alt="" />
                </li>
            </ul>
        </div>
    </AppLayout>
</template>
