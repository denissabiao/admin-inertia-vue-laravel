<template>
    <MenuTop />
    <section class="container w-1/3 px-4 pt-8 mx-auto ">
        <div class="sm:flex sm:items-center sm:justify-between">
            <div class="flex items-center mb-6">
                <h2 class="text-3xl font-medium text-gray-800 dark:text-white">Cadastrar Usuário</h2>
            </div>
        </div>

        <FlashMessage :form="form"/>
    </section>
    <div class="grid items-center justify-center grid-cols-1">

        <div class="items-center justify-center w-1/3 mx-auto ">
            <form @submit.prevent="submit">
                <div class="overflow-hidden shadow sm:rounded-md">
                    <div class="px-4 py-5 bg-slate-50 sm:p-6">

                        <div class="grid grid-cols-6 gap-4 s">

                            <div class="col-span-1 sm:col-span-6">
                                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                                <input v-model="form.email" type="text" name="email" id="email"
                                    @focusin="clearError('email')" autocomplete="given-name" :class="
                                        !form.errors.email
                                            ? 'border-0 mt-2 block w-full rounded-md  py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6'
                                            : 'border-red-600 border-1 mt-2 block w-full rounded-md  py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6'
                                    ">
                                <span class="text-red-600">{{ form.errors.email }}</span>
                            </div>
                            <div class="col-span-1 sm:col-span-3">
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nome</label>
                                <input type="text" v-model="form.name" name="name" id="name" @focusin="clearError('name')"
                                    autocomplete="given-name" :class="
                                        !form.errors.name
                                            ? 'border-0 mt-2 block w-full rounded-md  py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6'
                                            : 'border-red-600 border-1 mt-2 block w-full rounded-md  py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6'
                                    ">
                                <span class="text-red-600">{{ form.errors.name }}</span>
                            </div>
                            <div class="col-span-1 sm:col-span-3">
                                <label for="password"
                                    class="block text-sm font-medium leading-6 text-gray-900">Senha</label>
                                <input type="password" v-model="form.password" @focusin="clearError('password')"
                                    name="password" id="password" autocomplete="given-name" :class="
                                        !form.errors.password
                                            ? 'border-0 mt-2 block w-full rounded-md  py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6'
                                            : 'border-red-600 border-1 mt-2 block w-full rounded-md  py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6'
                                    ">
                                <span v-if="form.errors.password" class="text-red-600">{{ form.errors.password
                                }}</span>
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
import FlashMessage from '@/Components/Shared/Flash/FlashMessage.vue';
import MenuTop from '@/Components/Shared/MenuTop.vue';
import { router, Link, useForm } from '@inertiajs/vue3';
import { watch } from 'vue';

const form = useForm({
    name: '',
    email: '',
    password: ''
},
)


function clearError(fieldName) {
    form.clearErrors(fieldName)
}

const submit = () => {
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
    components: { Link }
}

</script>