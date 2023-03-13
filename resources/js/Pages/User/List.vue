<template>
  <MenuTop />

  <section class="container px-4 pt-8 mx-auto ">
    <TableList :groupTable=groupTable>
      <TableHeader :tableHeader=tableHeader />
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
            <td class="flex-row px-4 py-4 text-sm items whitespace-nowrap">
              <div class="flex flex-row">
                <Link type="button"
                  class="px-4 py-2 m-2 text-white transition duration-500 bg-indigo-500 border border-indigo-500 rounded-md select-none ease hover:bg-indigo-600 focus:outline-none focus:shadow-outline"
                  :href="route('user.edit', item.id)">
                Editar
                </Link>
                <Link type="button"
                  class="px-4 py-2 m-2 text-white transition duration-500 bg-red-500 border border-red-500 rounded-md select-none ease hover:bg-red-600 focus:outline-none focus:shadow-outline"
                  :href="route('user.delete', item.id)">
                Excluir
                </Link>
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
  name: "HelloWorld",
  props: {
    name: "eqweqw"
  },
  data() {
    return {
      groupTable: [
        "Id",
        "Nome",
        "Email",
        "Ações",
      ],
      buttonSecondary: {
        secondary: false,
        buttons: [
          { name: "Categoria", href: "dashboard" },
          { name: "Variantes", href: "dashboard" },
          { name: "Tags", href: "dashboard" },
          { name: "Imagens", href: "dashboard" },
          { name: "Coleções", href: "dashboard" },
        ]
      },
      tableHeader: {
        title: 'Listar Usuários',
        btnHeader: [
          { name: 'Cadastrar Usuários', href:'user.store' },
        ]
      }
    };
  },
  components: { Link }
}
</script>
  
<script setup>
import MenuTop from '@/Components/Shared/MenuTop.vue';
import Pagination from '@/Components/Shared/Table/Pagination.vue';
import TableList from '@/Components/Shared/Table/TableList.vue';
import ButtonTop from '@/Components/Shared/Table/ButtonTop.vue';
import TableHeader from '@/Components/Shared/Table/TableHeader.vue';
import { Link } from '@inertiajs/vue3';
defineProps({
  users: Array
});


</script>