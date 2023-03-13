<template>
  <MenuTop />

  <section class="container px-4 pt-8 mx-auto ">
    <TableList :groupTable=groupTable>
      <TableHeader />
      <ButtonTop :buttonSecondary=buttonSecondary />

      <template v-slot:tbody>
        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
          <tr v-for="item in users" :key="item.id">
            <td class="px-4 py-4 text-sm whitespace-nowrap">
              <div>
                <h2 class="font-medium text-gray-800 dark:text-white ">{{ item.id }}</h2>
              </div>
            </td>

            <td class="px-4 py-4 text-sm whitespace-nowrap">
              <div>
                <h4 class="text-gray-700 dark:text-gray-200">{{ item.name }}</h4>
              </div>
            </td>
            <td class="px-4 py-4 text-sm whitespace-nowrap">
              <div>
                <h4 class="text-gray-700 dark:text-gray-200">{{ item.email }}</h4>
              </div>
            </td>
          </tr>
        </tbody>
      </template>

    </TableList>


    <Pagination />
  </section>
</template>

<script>
export default {
  name: 'HelloWorld',
  props: {
    name: 'eqweqw'
  },
  data() {
    return {
      groupTable: [
        'Id',
        'Nome',
        'Email',
        'Ações',
      ],
      buttonSecondary:
      {
        secondary: true,
        buttons:
          [
            { name: 'Categoria', href: 'dashboard' },
            { name: 'Variantes', href: 'dashboard' },
            { name: 'Tags', href: 'dashboard' },
            { name: 'Imagens', href: 'dashboard' },
            { name: 'Coleções', href: 'dashboard' },
          ]
      }
    }
  }
}
</script>
  
<script setup>
import MenuTop from '@/Components/Shared/MenuTop.vue';
import Pagination from '@/Components/Shared/Table/Pagination.vue';
import TableList from '@/Components/Shared/Table/TableList.vue';
import ButtonTop from '@/Components/Shared/Table/ButtonTop.vue';
import TableHeader from '@/Components/Shared/Table/TableHeader.vue';
defineProps({
  users: Array
});


</script>