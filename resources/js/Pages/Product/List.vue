<template>
  <MenuTop />

  <section class="container px-4 pt-8 mx-auto ">

    <TableBody :groupTable=groupTable :buttonSecondary=buttonSecondary :tableHeader=tableHeader :buttonAction=buttonAction
      :itemIdTable="111" :itens="products" :rowTable="rowTable" />

    <Pagination />
  </section>
</template>

<script>
export default {
  data() {
    return {
      groupTable: [
        "Id",
        "Título",
        "Descrição",
        "Tipo",
        "Ações",
      ],
      tableHeader: {
        title: 'Listar Produtos',
        btnHeader: [
          { name: 'Cadastrar Produtos', href: 'product.create' },
        ]
      },
      buttonAction: {
        button: [
          { name: 'Editar', href: 'product.edit', class: 'btn-primary' },
          { name: 'Excluir', href: 'product.delete', class: 'btn-danger' },
        ]
      },
      rowTable: ['id', 'title', 'description','type'],
      buttonSecondary: {
        secondary: true,
        buttons: [
          { name: "Variação", href: "dashboard" },
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
  products: Array
});


</script>