<template>
  <MenuTop />

  <section class="container px-4 pt-8 mx-auto ">

    <TableBody :groupTable=groupTable :buttonSecondary=buttonSecondary :tableHeader=tableHeader :buttonAction=buttonAction
      :itemIdTable="111" :itens="images" :rowTable="rowTable" />

    <Pagination />
  </section>
</template>

<script>
export default {
  data() {
    return {
      groupTable: [
        "Id",
        "Titulo",
        "Link",
        "Ações",
      ],
      tableHeader: {
        title: 'Listar Produtos',
        btnHeader: [
          { name: 'Cadastrar Imagens', href: 'image.create' },
        ]
      },
      buttonAction: {
        button: [
          { name: 'Editar', href: 'image.edit', class: 'btn-primary' },
          { name: 'Excluir', href: 'image.delete', class: 'btn-danger' },
        ]
      },
      rowTable: ['id', 'alt', 'src'],
      buttonSecondary: {
        secondary: true,
        buttons: [
          { name: "Adicionar Imagem Variação", href: "dashboard" },
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
  images: Array
});


</script>