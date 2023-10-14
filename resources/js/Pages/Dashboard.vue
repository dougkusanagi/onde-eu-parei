<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";

import HeroiconsPlusCircle from "@/Icons/HeroiconsPlusCircle.vue";
import HeroiconsMinuCircle from "@/Icons/HeroiconsMinuCircle.vue";
import AppSimpleSearchBar from "@/Components/AppSimpleSearchBar.vue";

const props = defineProps({
    animes: Object,
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

        <div class="py-12">
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
                            class="shadow-xl card card-compact bg-base-200"
                            v-for="anime in animes.data.filter((a, i) => i < 5)"
                            :title="anime.title"
                        >
                            <figure>
                                <img
                                    class="w-full h-[260px] object-cover"
                                    :src="anime.images.webp.image_url"
                                />
                            </figure>

                            <div
                                class="flex flex-col items-center justify-between !p-2 card-body"
                            >
                                <button
                                    class="absolute top-0 right-0 btn btn-square btn-error btn-sm"
                                    title="Adicionar à lista"
                                >
                                    <HeroiconsMinuCircle class="w-5 h-5" />
                                </button>

                                <h4
                                    class="text-xs text-center card-title line-clamp-3"
                                >
                                    {{ anime.title }}
                                </h4>

                                <!-- <p class="line-clamp-3">{{ anime.synopsis }}</p> -->

                                <div class="min-w-full card-actions">
                                    <select
                                        class="w-full max-w-xs select select-bordered"
                                    >
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                        <option>13</option>
                                        <option>14</option>
                                        <option>15</option>
                                        <option>16</option>
                                        <option>17</option>
                                        <option>18</option>
                                        <option>19</option>
                                        <option>20</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 sm:rounded-lg">
                <h3
                    class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
                    id="top-10"
                >
                    # Top 10
                </h3>
            </div>

            <div
                class="grid grid-cols-10 gap-4 p-6 mx-auto mb-12 max-w-7xl sm:px-6 lg:px-8 sm:rounded-lg"
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
                        <h2 class="text-xs card-title line-clamp-2">
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
        </div>
    </AuthenticatedLayout>
</template>
