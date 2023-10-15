<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";

import HeroiconsPlusCircle from "@/Icons/HeroiconsPlusCircle.vue";
import HeroiconsMinuCircle from "@/Icons/HeroiconsMinuCircle.vue";
import AppSimpleSearchBar from "@/Components/AppSimpleSearchBar.vue";
import { onMounted } from "vue";

const props = defineProps({
    animes: Object,
});

onMounted(() => {
    console.log(props.animes.data);
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between">
                <h2
                    class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
                >
                    Dashboard
                </h2>

                <AppSimpleSearchBar />
            </div>
        </template>

        <div class="pt-12 pb-16">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 sm:rounded-lg">
                <h3
                    class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
                    id="top-10"
                >
                    # Top 10
                </h3>
            </div>

            <div
                class="grid grid-cols-10 gap-4 px-6 mx-auto mt-6 mb-12 max-w-7xl sm:px-6 lg:px-8 sm:rounded-lg"
            >
                <div
                    class="shadow-xl card card-compact bg-base-200"
                    v-for="anime in animes.data"
                    :title="anime.title"
                >
                    <figure>
                        <img
                            class="w-full h-[170px] object-cover"
                            :src="anime.images.webp.image_url"
                        />
                    </figure>

                    <div
                        class="flex flex-col items-center justify-between !p-2 card-body"
                    >
                        <h2 class="text-xs card-title line-clamp-4">
                            {{ anime.title }}
                        </h2>

                        <!-- <p class="line-clamp-3">{{ anime.synopsis }}</p> -->

                        <div class="min-w-full card-actions">
                            <button
                                class="flex-1 col-span-1 btn btn-square btn-outline btn-sm"
                                title="Adicionar à lista"
                            >
                                <HeroiconsPlusCircle class="w-5 h-5" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div
                        class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg"
                    >
                        <div class="p-6 pb-0 lg:px-8">
                            <h3
                                class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
                            >
                                Minha Lista
                            </h3>
                        </div>

                        <div
                            class="grid grid-cols-6 gap-4 p-6 mx-auto max-w-7xl sm:px-6 lg:px-8 sm:rounded-lg"
                        >
                            <div
                                class="shadow-xl group card card-compact bg-base-200"
                                v-for="anime in animes.data.filter(
                                    (a, i) => i < 6
                                )"
                                :title="anime.title"
                            >
                                <div>
                                    <div
                                        class="absolute flex flex-col justify-end group-hover:justify-between w-full bottom-[60px] p-2 h-36"
                                    >
                                        <button
                                            class="z-10 hidden btn btn-sm btn-primary group-hover:block"
                                        >
                                            Assistir
                                        </button>

                                        <h4
                                            class="z-10 text-xs font-black text-center text-white card-title line-clamp-3"
                                        >
                                            {{ anime.title }}
                                        </h4>

                                        <div
                                            class="absolute inset-0 opacity-80 bg-gradient-to-t from-black via-black to-transparent"
                                        ></div>
                                        <!-- bg-gradient-to-t from-black via-black to-transparent -->
                                    </div>

                                    <figure>
                                        <img
                                            class="w-full h-[260px] object-cover"
                                            :src="anime.images.webp.image_url"
                                        />
                                    </figure>

                                    <button
                                        class="absolute -right-2 -top-3 btn btn-square btn-error btn-sm"
                                        title="Adicionar à lista"
                                    >
                                        <HeroiconsMinuCircle class="w-5 h-5" />
                                    </button>
                                </div>

                                <div class="!p-2 card-body">
                                    <!-- <p class="line-clamp-3">{{ anime.synopsis }}</p> -->

                                    <div class="min-w-full card-actions">
                                        <select
                                            class="min-w-full select select-bordered !px-2"
                                        >
                                            <option>1 ep</option>
                                            <option>2 ep</option>
                                            <option>3 ep</option>
                                            <option>4 ep</option>
                                            <option>5 ep</option>
                                            <option>6 ep</option>
                                            <option>7 ep</option>
                                            <option>8 ep</option>
                                            <option>9 ep</option>
                                            <option>10 ep</option>
                                            <option>11 ep</option>
                                            <option>12 ep</option>
                                            <option>13 ep</option>
                                            <option>14 ep</option>
                                            <option>15 ep</option>
                                            <option>16 ep</option>
                                            <option>17 ep</option>
                                            <option>18 ep</option>
                                            <option>19 ep</option>
                                            <option>20 ep</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
