<script setup>
import { ref, computed } from "vue";
import {
    Combobox,
    ComboboxInput,
    ComboboxOptions,
    ComboboxOption,
} from "@headlessui/vue";
import { onMounted } from "vue";

const props = defineProps({
    animes: {
        type: Array,
        default: [],
    },
});
const query = ref("");
const selectedAnime = ref(props.animes[0]);
const filteredAnimes = computed(() => {
    return query.value === ""
        ? props.animes.data
        : props.animes.data.filter((anime) => {
              //   return person.toLowerCase().includes(query.value.toLowerCase());
              return anime.title;
          });
});
</script>

<template>
    <Combobox v-model="selectedAnime">
        <ComboboxInput
            class="w-full max-w-xs input"
            @change="query = $event.target.value"
        />

        <ComboboxOptions
            class="absolute z-10 p-4 overflow-auto bg-white mt-14 dark:bg-gray-800"
        >
            <ComboboxOption
                class="cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700"
                v-for="anime in filteredAnimes"
                :key="anime.id"
                :value="anime.title"
            >
                {{ anime.title }}
            </ComboboxOption>
        </ComboboxOptions>
    </Combobox>
</template>
