<template>
    <MenuTop />
    <section class="container w-1/3 px-4 pt-8 mx-auto ">
        <TopHeader titleForm="Cadastrar Usuário" />
        <FlashMessage />
    </section>
    <div class="items-center justify-center mx-auto md:w-1/2 ">
        <FormComponent routeSubmit='product.update' :editForm=true>
            <template v-slot:inputs>
                <InputText field='title' :edit=true labelField='Título' typeField='text' />
                <InputText field='description' labelField='Descrição' typeField='text' />
                <InputText field='type' labelField='Tipo' typeField='text' />
                <InputText field='brand' labelField='Marca' typeField='text' />
                <InputText field='category' labelField='Categoria' typeField='text' />
                <InputText field='price' labelField='Preço' typeField='text' />
                <InputText field='stock' labelField='Estoque' typeField='text' />
                <InputText field='discount' labelField='Desconto' typeField='discount' />
                <InputText field='sale' labelField='' typeField='hidden' />
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

const props = defineProps(['product']);

</script>


<script>
import { useForm } from '@inertiajs/vue3';
export default {

    created() {
        this.$store.commit('changeForm', useForm({

            id: this.product.id,
            title: this.product.title,
            description: this.product.description,
            type: this.product.type,
            brand: this.product.brand,
            category: this.product.category,
            price: this.product.price,
            sale: this.product.sale,
            discount: this.product.discount,
            stock: this.product.stock,
            new: this.product.new,
            discount: this.product.discount,
            sale: true,
            new: true,
        }))
    },
    methods: {
        changeValueForm(newValue) {
            $store.commit('changeForm', newValue)
        }
    },
}



</script>
