<script setup>
import FlashMessage from '../Flash/FlashMessage.vue';
import ActionButton from './ActionButton.vue';
import ButtonTop from './ButtonTop.vue';
import TableHeader from './TableHeader.vue';

defineProps({
    groupTable: String,
    tableHeader: Array,
    buttonSecondary: Array,
    buttonAction: Array,
    itemIdTable: String,
    itens: Array,
    rowTable: Array,
});
</script>

<template>
    <TableHeader :tableHeader=tableHeader />
    <ButtonTop :buttonSecondary=buttonSecondary />
    <FlashMessage />

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
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                            <tr v-for="item in itens" :key="item.id">
                        

                                <td v-for="(itemRow, key) in rowTable" :key="itemRow.key"
                                    class="px-4 py-4 text-sm whitespace-nowrap">
                                    <div>
                                        <h4 class="text-gray-700 dark:text-gray-200">{{ item[itemRow]}}</h4>
                                    </div>
                                </td>

                                <ActionButton :buttonAction=buttonAction :itemIdTable=item.id />

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
  
 

