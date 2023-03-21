<template>
    <MenuTop />
    <section class="container w-1/2 px-4 pt-8 mx-auto ">
        <TopHeader titleForm="Cadastrar Usuário" />
        <FlashMessage />
    </section>

    <div class="items-center justify-center mx-auto md:w-1/2 ">
        <FormComponent routeSubmit='product.store' :editForm=false>
            <template v-slot:inputs>
                <InputText field='title' labelField='Título' typeField='text' />
                <InputText field='description' labelField='Descrição' typeField='text' />
                <InputText field='type' labelField='Tipo' typeField='text' />
                <InputText field='brand' labelField='Marca' typeField='text' />
                <InputText field='category' labelField='Categoria' typeField='text' />
                <InputText field='price' labelField='Preço' typeField='text' />
                <InputText field='stock' labelField='Estoque' typeField='text' />
                <InputText field='discount' labelField='Desconto' typeField='text' />
                <InputText field='sale' labelField='Sale' typeField='hidden' />
                <InputText field='new' labelField='' typeField='hidden' />
            </template>
            <template v-slot:buttons>
                <button type="submit" class="btn-primary"> Salvar</button>
                <Link type="submit" class="btn-secondary" :href="route('product.index')"> Voltar</Link>
            </template>
        </FormComponent>
    </div>
</template>

<script setup>
import FlashMessage from '@/Components/Shared/Flash/FlashMessage.vue';
import InputText from '@/Components/Shared/Form/InputText.vue';
import MenuTop from '@/Components/Shared/MenuTop.vue';
import FormComponent from '@/Components/Shared/Form/index.vue';
import TopHeader from '@/Components/Shared/Form/topHeader.vue';
import { Link, useForm } from '@inertiajs/vue3';



</script>


<script>
import { useForm } from '@inertiajs/vue3';
export default {
    created() {
        this.$store.commit("changeForm", useForm({
            title: "",
            description: "",
            type: "",
            brand: "",
            category: "",
            price: "",
            sale: "",
            discount: "",
            stock: "",
            new: "",
            discount: "",
            sale: true,
            new: true,
        }));
    },
    methods: {
        changeValueForm(newValue) {
            $store.commit("changeForm", newValue);
        }
    },
}



</script>
