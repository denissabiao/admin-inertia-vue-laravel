<template>
    <Disclosure as="nav" class="bg-gray-100" v-slot="{ open }">
        <div class="px-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <DisclosureButton
                        class="inline-flex items-center justify-center p-2 text-gray-400 rounded-md hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                        <span class="sr-only">Open main menu</span>
                        <Bars3Icon v-if="!open" class="block w-6 h-6" aria-hidden="true" />
                        <XMarkIcon v-else class="block w-6 h-6" aria-hidden="true" />
                    </DisclosureButton>
                </div>
                <div class="flex items-center justify-center flex-1 sm:items-stretch sm:justify-start">
                    <div class="flex items-center flex-shrink-0">
                        <img class="block w-auto h-8 lg:hidden"
                            src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" />
                        <img class="hidden w-auto h-8 lg:block"
                            src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" />
                    </div>
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <li class="list-none" list-none v-for="(item, key) in $store.state.menu" :key="key">
                                <ItemMenu :item="item" />
                            </li>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <button type="button"
                        class="p-1 text-gray-400 bg-gray-800 rounded-full hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <span class="sr-only">View notifications</span>
                        <BellIcon class="w-6 h-6" aria-hidden="true" />
                    </button>

                    <!-- Profile dropdown -->
                    <Menu as="div" class="relative ml-3">
                        <div>
                            <MenuButton
                                class="flex text-sm bg-gray-800 rounded-full focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full"
                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="" />
                            </MenuButton>
                        </div>
                        <transition enter-active-class="transition duration-100 ease-out"
                            enter-from-class="transform scale-95 opacity-0" enter-to-class="transform scale-100 opacity-100"
                            leave-active-class="transition duration-75 ease-in"
                            leave-from-class="transform scale-100 opacity-100"
                            leave-to-class="transform scale-95 opacity-0">
                            <MenuItems
                                class="absolute right-0 z-10 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                <MenuItem v-slot="{ active }">
                                <a href="#"
                                    :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Your
                                    Profile</a>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                <a href="#"
                                    :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Settings</a>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                <a href="#"
                                    :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Sign
                                    out</a>
                                </MenuItem>
                            </MenuItems>
                        </transition>
                    </Menu>
                </div>
            </div>
        </div>

        <DisclosurePanel class="sm:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1">

                <NavLink v-for="item in $store.state.menu" :key="item.name"
                    :class="[route().current(item.current) ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'rounded-md px-3 pt-3 pb-3 flex items-center justify-center text-base w-full font-medium']"
                    :href="route(item.href)">
                    {{ item.name }}
                </NavLink>


            </div>
        </DisclosurePanel>
    </Disclosure>
</template>
  
<script setup>
import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { BellIcon, XMarkIcon, Bars3Icon } from '@heroicons/vue/24/solid'
import NavLink from '@/Components/NavLink.vue';
import ItemMenu from '@/Components/Shared/ItemMenu.vue';




</script>


