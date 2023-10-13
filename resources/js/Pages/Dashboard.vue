<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import HeroiconsPlusCircle from "@/Icons/HeroiconsPlusCircle.vue";

const props = defineProps({
    animes: Object,
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
            >
                Dashboard
            </h2>
        </template>

        <!-- <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">You're logged in!</div>
                </div>
            </div>
        </div> -->

        <!-- <div
            class="p-6 mx-auto my-12 text-gray-900 bg-white shadow max-w-7xl sm:px-6 lg:px-8 dark:bg-gray-800 sm:rounded-lg dark:text-gray-100"
        > -->

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        Minha Lista
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 sm:rounded-lg">
                <h3>Top 10</h3>
            </div>

            <div
                class="grid grid-cols-10 gap-4 p-6 mx-auto mb-12 max-w-7xl sm:px-6 lg:px-8 sm:rounded-lg"
            >
                <div
                    class="shadow-xl card card-compact bg-base-100"
                    v-for="anime in animes.data"
                    :title="anime.title"
                >
                    <HeroiconsPlusCircle class="w-5 h-5" />
                    <figure>
                        <img
                            class="w-full h-[150px] object-cover"
                            :src="anime.images.webp.image_url"
                        />
                    </figure>

                    <div
                        class="flex flex-col items-center justify-between card-body"
                    >
                        <h2 class="text-xs card-title line-clamp-2">
                            {{ anime.title }}
                        </h2>

                        <!-- <p class="line-clamp-3">{{ anime.synopsis }}</p> -->

                        <div class="card-actions">
                            <button class="btn btn-primary btn-sm">
                                <HeroiconsPlusCircle class="w-5 h-5" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
