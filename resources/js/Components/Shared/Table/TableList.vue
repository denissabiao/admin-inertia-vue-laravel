<script setup>
defineProps({
    groupTable: String,
});
</script>

<template>
    <!-- component -->
    <slot></slot>

    <div class="flex flex-col mt-6">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th v-for="(item, key) in groupTable" :key=key scope="col"
                                    class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <button class="flex items-center gap-x-3 focus:outline-none">
                                        <span>{{ item }}</span>
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        <slot name="tbody"></slot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
  
 

