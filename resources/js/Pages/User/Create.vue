<template>
    <MenuTop />
    <section class="container w-1/3 px-4 pt-8 mx-auto ">
        <div class="sm:flex sm:items-center sm:justify-between">

            <div class="flex items-center mb-6">
                <h2 class="text-3xl font-medium text-gray-800 dark:text-white">Cadastrar Usuário</h2>
            </div>




        </div>

        <!-- transform in component -->
        <div v-if="$page.props.flash.success && $page.props.flash.showMessageFlash"
            class="flex items-center justify-between max-w-3xl mb-8 bg-green-500 rounded">
            <div class="flex items-center">
                <svg class="flex-shrink-0 w-4 h-4 ml-4 mr-2 fill-white" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <polygon points="0 11 2 9 7 14 18 3 20 5 7 18" />
                </svg>
                <div class="py-4 text-sm font-medium text-white">{{ $page.props.flash.success }}</div>
            </div>
            <button type="button" class="p-2 mr-2 group" @click="$page.props.flash.showMessageFlash = false">
                <svg class="block w-2 h-2 fill-green-800 group-hover:fill-white" xmlns="http://www.w3.org/2000/svg"
                    width="235.908" height="235.908" viewBox="278.046 126.846 235.908 235.908">
                    <path
                        d="M506.784 134.017c-9.56-9.56-25.06-9.56-34.62 0L396 210.18l-76.164-76.164c-9.56-9.56-25.06-9.56-34.62 0-9.56 9.56-9.56 25.06 0 34.62L361.38 244.8l-76.164 76.165c-9.56 9.56-9.56 25.06 0 34.62 9.56 9.56 25.06 9.56 34.62 0L396 279.42l76.164 76.165c9.56 9.56 25.06 9.56 34.62 0 9.56-9.56 9.56-25.06 0-34.62L430.62 244.8l76.164-76.163c9.56-9.56 9.56-25.06 0-34.62z" />
                </svg>
            </button>
        </div>
        <!-- transform in component -->
    </section>
    <div class="grid items-center justify-center grid-cols-1">

        <div class="items-center justify-center w-1/3 mx-auto ">
            <form @submit.prevent="submit">
                <div class="overflow-hidden shadow sm:rounded-md">
                    <div class="px-4 py-5 bg-slate-50 sm:p-6">

                        <div class="grid grid-cols-6 gap-4 s">

                            <div class="col-span-1 sm:col-span-6">
                                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                                <input v-model="form.email" type="text" name="email" id="email" autocomplete="given-name"
                                    class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            <div class="col-span-1 sm:col-span-3">
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nome</label>
                                <input type="text" v-model="form.name" name="name" id="name" autocomplete="given-name"
                                    class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            <div class="col-span-1 sm:col-span-3">
                                <label for="password"
                                    class="block text-sm font-medium leading-6 text-gray-900">Senha</label>
                                <input type="password" v-model="form.password" name="password" id="password"
                                    autocomplete="given-name"
                                    class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>


                        </div>
                    </div>
                    <div class="px-4 py-3 text-left bg-gray-200 sm:px-6">
                        <button type="submit"
                            class="inline-flex justify-center px-3 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                            Salvar</button>
                        <Link type="submit"
                            class="inline-flex justify-center px-3 py-2 mx-4 text-sm font-semibold text-white bg-blue-600 rounded-md shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500"
                            :href="route('user.index')">
                        Voltar</Link>



                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- component -->
</template>

<script setup>
import MenuTop from '@/Components/Shared/MenuTop.vue';
import { Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: ''
})

const submit = () => {
    form.post(route('user.store'))
}

</script>


<script>
export default {
    data() {
        return {
            showMessageFlash: true,
            csrfToken: document.head.querySelector("meta[name=\"csrf-token\"]").content,
        };
    },

    components: { Link }
}

</script>