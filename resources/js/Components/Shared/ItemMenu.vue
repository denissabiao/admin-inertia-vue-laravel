<template>
    <Popover class="relative">
      <PopoverButton class="inline-flex items-center mt-1 text-sm font-semibold leading-6 text-gray-900 gap-x-1">
        <span>{{item.name}}</span>
        <ChevronDownIcon class="w-5 h-5" aria-hidden="true" />
      </PopoverButton>
  
      <transition enter-active-class="transition duration-200 ease-out" enter-from-class="translate-y-1 opacity-0" enter-to-class="translate-y-0 opacity-100" leave-active-class="transition duration-150 ease-in" leave-from-class="translate-y-0 opacity-100" leave-to-class="translate-y-1 opacity-0">
        <PopoverPanel class="absolute z-10 flex w-screen px-4 mt-5 -translate-x-1/2 left-1/2 max-w-max">
          <div class="flex-auto max-w-md overflow-hidden text-sm leading-6 bg-white shadow-lg rounded-3xl ring-1 ">
            <div class="p-4">
              <div v-for="(itemMenu, key) in item.secondary" :key="key" class="relative flex p-4 rounded-lg group gap-x-6 hover:bg-gray-50">
        
                <div>
                  <Link :href="route(itemMenu.href)" class="font-semibold text-gray-900">
                    {{ itemMenu.itemMenu }}
                    <span class="absolute inset-0" />
                  </Link>
                </div>
              </div>
            </div>
  
          </div>
        </PopoverPanel>
      </transition>
    </Popover>
  </template>
  
  <script setup>
  import { Popover, PopoverButton, PopoverPanel } from '@headlessui/vue'
  import { ChevronDownIcon, PhoneIcon, PlayCircleIcon } from '@heroicons/vue/20/solid'
  import {
    ArrowPathIcon,
    ChartPieIcon,
    CursorArrowRaysIcon,
    FingerPrintIcon,
    SquaresPlusIcon,
  } from '@heroicons/vue/24/outline'
import { Link } from '@inertiajs/vue3';
  
  const props = defineProps(['item']);

  const solutions = [
    { name: 'Analytics', description: 'Get a better understanding of your traffic', href: '#', icon: ChartPieIcon },
    { name: 'Engagement', description: 'Speak directly to your customers', href: '#', icon: CursorArrowRaysIcon },
    { name: 'Security', description: "Your customers' data will be safe and secure", href: '#', icon: FingerPrintIcon },
    { name: 'Integrations', description: 'Connect with third-party tools', href: '#', icon: SquaresPlusIcon },
    { name: 'Automations', description: 'Build strategic funnels that will convert', href: '#', icon: ArrowPathIcon },
  ]
  const callsToAction = [
    { name: 'Watch demo', href: '#', icon: PlayCircleIcon },
    { name: 'Contact sales', href: '#', icon: PhoneIcon },
  ]
  </script>