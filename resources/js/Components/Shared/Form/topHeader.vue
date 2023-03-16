<template>
   <div class="sm:flex sm:items-center sm:justify-between">
            <div class="flex items-center mb-6">
                <h2 class="text-3xl font-medium text-gray-800 dark:text-white">{{ titleForm }}</h2>
            </div>
        </div>
</template>

<script setup>

const props = defineProps({
    titleForm: String,
});



</script>

