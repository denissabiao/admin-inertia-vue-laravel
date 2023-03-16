
<script setup>
import { Link } from '@inertiajs/vue3';


defineProps({
    buttonAction: Array,
    itemIdTable: String,
});

</script>


<template>
    <td class="flex-row px-4 py-4 text-sm items whitespace-nowrap">
        <div class="flex flex-row">

            <Link v-for="(item, key) in buttonAction.button" :key="item.key" type="button" :class=item.class
                :href="route(item.href, itemIdTable)">
            {{ item.name }}
            </Link>

        </div>
    </td>
</template>



