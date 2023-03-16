<template>
    <div class="items-center justify-center mx-auto md:w-1/3 ">
        <form @submit.prevent="submitForm">
            <div class="overflow-hidden shadow sm:rounded-md">
                <div class="px-4 py-5 bg-slate-50 sm:p-6">
                    <div class="grid grid-cols-6 gap-4 s">
                        <slot name="inputs"></slot>
                    </div>
                </div>
                <div class="px-4 py-3 text-left bg-gray-200 sm:px-6">
                    <slot name="buttons"></slot>
                </div>
            </div>
        </form>
    </div>
</template>

<script setup>

const props = defineProps({
    form: Object,
});

const submitForm = () => {
    props.form.post(route('user.store'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
    },
    )
}

</script>

