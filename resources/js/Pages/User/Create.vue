<template>
    <MenuTop />
    <section class="container w-1/3 px-4 pt-8 mx-auto ">
        <TopHeader titleForm="Cadastrar Usuário" />
        <FlashMessage  />
    </section>

    <FormComponent >
        <template v-slot:inputs>
            <InputText field='email' labelField='Email' typeField='email'  />
            <InputText field='name' labelField='Nome' typeField='text'  />
            <InputText field='password' labelField='Senha' typeField='password'  />
        </template>
        <template v-slot:buttons>
            <button type="submit" class="btn-primary"> Salvar</button>
            <Link type="submit" class="btn-secondary" :href="route('user.index')"> Voltar</Link>
        </template>
    </FormComponent>
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
        this.$store.commit('changeForm', useForm({
            name: '',
            email: '',
            password: ''
        })) 

    },
    methods: {
        changeValueForm(newValue) {
            $store.commit('changeForm', newValue)
        }
    },
}



</script>
