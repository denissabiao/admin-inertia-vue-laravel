<template>
    <MenuTop />
    <section class="container px-4 pt-8 mx-auto ">

        <div class="mt-5 md:col-span-2 md:mt-0">
            <form action="#" method="POST">
                <div class="overflow-hidden shadow sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-3 gap-4 s">
                            
                            <div class="col-span-6 sm:col-span-1">
                                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">First
                                    name</label>
                                <input type="text" name="first-name" id="first-name" autocomplete="given-name"
                                    class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            <div class="col-span-6 sm:col-span-1">
                                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">First
                                    name</label>
                                <input type="text" name="first-name" id="first-name" autocomplete="given-name"
                                    class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            
                        </div>
                    </div>
                    <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                        <button type="submit"
                            class="inline-flex justify-center px-3 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</template>

<script setup>
import MenuTop from '@/Components/Shared/MenuTop.vue';




</script>