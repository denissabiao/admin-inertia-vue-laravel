<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    tableHeader: Array
})
</script>

<template>
    <div class="sm:flex sm:items-center sm:justify-between">
        <div>
            <div class="flex items-center ">
                <h2 class="text-3xl font-medium text-gray-800 dark:text-white">{{ tableHeader.title }}</h2>
            </div>

        </div>

        <div class="flex items-center ">

            <Link v-for="(item, key) in tableHeader.btnHeader" :key="key"
                class="flex items-center justify-center w-1/2 px-5 py-2 ml-4 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600"
                :href="route(item.href)">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>

            <span>{{ item.name }}</span>
            </Link>
        </div>
    </div>
</template>
  
 

