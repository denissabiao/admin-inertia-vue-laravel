<template>
    <MenuTop />
    <section class="container w-1/3 px-4 pt-8 mx-auto ">
        <TopHeader titleForm="Cadastrar Usuário"/>
        <FlashMessage :form="form" />
    </section>

    <FormComponent :form="form">
        <template v-slot:inputs>
            <InputText field='email' labelField='Email' typeField='email' :form="form" />
            <InputText field='name' labelField='Nome' typeField='text' :form="form" />
            <InputText field='password' labelField='Senha' typeField='password' :form="form" />
        </template>

        <template v-slot:buttons>
            <button type="submit" class="btn-primary"> Salvar</button>
            <Link type="submit" class="btn-secondary" :href="route('user.index')"> Voltar </Link>
        </template>

    </FormComponent>


    <!-- component -->
</template>

<script setup>
import FlashMessage from '@/Components/Shared/Flash/FlashMessage.vue';
import InputText from '@/Components/Shared/Form/InputText.vue';
import MenuTop from '@/Components/Shared/MenuTop.vue';
import FormComponent from '@/Components/Shared/Form/index.vue';
import TopHeader from '@/Components/Shared/Form/topHeader.vue';
import { Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: ''
},
)

const submitForm = () => {
    form.post(route('user.store'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
    },
    )
}

</script>


<script>
export default {
    setup() {
        return { form }
    },
    data() {
        return {
            showMessageFlash: true,
            csrfToken: document.head.querySelector("meta[name=\"csrf-token\"]").content,
        };
    },
    components: { Link, InputText }
}



</script>
