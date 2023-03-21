<template>
    <MenuTop />
    <section class="container w-1/2 px-4 pt-8 mx-auto ">
        <TopHeader titleForm="Cadastrar Imagem" />
        <FlashMessage />
    </section>

    <div class="items-center justify-center mx-auto md:w-1/2 ">
        <FormComponent routeSubmit='image.store' :editForm=false>
            <template v-slot:inputs>
                <InputText field='alt' labelField='Título' typeField='text' />
                <InputText field='src' labelField='Link' typeField='text' />
                <InputText field='image_id' labelField='Imagem Id' typeField='text' />

            </template>
            <template v-slot:buttons>
                <button type="submit" class="btn-primary"> Salvar</button>
                <Link type="submit" class="btn-secondary" :href="route('image.index')"> Voltar</Link>
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
            alt: "",
            src: "",
            image_id: ""
        }));
    },
    methods: {
        changeValueForm(newValue) {
            $store.commit("changeForm", newValue);
        }
    },
}



</script>
