<template>
  <MenuTop />

  <section class="container px-4 pt-8 mx-auto ">

    <TableBody :groupTable=groupTable :buttonSecondary=buttonSecondary :tableHeader=tableHeader :buttonAction=buttonAction
      :itemIdTable="111" :itens="users" :rowTable="rowTable" />

    <Pagination />
  </section>
</template>

<script>
export default {
  data() {
    return {
      groupTable: [
        "Id",
        "Nome",
        "Email",
        "Ações",
      ],
      tableHeader: {
        title: 'Listar Usuários',
        btnHeader: [
          { name: 'Cadastrar Usuários', href: 'user.store' },
        ]
      },
      buttonAction: {
        button: [
          { name: 'Editar', href: 'user.edit', class: 'btn-primary' },
          { name: 'Excluir', href: 'user.delete', class: 'btn-danger' },
        ]
      },
      rowTable: ['id', 'name', 'email'],
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
    };
  },
  created() {
        this.$store.commit('changeForm', {}) 
    },
}
</script>
  
<script setup>
import MenuTop from '@/Components/Shared/MenuTop.vue';
import Pagination from '@/Components/Shared/Table/Pagination.vue';
import TableBody from '@/Components/Shared/Table/index.vue';

defineProps({
  users: Array
});


</script>