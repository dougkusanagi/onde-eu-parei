<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

import HeroiconsPlusCircle from "@/Icons/HeroiconsPlusCircle.vue";
import AppSimpleSearchBar from "@/Components/AppSimpleSearchBar.vue";

const props = defineProps({
    animes: Object,
    saved_animes: {
        type: Array,
        default: [],
    },
});
</script>

<template>
    <Head title="Home" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between">
                <h2
                    class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
                >
                    Home
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
                    # 10 Mais Populares
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
                    <div>
                        <div
                            class="absolute flex flex-col justify-end group-hover:justify-between w-full bottom-[48px] p-2 h-36"
                        >
                            <h4
                                class="z-10 text-xs font-black text-center text-white card-title line-clamp-3"
                            >
                                {{ anime.title }}
                            </h4>

                            <div
                                class="absolute inset-0 opacity-80 bg-gradient-to-t from-black via-black to-transparent"
                            ></div>
                        </div>
                    </div>

                    <figure>
                        <img
                            class="w-full h-[170px] object-cover"
                            :src="anime.images.webp.image_url"
                        />
                    </figure>

                    <div
                        class="flex flex-col items-center justify-between !p-2 card-body"
                    >
                        <div class="min-w-full card-actions">
                            <Link
                                method="post"
                                as="button"
                                :href="route('saved-animes.store')"
                                :data="{ mal_id: anime.mal_id }"
                                class="flex-1 col-span-1 btn btn-square btn-outline btn-sm"
                                title="Adicionar à lista"
                            >
                                <HeroiconsPlusCircle class="w-5 h-5" />
                            </Link>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div
                        class="bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg"
                    >
                        <div class="flex justify-between p-6 pb-0 lg:px-8">
                            <h3
                                class="font-semibold leading-tight text-gray-800 dark:text-gray-200"
                            >
                                <Link href="#" class="text-lg btn btn-link">
                                    Minha Lista
                                </Link>
                            </h3>

                            <Link href="#" class="text-xs btn btn-link">
                                Ver todas
                            </Link>
                        </div>

                        <div
                            class="grid grid-cols-5 gap-6 p-6 mx-auto max-w-7xl sm:px-6 lg:px-8 sm:rounded-lg"
                        >
                            <div
                                class="shadow-xl group card card-compact bg-base-200"
                                v-for="anime in saved_animes"
                                :title="anime.title"
                            >
                                <div>
                                    <div
                                        class="absolute flex flex-col justify-end w-full bottom-[60px] p-2 h-36"
                                    >
                                        <h4
                                            class="z-10 text-xs font-black text-center text-white card-title line-clamp-3"
                                        >
                                            {{ anime.title }}
                                        </h4>

                                        <div
                                            class="absolute inset-0 opacity-80 bg-gradient-to-t from-black via-black to-transparent"
                                        ></div>
                                    </div>

                                    <figure>
                                        <img
                                            class="w-full h-[260px] object-cover"
                                            :src="anime.image_cover_url"
                                        />
                                    </figure>
                                </div>

                                <div class="!p-2 card-body">
                                    <!-- <p class="line-clamp-3">{{ anime.synopsis }}</p> -->

                                    <div class="min-w-full card-actions">
                                        <div class="min-w-full join">
                                            <!-- <select
                                                class="flex-1 select !px-2 join-item"
                                            >
                                                <option
                                                    v-for="i in [
                                                        ...Array(
                                                            anime.episode_count
                                                        ).keys(),
                                                    ]"
                                                    :value="i + 1"
                                                >
                                                    {{ i + 1 }} Episódio
                                                </option>
                                            </select> -->

                                            <form
                                                @submit.prevent="
                                                    changeEpisode(anime)
                                                "
                                                action=""
                                            >
                                                <input
                                                    v-model="anime.episodes"
                                                    type="number"
                                                    min="0"
                                                    placeholder="Episodio"
                                                    class="w-full max-w-xs input"
                                                />
                                            </form>

                                            <div class="dropdown">
                                                <label
                                                    tabindex="0"
                                                    class="btn btn-primary btn-square join-item"
                                                >
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke-width="1.5"
                                                        stroke="currentColor"
                                                        class="w-6 h-6"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z"
                                                        />
                                                    </svg>
                                                </label>

                                                <ul
                                                    tabindex="0"
                                                    class="p-2 shadow dropdown-content menu bg-base-100 rounded-box w-52"
                                                >
                                                    <li class="z-40">
                                                        <a
                                                            >Editar Link
                                                            Assistir</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a>Remover</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
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
