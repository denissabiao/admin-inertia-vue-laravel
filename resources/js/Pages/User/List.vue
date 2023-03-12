<template>
  <MenuTop />

  <TableList/>
</template>


  
<script setup>

import MenuTop from '@/Components/Shared/MenuTop.vue';
import TableList from '@/Components/Shared/TableList.vue';
defineProps({
  users: Array
});
</script>